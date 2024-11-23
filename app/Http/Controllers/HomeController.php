<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModels;
use App\Models\VehicleTypes;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        //session()->forget('booking_id');
        $allVehicleTypes = VehicleTypes::where('status', 1)->get();
        $allVehicleModels = VehicleModels::where('status', 1)->get();

        return view('pages.frontend.home',compact('allVehicleTypes','allVehicleModels')); // Make sure to create this view (auth/login.blade.php)
    }
}
