<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\RouteService;
use Illuminate\Support\Facades\Session;
use App\Models\Bookings;
use App\Models\Reservation;
use App\Models\Payments;
use App\Models\Taxis;
use App\Models\VehicleTypes;
use App\Models\VehicleModels;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    protected $routeService;

    public function __construct(RouteService $routeService)
    {
        $this->routeService = $routeService;
    }

    public function index()
    {
        $admin_id = Auth::user()->id;
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();
        $vehicleTypes = VehicleTypes::all();
        $activeDrivers = User::where('role', 'driver')->where('active', 'active')->get();
        $totalActiveDrivers = $activeDrivers->count();
        $drivers = User::where('role', 'driver')->get();
        $customers = User::where('role', 'customer')->get();
        $completedBookings = Bookings::where('active', 'complete')->count();
        $pendingBookings = Bookings::where('active', 'pending')->count();
        $cancelledBookings = Bookings::where('active', 'cancel')->count();
        $recentBookings = Bookings::with('user', 'driver')->orderBy('created_at', 'desc')->limit(5)->get();
        $allBookings = Bookings::with(['user', 'driver'])->orderBy('created_at', 'desc')->get();

        // Retrieve reservations and available drivers for reservation form
        $reservations = Reservation::all();
        $availableDrivers = User::where('role', 'driver')->where('active', 1)->get();

        return view('pages.app.admin_dashboard', compact(
            'allVehicleTypes',
            'allVehicleModels',
            'vehicleTypes',
            'activeDrivers',
            'totalActiveDrivers',
            'completedBookings',
            'pendingBookings',
            'cancelledBookings',
            'recentBookings',
            'allBookings',
            'drivers',
            'customers',
            'reservations',
            'availableDrivers'
        ));
    }

    public function storeReservation(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'email' => 'required|email',
                'user_id' => 'required|integer',
                'driver_id' => 'required|integer',
                'vehicle_type_id' => 'required|integer',
                'pick_up_location' => 'required|string|max:255',
                'drop_off_location' => 'required|string|max:255',
                'distance' => 'required|numeric',
                'total_amount' => 'required|numeric|min:0',
                'status' => 'required|string|max:50',
                'active' => 'required|boolean',
            ]);

            // Calculate total amount based on distance and vehicle type
            $vehicleType = VehicleTypes::findOrFail($validated['vehicle_type_id']);
            $totalAmount = $vehicleType->perkm_charge * $validated['distance'];

            // Create booking first
            $booking = Bookings::create([
                'user_id' => $validated['user_id'],
                'driver_id' => $validated['driver_id'],
                'pick_up_location' => $validated['pick_up_location'],
                'drop_off_location' => $validated['drop_off_location'],
                'vehicle_type' => $validated['vehicle_type_id'],
                'total_km' => $validated['distance'],
                'total_charged' => $totalAmount,
                'status' => $validated['status'],
                'active' => $validated['active'],
            ]);

            // Create reservation with the booking ID
            $reservation = Reservation::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'booking_id' => $booking->id,
                'user_id' => $validated['user_id'],
                'driver_id' => $validated['driver_id'],
                'pick_up_location' => $validated['pick_up_location'],
                'drop_off_location' => $validated['drop_off_location'],
                'distance' => $validated['distance'],
                'total_amount' => $totalAmount,
                'status' => $validated['status'],
                'active' => $validated['active'],
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Reservation and Booking created successfully',
                'booking' => $booking,
                'reservation' => $reservation
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error creating reservation: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroyReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->back()->with('success', 'Reservation deleted successfully');
    }

    public function toggleReservationStatus($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->active = !$reservation->active;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully');
    }
}
