<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\VehicleTypes;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        return view('pages.frontend.login',compact('allVehicleTypes')); // Make sure to create this view (auth/login.blade.php)
    }

    /**
     * Handle login request and redirect based on role.
     */

    public function showAdminLogin(Request $request)
    {
    return view('pages.login.index');
    }

    public function login(Request $request)
    {
        // Validate login request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // If validation fails, return error message
        if ($validator->fails()) {
            return response()->json([
                'message' => implode(", ", $validator->errors()->all()),
                'messageType' => 'error',
            ]);
        }
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        // Get login credentials
        //$credentials = $request->only('email', 'password');
        $credentials = [
            $loginType => $request->username,  // Use email or phone depending on the input
            'password' => $request->password
        ];
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();

            // Redirect based on the user's role
            switch ($user->role) {
                case 'admin':
                    $redirectUrl = route('admin.dashboard');
                    break;
                case 'customer':
                    $redirectUrl = route('customer.dashboard');
                    break;
                case 'driver':
                    $redirectUrl = route('driver.dashboard');
                    break;
                case 'staff':
                    $redirectUrl = route('staff.dashboard');
                    break;
                default:
                    // Invalid role; log out the user and return an error message
                    //Auth::logout();
                    return response()->json([
                        'message' => 'Invalid role for this user. Please contact support.',
                        'messageType' => 'error',
                    ]);
            }

            // If everything is correct, return success message and redirect URL
            return response()->json([
                'message' => 'Login successful!',
                'messageType' => 'success',
                'redirectUrl' => $redirectUrl,
            ]);

        } else {
            // Authentication failed, return error message
            return response()->json([
                'message' => 'Invalid email or password.',
                'messageType' => 'error',
            ]);

        }
    }


    /**
     * Logout the user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
