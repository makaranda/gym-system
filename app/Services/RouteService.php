<?php

namespace App\Services;


use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RouteService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openrouteservice.org',
            'connect_timeout' => 10.0,
            'timeout'  => 20.0, // Increased timeout
        ]);
    }

    public function getRoute($start, $end)
    {
        $apiKey = env('ORS_API_KEY');

        try {
            $response = $this->client->post('/v2/directions/driving-car', [
                'headers' => [
                    'Authorization' => $apiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'coordinates' => [[$start['lng'], $start['lat']], [$end['lng'], $end['lat']]],
                    'instructions' => true,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            // Log both the error message and the full response body (if available)
            \Log::error('OpenRouteService API request failed: ' . $e->getMessage());
            if ($e->hasResponse()) {
                \Log::error('Response: ' . $e->getResponse()->getBody()->getContents());
            }
            return ['error' => 'Route request failed. Please try again later.'];
        }
    }

    // New reverseGeocode method
    public function reverseGeocode($latitude, $longitude)
    {
        $apiKey = env('ORS_API_KEY');

        // Send GET request to ORS reverse geocoding endpoint
        $response = $this->client->get('/geocode/reverse', [
            'headers' => [
                'Authorization' => $apiKey,
                'Content-Type'  => 'application/json',
            ],
            'query' => [
                'point.lat' => $latitude,
                'point.lon' => $longitude,
            ],
        ]);

        // Parse the response
        $data = json_decode($response->getBody()->getContents(), true);

        // Return the first found address or null if not found
        if (!empty($data['features'])) {
            return $data['features'][0]['properties']['label'];
        }

        return null;
    }

    public function getNearbyDrivers($pickupLatitude, $pickupLongitude,$driversSelection = 0,$vehicle_id = null,$user_id = 0, $radius = 1000)
    {
        if($driversSelection == 0){
                $drivers = DB::table('users')
                            ->select('users.id', 'users.name','users.active', 'users.phone', 'users.email', 'users.location', 'users.taxi_id', 'taxis.type', 'vehicle_types.map_icon')
                            ->selectRaw("
                                (6371000 * acos(
                                    cos(radians(?)) * cos(radians(CAST(SUBSTRING_INDEX(users.location, ',', 1) AS DECIMAL(10, 6)))) *
                                    cos(radians(CAST(SUBSTRING_INDEX(users.location, ',', -1) AS DECIMAL(10, 6))) - radians(?)) +
                                    sin(radians(?)) * sin(radians(CAST(SUBSTRING_INDEX(users.location, ',', 1) AS DECIMAL(10, 6))))
                                )) AS distance", [$pickupLatitude, $pickupLongitude, $pickupLatitude])
                            ->where('users.role', 'driver')
                            ->where('vehicle_types.id', $vehicle_id)
                            ->where('users.location','!=','')
                            ->where('users.active','=','active')
                            ->join('taxis', 'users.taxi_id', '=', 'taxis.id')
                            ->join('vehicle_types', 'taxis.type', '=', 'vehicle_types.id')
                            ->havingRaw('distance <= ?', [$radius])
                            ->orderBy('distance')
                            ->get();
        }else{
            if($user_id == 0){
                $drivers = DB::table('users')
                            ->select('users.id', 'users.name', 'users.phone', 'users.email', 'users.location', 'users.taxi_id', 'taxis.type', 'vehicle_types.map_icon')
                            ->selectRaw("
                                (6371000 * acos(
                                    cos(radians(?)) * cos(radians(CAST(SUBSTRING_INDEX(users.location, ',', 1) AS DECIMAL(10, 6)))) *
                                    cos(radians(CAST(SUBSTRING_INDEX(users.location, ',', -1) AS DECIMAL(10, 6))) - radians(?)) +
                                    sin(radians(?)) * sin(radians(CAST(SUBSTRING_INDEX(users.location, ',', 1) AS DECIMAL(10, 6))))
                                )) AS distance", [$pickupLatitude, $pickupLongitude, $pickupLatitude])
                            ->where('users.role', 'driver')
                            ->where('vehicle_types.id', $vehicle_id)
                            ->where('users.location','!=','')
                            ->where('users.active','=','active')
                            ->join('taxis', 'users.taxi_id', '=', 'taxis.id')
                            ->join('vehicle_types', 'taxis.type', '=', 'vehicle_types.id')
                            ->havingRaw('distance <= ?', [$radius])
                            ->orderBy('distance')
                            ->get();
            }else{
                $drivers = DB::table('users')
                            ->select('users.id', 'users.name', 'users.phone', 'users.email', 'users.location', 'users.taxi_id', 'taxis.type', 'vehicle_types.map_icon')
                            ->selectRaw("
                                (6371000 * acos(
                                    cos(radians(?)) * cos(radians(CAST(SUBSTRING_INDEX(users.location, ',', 1) AS DECIMAL(10, 6)))) *
                                    cos(radians(CAST(SUBSTRING_INDEX(users.location, ',', -1) AS DECIMAL(10, 6))) - radians(?)) +
                                    sin(radians(?)) * sin(radians(CAST(SUBSTRING_INDEX(users.location, ',', 1) AS DECIMAL(10, 6))))
                                )) AS distance", [$pickupLatitude, $pickupLongitude, $pickupLatitude])
                            ->where('users.role', 'driver')
                            ->where('users.id', $user_id)
                            ->where('vehicle_types.id', $vehicle_id)
                            ->where('users.location','!=','')
                            ->where('users.active','=','active')
                            ->join('taxis', 'users.taxi_id', '=', 'taxis.id')
                            ->join('vehicle_types', 'taxis.type', '=', 'vehicle_types.id')
                            ->havingRaw('distance <= ?', [$radius])
                            ->orderBy('distance')
                            ->get();
            }
        }
        return $drivers;

    }

    public function getNearbyCustomers($driverLatitude, $driverLongitude, $radius = 1000)
    {

        $today = date('Y-m-d');

        // Retrieve bookings with calculated distance
        $customers = DB::table('bookings')
                    ->join('users', 'bookings.user_id', '=', 'users.id')
                    ->select('users.id as user_id', 'users.name','users.phone','bookings.total_km','bookings.id as booking_id' ,'bookings.total_charged', 'users.email', 'bookings.pick_up_location', 'bookings.drop_off_location')
                    ->selectRaw("
                        (6371000 * acos(
                            cos(radians(?)) * cos(radians(CAST(SUBSTRING_INDEX(bookings.pick_up_location, ',', 1) AS DECIMAL(10, 6)))) *
                            cos(radians(CAST(SUBSTRING_INDEX(bookings.pick_up_location, ',', -1) AS DECIMAL(10, 6))) - radians(?)) +
                            sin(radians(?)) * sin(radians(CAST(SUBSTRING_INDEX(bookings.pick_up_location, ',', 1) AS DECIMAL(10, 6))))
                        )) AS distance", [$driverLatitude, $driverLongitude, $driverLatitude])
                    ->whereDate('bookings.pick_up_date', $today)
                    ->where('users.role', 'customer')
                    ->where('bookings.active','pending')
                    ->havingRaw('distance <= ?', [$radius])
                    ->orderBy('distance')
                    ->get();

        $count = $customers->count();

        // Log the number of nearby customers found and sample data
        \Log::info("Nearby Customers Count: $count");
        if ($count > 0) {
            \Log::info("Nearby Customers Data: ", $customers->toArray());
        } else {
            \Log::info("No nearby customers found within radius $radius for driver at ($driverLatitude, $driverLongitude)");
        }

        return ['customers' => $customers, 'count' => $count];

    }
}
