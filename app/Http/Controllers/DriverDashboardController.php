<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

class DriverDashboardController extends Controller
{
    protected $routeService;
    public function __construct(RouteService $routeService)
    {
        $this->routeService = $routeService;
    }
    public function index(){
        $driver_id = Auth::user()->id;
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();

        $allUpcommingBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->where('pick_up_date',date('Y-m-d'))->whereIn('active', ['pending', 'active'])->count();

        $getAllBookings = Bookings::where('status', 1)->where('driver_id', $driver_id)->get();

        $allTotalBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->count();

        $allCancelBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->whereIn('active',['cancel'])->count();

        return view('pages.frontend.driver_dashboard',compact('allVehicleTypes','allVehicleModels','allUpcommingBooking','allTotalBooking','allCancelBooking','getAllBookings'));
    }

    public function driverTaxis(){
        $driver_id = Auth::user()->id;
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();

        $allUpcommingBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->where('pick_up_date',date('Y-m-d'))->whereIn('active', ['pending', 'active'])->count();

        $allTotalBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->count();

        $allCancelBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->whereIn('active',['cancel'])->count();

        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();
        return view('pages.frontend.driver_dashboard_taxis',compact('allVehicleTypes','allVehicleModels','allUpcommingBooking','allTotalBooking','allCancelBooking'));
    }

    public function driverBooking(){
        $driver_id = Auth::user()->id;
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();

        $allUpcommingBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->where('pick_up_date',date('Y-m-d'))->whereIn('active', ['pending', 'active'])->count();

        $allTotalBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->count();

        $allCancelBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->whereIn('active',['cancel'])->count();

        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();
        return view('pages.frontend.driver_dashboard_booking',compact('allVehicleTypes','allVehicleModels','allUpcommingBooking','allTotalBooking','allCancelBooking'));
    }

    public function driverPaymentHistory(){
        $driver_id = Auth::user()->id;
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();

        $getAllBookings = Bookings::where('status', 1)->where('driver_id', $driver_id)->where('active','<>','cancel')->get();

        $allUpcommingBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->where('pick_up_date',date('Y-m-d'))->whereIn('active', ['pending', 'active'])->count();

        $allTotalBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->count();

        $allCancelBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->whereIn('active',['cancel'])->count();

        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();
        return view('pages.frontend.driver_dashboard_payment_history',compact('allVehicleTypes','allVehicleModels','allUpcommingBooking','allTotalBooking','allCancelBooking','getAllBookings'));
    }

    public function driverCancelBooking(){
        $driver_id = Auth::user()->id;
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();

        $getAllBookings = Bookings::where('status', 1)->where('driver_id', $driver_id)->whereNotIn('active', ['cancel', 'complete'])->get();

        $allUpcommingBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->where('pick_up_date',date('Y-m-d'))->whereIn('active', ['pending', 'active'])->count();

        $allTotalBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->count();

        $allCancelBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->whereIn('active',['cancel'])->count();

        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();
        return view('pages.frontend.driver_dashboard_cancel_booking',compact('allVehicleTypes','allVehicleModels','allUpcommingBooking','allTotalBooking','allCancelBooking','getAllBookings'));
    }

    public function driverProfile(){
        $driver_id = Auth::user()->id;
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();
        $allTaxis = Taxis::where('status', 1)
                ->where('user_id', $driver_id)
                ->get();

        $allUpcommingBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->where('pick_up_date',date('Y-m-d'))->whereIn('active', ['pending', 'active'])->count();

        $allTotalBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->count();

        $allCancelBooking = Bookings::where('status', 1)->where('driver_id', $driver_id)->whereIn('active',['cancel'])->count();

        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();
        return view('pages.frontend.driver_dashboard_profile',compact('allVehicleTypes','allVehicleModels','allTaxis','allUpcommingBooking','allTotalBooking','allCancelBooking'));
    }

    public function driverCancelBookingForm(Request $request){
        $booking = Bookings::find($request->booking_id);
        $messageType = '';
        $message = '';

        $validator = Validator::make($request->all(), [
            'booking_id' => 'required|exists:bookings,id',
            'choose_reason' => 'required',
            'comments' => 'required'
        ]);
        //booking_id choose_reason comments

        if ($validator->fails()) {
            $messageType = 'error';
            $message = 'Validation failed: ' . implode(', ', $validator->errors()->all());
        }

        try {
            $userData = [
                'reason' => $request->choose_reason,
                'remarks' => $request->comments,
                'cancel_user_id' => Auth::user()->id,
                'active' => 'cancel',
            ];

            $booking->update($userData);
            $messageType = 'success';
            $message = 'Booking has been successfully cancelled.';

        } catch (\Exception $e) {
            $messageType = 'error';
            $message = 'An error occurred while saving the user data: ' . $e->getMessage();
        }

        $responseData = [
            'messageType' => $messageType,
            'message' => $message
        ];
        return response()->json($responseData);
    }

