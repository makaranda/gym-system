<?php

namespace App\Http\Controllers;

use App\Models\VehicleTypes;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function store(Request $request)
    {
        // Validation and file upload logic
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'perkm_charge' => 'required|numeric|min:0',
                'status' => 'boolean'
            ]);

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('assets/img/icon', 'public');
                $validated['icon'] = basename($iconPath);
            }

            if ($request->hasFile('map_icon')) {
                $mapIconPath = $request->file('map_icon')->store('assets/img/icon', 'public');
                $validated['map_icon'] = basename($mapIconPath);
            }

            VehicleTypes::create($validated);

            return redirect()->back()->with('success', 'Vehicle type added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add vehicle type');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $vehicleType = VehicleTypes::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'perkm_charge' => 'required|numeric|min:0',
                'status' => 'boolean'
            ]);

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('assets/img/icon', 'public');
                $validated['icon'] = basename($iconPath);
            }

            if ($request->hasFile('map_icon')) {
                $mapIconPath = $request->file('map_icon')->store('assets/img/icon', 'public');
                $validated['map_icon'] = basename($mapIconPath);
            }

            $vehicleType->update($validated);

            return redirect()->back()->with('success', 'Vehicle type updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update vehicle type');
        }
    }

    public function destroy($id)
    {
        try {
            $vehicleType = VehicleTypes::findOrFail($id);
            $vehicleType->delete();

            return redirect()->back()->with('success', 'Vehicle type deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete vehicle type');
        }
    }

    public function toggleStatus(Request $request, $id)
    {
        try {
            $vehicleType = VehicleTypes::findOrFail($id);
            $vehicleType->status = $request->status;
            $vehicleType->save();

            return redirect()->back()->with('success', 'Vehicle type status updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update vehicle type status');
        }
    }


    public function index()
    {
        // Retrieve all vehicle types from the database
        $vehicleTypes = VehicleTypes::all();

        // Pass vehicle types to the view
        return view('pages.admin.vehicle_types', compact('vehicleTypes'));
    }
}
