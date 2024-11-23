<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use App\Models\VehicleTypes;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OtpController extends Controller
{
    // Show the OTP verification form
    public function showVerifyForm($user_id)
    {
        $checkUser = User::where('id','=',$user_id)->first();
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        //dd($checkUser);
        if($checkUser){
            return view('pages.frontend.otp_verify', compact('user_id','allVehicleTypes'));
        }else{
            return redirect()->route('register.index');
        }

    }

    // Verify the OTP
    public function verify(Request $request)
    {
        $otpRecord = Otp::where('user_id', $request->user_id)
                        ->where('otp', $request->otp) // Ensure OTP is not expired
                        ->first();

        $checkUser = User::where('id', $request->user_id)->first();

        if ($otpRecord) {
            // OTP is valid and user exists
            // Mark the user as verified or activate the account
            if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
                // OTP has expired
                $messageType = 'error';
                $message = 'The OTP has expired. Please vist the email and verify it. if not contact system administrator..!!';
                $type = 'expired';
            } elseif ($checkUser) {
                // OTP is valid and user exists
                // Mark the user as verified or activate the account
                $checkUser->update(['status' => 1]);

                // Optionally delete the OTP record to prevent reuse
                $otpRecord->delete();

                $messageType = 'success';
                $message = 'Your account is verified now...!!';
                $type = 'login';
            }
        } else {
            if ($checkUser && $checkUser->status == 1) {
                // User is already verified
                $messageType = 'error';
                $message = 'You are already a registered user, please visit the login page and use your credentials...!!';
                $type = 'login';
            } else {
                // OTP is invalid or expired
                $messageType = 'error';
                $message = 'The OTP is invalid...!!';
                $type = 'same';
            }
        }

        $responseData = [
            'message' => $message,
            'messageType' => $messageType,
            'type' => $type,
        ];

        // Return the JSON response
        return response()->json($responseData);
        //return back()->withErrors(['otp' => 'The OTP is invalid or has expired.']);
    }
}
