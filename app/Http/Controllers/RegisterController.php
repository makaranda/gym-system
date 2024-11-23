<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\VehicleTypes;

class RegisterController extends Controller
{
    /**
     * Register a new customer.
     */
    public function registerCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users', // Validate phone number
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $messageType = 'error';
            //$message = $validator->errors();
            $message = implode(", ", $validator->errors()->all());
            $user_id = 0;
        }else{
            // // Create the customer
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone, // Assuming phone is stored
                'password' => Hash::make($request->password),
                'role' => 'customer', // Set role as customer
            ]);

            // Generate OTP
            $otp = $this->generateOtp($user->id);

            // Send OTP via SMS Gateway
            $this->sendOtpSms($request->phone,$request->name, $otp);

            // Redirect to OTP verification form
            $messageType = 'success';
            $message = 'You have successfully Register this Customer Account record..';
            $user_id = $user->id;
        }
        $responseData = [
            'message' => $message,
            'messageType' => $messageType,
            'user_id' => $user_id
        ];
        //echo $message;
        return response()->json($responseData);
        //return redirect()->route('otp.verify', ['user_id' => $user->id]);
    }

    /**
     * Register a new driver.
     */
    public function registerDriver(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users', // Validate phone number
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            $messageType = 'error';
            $message = implode(", ", $validator->errors()->all());
            $user_id = 0;
        }else{
        // // Create the driver
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email ?? null,
                'phone' => $request->phone, // Assuming phone is stored
                'password' => Hash::make($request->password),
                'role' => 'driver', // Set role as driver
            ]);

            // Generate OTP
            $otp = $this->generateOtp($user->id);

            // Send OTP via SMS Gateway
            $this->sendOtpSms($user->phone,$user->name, $otp);

            $messageType = 'success';
            $message = 'You have successfully Register this Driver Account record...!!';
            $user_id = $user->id;
        }

        $responseData = [
            'message' => $message,
            'messageType' => $messageType,
            'user_id' => $user_id
        ];
        //echo $message;
        return response()->json($responseData);
        // Redirect to OTP verification form
        //return redirect()->route('otp.verify', ['user_id' => $user->id]);
    }

    /**
     * Generate OTP and store it in the database.
     */
    protected function generateOtp($userId)
    {
        //$otp = Str::random(6); // Generate a random 6-digit OTP (you can also use rand() if preferred)
        $otp = random_int(10000, 99999);
        Otp::create([
            'user_id' => $userId,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10), // OTP expires in 10 minutes
        ]);

        return $otp;
    }

    /**
     * Send OTP via SMS Gateway.
     */
    protected function sendOtpSms($phone, $name, $otp)
    {
        try {
            // Prepare the message body
            function boldUnicode($text) {
                $bold_map = [
                    'a' => '𝗮', 'b' => '𝗯', 'c' => '𝗰', 'd' => '𝗱', 'e' => '𝗲', 'f' => '𝗳', 'g' => '𝗴', 'h' => '𝗵', 'i' => '𝗶', 'j' => '𝗷', 'k' => '𝗸', 'l' => '𝗹', 'm' => '𝗺', 'n' => '𝗻', 'o' => '𝗼', 'p' => '𝗽', 'q' => '𝗾', 'r' => '𝗿', 's' => '𝘀', 't' => '𝘁', 'u' => '𝘂', 'v' => '𝘃', 'w' => '𝘄', 'x' => '𝘅', 'y' => '𝘆', 'z' => '𝘇',
                    'A' => '𝗔', 'B' => '𝗕', 'C' => '𝗖', 'D' => '𝗗', 'E' => '𝗘', 'F' => '𝗙', 'G' => '𝗚', 'H' => '𝗛', 'I' => '𝗜', 'J' => '𝗝', 'K' => '𝗞', 'L' => '𝗟', 'M' => '𝗠', 'N' => '𝗡', 'O' => '𝗢', 'P' => '𝗣', 'Q' => '𝗤', 'R' => '𝗥', 'S' => '𝗦', 'T' => '𝗧', 'U' => '𝗨', 'V' => '𝗩', 'W' => '𝗪', 'X' => '𝗫', 'Y' => '𝗬', 'Z' => '𝗭',
                    '0' => '𝟬', '1' => '𝟭', '2' => '𝟮', '3' => '𝟯', '4' => '𝟰', '5' => '𝟱', '6' => '𝟲', '7' => '𝟳', '8' => '𝟴', '9' => '𝟵'
                ];
                return strtr($text, $bold_map);
            }

            $bold_text = boldUnicode("OTP Number : $otp");
            $message = "Dear $name,\nPlease use the following OTP to verify your account \n$bold_text\nCheers,\nEsoft Taxi Team";

            //$message = "Dear $name,\nPlease use the following OTP to verify your account \nOTP Number : $otp\nCheers,\nEsoft Taxi Team";

            // Send the request to the SMS API
            $response = Http::withHeaders([
                'Authorization' => 'Bearer 2287|gbVI7WdVoG69zUFAV4cxCDddN0HsTUgiwgC86QvG',
            ])->post('https://sms.send.lk/api/v3/sms/send', [
                'recipient' => $phone,
                'sender_id' => 'SendTest', // Use your actual sender ID
                'message' => $message,
            ]);

            // Check if the response was successful
            if ($response->successful()) {
                // Optional: Log the success message or perform any additional action
                //\Log::info('OTP SMS sent successfully', ['phone' => $phone, 'response' => $response->json()]);
            } else {
                // Log the failure and response details
               // \Log::error('Failed to send OTP SMS', ['phone' => $phone, 'response' => $response->body()]);
               // throw new \Exception('Failed to send OTP SMS. Please try again later.');
            }
        } catch (\Exception $e) {
            // Catch and log any exceptions that occur
            // \Log::error('Exception occurred while sending OTP SMS', [
            //     'phone' => $phone,
            //     'error' => $e->getMessage(),
            // ]);
        }
    }


    /**
     * Show the registration form for customers.
     */
    public function indexRegister()
    {
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        return view('pages.frontend.regsiter_home',compact('allVehicleTypes'));
    }

    public function showCustomerRegisterForm()
    {
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        return view('pages.frontend.regsiter_customer',compact('allVehicleTypes'));
    }

    /**
     * Show the registration form for drivers.
     */
    public function showDriverRegisterForm()
    {
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        return view('pages.frontend.regsiter_driver',compact('allVehicleTypes'));
    }
}
