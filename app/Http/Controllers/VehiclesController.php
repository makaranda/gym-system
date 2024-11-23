<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleModels;

class VehiclesController extends Controller
{
    public function getModelsByType($type_id)
    {
        $vehicleModels = VehicleModels::where('types', $type_id)->get();
        return response()->json($vehicleModels);
    }
}
