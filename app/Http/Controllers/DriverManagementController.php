<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DriverManagementController extends Controller
{
    public function index()
    {
        // Retrieve all drivers
        $drivers = User::where('role', 'driver')->get();
        return view('pages.admin.admin_dashboard', compact('drivers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string',
            'language' => 'nullable|string',
            'birthday' => 'nullable|date',
            'password' => 'required|string|min:8',
            'status' => 'boolean',
            'active' => 'boolean',
            'location' => 'nullable|string',
            'taxi_id' => 'nullable|integer',
            'social_medias' => 'nullable|json',
        ]);

        $validated['role'] = 'driver';
        $validated['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/img/users', 'public');
            $validated['image'] = basename($imagePath);
        }

        User::create($validated);

        return redirect()->back()->with('success', 'Driver added successfully');
    }

    public function update(Request $request, $id)
    {
        $driver = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string',
            'language' => 'nullable|string',
            'birthday' => 'nullable|date',
            'status' => 'boolean',
            'active' => 'boolean',
            'location' => 'nullable|string',
            'taxi_id' => 'nullable|integer',
            'social_medias' => 'nullable|json',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/img/users', 'public');
            $validated['image'] = basename($imagePath);
        }

        $driver->update($validated);

        return redirect()->back()->with('success', 'Driver updated successfully');
    }

    public function destroy($id)
    {
        $driver = User::findOrFail($id);
        $driver->delete();

        return redirect()->back()->with('success', 'Driver deleted successfully');
    }

    public function toggleStatus($id)
    {
        $driver = User::findOrFail($id);
        $driver->status = !$driver->status;
        $driver->save();

        return redirect()->back()->with('success', 'Driver status updated successfully');
    }
}