    public function driverUpdatePassword(Request $request)
    {
        // Validate the input data
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required', // confirm_password must match new_password
        ]);

        // Check if the old password matches
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return response()->json([
                'messageType' => 'error',
                'message' => 'Old password is incorrect.'
            ]);
        }

        // Update the user's password
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Return success response
        return response()->json([
            'messageType' => 'success',
            'message' => 'Password updated successfully!'
        ]);
    }

    public function activedriverTaxis(Request $request){
        $user = Auth::user();
        $updateTaxi = Taxis::where('status', 1)
                ->where('id', $request->taxi_id)
                ->where('user_id', $user->id)
                ->first();

        if ($updateTaxi) {
            // Toggle the taxi status
            $taxi_status = $request->taxi_status == 1 ? 0 : 1;

            // Update the status in the database
            $updateTaxi->status = $taxi_status;
            $updateTaxi->save();

            // Return success response to the AJAX request
            return response()->json([
            'messageType' => 'success',
            'message' => 'Taxi status updated successfully!',
            'newStatus' => $taxi_status // Optional: return the new status for frontend use
            ]);
        }

        // If taxi not found, return an error response
        return response()->json([
            'messageType' => 'error',
            'message' => 'Taxi not found or unauthorized action.',
        ], 404);
    }

    public function driverUpdateProfile(Request $request){
        $user = Auth::user();

        // Update user details
        $user->name = $request->user_name;
        $user->gender = $request->user_gender;
        $user->birthday = $request->user_birthday;
        $user->email = $request->user_email;
        $user->phone = $request->user_phone;
        $user->address = $request->user_address;
        $user->active = $request->user_active;
        $user->taxi_id = $request->user_active_taxi;
        $user->location = $request->user_location_long_lat;
        $user->save();

        // Return response to the AJAX request
        return response()->json([
            'messageType' => 'success',
            'message' => 'Profile updated successfully!'
        ]);
    }

    public function fetchdriverTaxis(Request $request){
        $taxisDetails = Taxis::where('status', 1)->where('user_id', Auth::user()->id)->get();

        $fetchTable = '<table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="150px">Image</th>
                            <th>Title</th>
                            <th>Vehicle Type</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($taxisDetails as $key => $taxisDetail) {
            $vehicleTypesDetails = VehicleTypes::where('id', $taxisDetail->type)->where('status', 1)->first();

            $vehicleTypeName = strtolower(str_replace(' ', '', $vehicleTypesDetails->name ?? 'default'));

            $fetchTable .= '<tr>
                            <td>'. ($key + 1) .'</td>
                            <td width="150px"><img src="'.url('public/assets/img/taxi/'.$vehicleTypeName.'/'.$taxisDetail->image).'" class="img-fluid"/></td>
                            <td>'.$taxisDetail->title.'</td>
                            <td>'.($vehicleTypesDetails ? $vehicleTypesDetails->name : 'N/A').'</td>
                            <td>'.$taxisDetail->year.'</td>
                            <td>'.($taxisDetail->status == 1 ? 'Active' : 'Inactive').'</td>
                            <td>
                                <button type="button" class="activeTaxis btn btn-sm btn-warning" data-id="'.$taxisDetail->id.'/'.$taxisDetail->user_id.'/'.$taxisDetail->status.'">
                                    <i class="far fa-'.($taxisDetail->status == 1 ? 'eye' : 'eye-slash').'"></i>
                                </button>
                            </td>
                        </tr>';
        }

        $fetchTable .= '</tbody>
                    </table>';

        echo $fetchTable;
    }

    public function addDriverTaxi(Request $request){
        $messageType = '';
        $message = '';
        try {
            // Validation rules
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'type' => 'required|integer|exists:vehicle_types,id', // Ensure it exists in vehicle_types table
                'doors' => 'required|integer|min:1',
                'passengers' => 'required|integer|min:1',
                'luggage_carry' => 'required|integer|min:0',
                'transmission' => 'required|string|in:automatic,manual',
                'year' => 'required|integer|min:1900|max:' . date('Y'),
                'fuel_type' => 'required|string|in:petrol,diesel',
                'air_condition' => 'required',
                'gps' => 'required',
                'engine' => 'required|string|max:50',
                'registered_no' => 'required|string|max:100',
                'description' => 'nullable|string',
                'status' => 'required',
            ]);

            // Return validation errors if validation fails
            if ($validator->fails()) {
                return response()->json([
                    'message' => implode(', ', $validator->errors()->all()),
                    'messageType' => 'error'
                ]);
            }

            // Get the authenticated user's ID
            $userId = Auth::user()->id ?? 20;
            if (is_null($userId)) {
                return response()->json([
                    'messageType' => 'error',
                    'message' => 'User not authenticated.',
                ], 403);
            }

            // Handle image upload
            $vehicleTypes = VehicleTypes::where('id', $request->type)->where('status', 1)->first();
            $vehicleTypeName = strtolower(str_replace(' ', '', $vehicleTypes->name ?? 'default'));
            $imageDirectory = 'assets/img/taxi/' . $vehicleTypeName;

            // Ensure the directory exists
            if (!Storage::disk('public')->exists($imageDirectory)) {
                Storage::disk('public')->makeDirectory($imageDirectory);
            }
            // Set a default image name
            $imageName = 'taxi_sample.png'; // Default image name

            // If an image is uploaded, store it in the designated directory and update $imageName
            if ($request->hasFile('image')) {
                $imageName = $request->file('image')->getClientOriginalName();
                $stored = $request->file('image')->storeAs($imageDirectory, $imageName, 'public');
                if (!$stored) {
                    return response()->json([
                        'message' => 'Failed to store the image.',
                        'messageType' => 'error'
                    ]);
                }
            }

            // Save taxi data
            $addTaxi = Taxis::create([
                'user_id' => $userId, // Ensure user_id is passed correctly
                'title' => ''.$request->title.'',
                'type' => $request->type,
                'doors' => $request->doors,
                'passengers' => $request->passengers,
                'luggage_carry' => $request->luggage_carry,
                'transmission' => $request->transmission,
                'year' => $request->year,
                'fuel_type' => $request->fuel_type,
                'air_condition' => $request->air_condition,
                'gps' => $request->gps,
                'engine' => $request->engine,
                'registered_no' => $request->registered_no,
                'image' => ''.$imageName.'' ?? 'taxi_sample.png',
                'description' => $request->description ?? '',
                'status' => $request->status,
            ]);
            if($addTaxi){
                // Return success response to AJAX
                return response()->json([
                    'messageType' => 'success',
                    'message' => 'Taxi added successfully!',
                ]);
            }else{
                return response()->json([
                    'messageType' => 'error',
                    'message' => 'There have something wrong!',
                ]);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage()); // Log the exact error
            return response()->json(['message' => 'An error occurred AA: '. Auth::user()->id  .''. $e->getMessage() , 'messageType' => 'error'], 500);
        }
    }



    public function fetchPaymentHistory(Request $request){
        $paymentsPayments = Payments::where('status', 1)->where('driver_id', Auth::user()->id)->where('active', 'active')->get();
        $fetchTable = '<table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="150px">Booking ID</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th width="150px">Destance</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';


        foreach ($paymentsPayments as $key => $paymentsPayment) {
            $reservationsDetails = Reservation::where('id', $paymentsPayment->reservation_id)->where('status', 1)->where('active', 'active')->first();
            $bookingDetails = Bookings::where('id', $reservationsDetails->booking_id)->where('status', 1)->where('active', 'complete')->first();
            $booking_id = $bookingDetails->id ?? 0;

            $time =  $bookingDetails->pick_up_time ?? '';
            $date =  $bookingDetails->pick_up_date ?? '';

            $pickupTime = date("h:i A", strtotime($time));
            $pickupDate = date("d F, Y", strtotime($date));

            $address = '';
            //$address = $this->routeService->reverseGeocode($latitude, $longitude);
            switch ($paymentsPayment->active) {
                case 'active':
                    $statusClass = 'success';
                    $statusTitle = 'Completed';
                    break;
                case 'inactive':
                    $statusClass = 'danger';
                    $statusTitle = 'Incomplete';
                    break;
                case 'pending':
                    $statusClass = 'info';
                    $statusTitle = 'Pending';
                    break;
                case 'cancel':
                    $statusClass = 'danger';
                    $statusTitle = 'Cancel';
                    break;
                default:
                    $statusClass = 'warning';
                    $statusTitle = 'Completed';
                    break;
            }

            $fetchTable .='<tr>
                            <td>'. ($key + 1) .'</td>
                            <td width="150px"> '.$booking_id.'
                            </td>
                            <td>'.$pickupDate.'</td>
                            <td>'.$pickupTime.'</td>
                            <td width="150px">
                               '.$paymentsPayment->distance.' km
                            </td>
                            <td>Rs '.$paymentsPayment->total_amount.'</td>
                            <td><span class="badge badge-'.$statusClass.' text-capitalize">'.$statusTitle.'</span></td>
                            </tr>';

        }

        $fetchTable .= '</tbody>
                    </table>';
        echo $fetchTable ;
    }

    public function fetchdriverBooking(Request $request){
        $allPendingBookings = Bookings::where('status', 1)->where('driver_id', Auth::user()->id)->whereIn('active', ['complete','pending','active','cancel'])->get();
        $fetchTable = '<table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="150px">Cab Info</th>
                            <th>Journey Date</th>
                            <th width="150px">Distance</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';


        foreach ($allPendingBookings as $key => $pendingBooking) {

            if($pendingBooking->driver_id){
                $taxis_detail = Taxis::where('status',1)->where('user_id','=',$pendingBooking->driver_id)->first();
                $title = $taxis_detail->title;
                $taxi_img = isset($taxis_detail->image) ? $taxis_detail->image : 'taxi_sample.png';
            }else{
                $title = '';
                $taxi_img = 'taxi_sample.png';
            }


            $booking_id = $pendingBooking->id;

            $time = $pendingBooking->pick_up_date;
            $pickupTime = date("h:i A", strtotime($time));
            $date = $pendingBooking->pick_up_date;
            $pickupDate = date("d F, Y", strtotime($date));


            list($latitude, $longitude) = explode(',', $pendingBooking->pick_up_location);
            $address = '';
            //$address = $this->routeService->reverseGeocode($latitude, $longitude);

            switch ($pendingBooking->active) {
                case 'complete':
                    $statusClass = 'success';
                    break;
                case 'pending':
                    $statusClass = 'primary';
                    break;
                case 'active':
                    $statusClass = 'info';
                    break;
                case 'cancel':
                    $statusClass = 'danger';
                    break;
                default:
                    $statusClass = 'warning'; // fallback class if needed
                    break;
            }

            $fetchTable .='<tr>
                            <td>'. ($key + 1) .'</td>
                                <td width="150px">
                                <div class="table-list-info">
                                <a href="#">
                                    <img src="'.url('public/assets/img/taxi/'.$taxi_img.'').'" alt>
                                    <div class="table-list-content">
                                        <h6>'.$title.'</h6>
                                        <span>Booking ID: #'.$pendingBooking->id.'</span>
                                    </div>
                                </a>
                                </div>
                            </td>
                            <td>
                            <span>'.$pickupDate.'</span>
                            <p>'.$pickupTime.'</p>
                            </td>
                            <td width="150px">
                                '.$pendingBooking->total_km.' km
                            </td>
                            <td>Rs '.$pendingBooking->total_charged.'</td>
                            <td><span class="badge badge-'.$statusClass.' text-capitalize">'.$pendingBooking->active.'</span></td>
                            </tr>';

        }

        $fetchTable .= '</tbody>
                    </table>';
        echo $fetchTable ;
    }

    public function fetchPedingBooking(Request $request){

        $allPendingBookings = Bookings::where('status', 1)->where('active', 'pending')->where('driver_id',Auth::user()->id)->where('pick_up_date',date('Y-m-d'))->get();

        $fetchTable = '<table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="150px">Cab Info</th>
                            <th>Journey Date</th>
                            <th width="150px">Distance</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';


        foreach ($allPendingBookings as $key => $pendingBooking) {

            if($pendingBooking->driver_id){
                $taxis_detail = Taxis::where('status',1)->where('user_id','=',$pendingBooking->driver_id)->first();
                $title = $taxis_detail->title;
                $taxi_img = isset($taxis_detail->image) ? $taxis_detail->image : 'taxi_sample.png';
            }else{
                $title = '';
                $taxi_img = 'taxi_sample.png';
            }


            $booking_id = $pendingBooking->id;

            $time = $pendingBooking->pick_up_date;
            $pickupTime = date("h:i A", strtotime($time));
            $date = $pendingBooking->pick_up_date;
            $pickupDate = date("d F, Y", strtotime($date));


            list($latitude, $longitude) = explode(',', $pendingBooking->pick_up_location);
            $address = '';
            //$address = $this->routeService->reverseGeocode($latitude, $longitude);
            // '.$address.'/
            // '.$latitude.'/
            // '.$longitude.'
            $fetchTable .='<tr>
                            <td>'. ($key + 1) .'</td>
                                <td width="150px">
                                <div class="table-list-info">
                                <a href="#">
                                    <img src="'.url('public/assets/img/taxi/'.$taxi_img.'').'" alt>
                                    <div class="table-list-content">
                                        <h6>'.$title.'</h6>
                                        <span>Booking ID: #'.$pendingBooking->id.'</span>
                                    </div>
                                </a>
                                </div>
                            </td>
                            <td>
                            <span>'.$pickupDate.'</span>
                            <p>'.$pickupTime.'</p>
                            </td>
                            <td width="150px">
                                '.$pendingBooking->total_km.' km
                            </td>
                            <td>Rs '.$pendingBooking->total_charged.'</td>
                            <td><span class="badge badge-primary text-capitalize">'.$pendingBooking->active.'</span></td>
                            </tr>';

        }

        $fetchTable .= '</tbody>
                    </table>';
        echo $fetchTable ;
        // $responseData = [
        //     'pending_booking' => $fetchTable,
        // ];
        //return response()->json($responseData);
    }
}
