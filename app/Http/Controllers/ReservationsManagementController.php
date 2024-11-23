<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationsManagementController extends Controller
{
    public function index()
    {
        // Retrieve all reservations and available drivers
        $reservations = Reservation::all();
        $availableDrivers = User::where('role', 'driver')->where('active', 1)->get();

        return view('pages.app.admin_dashboard', compact('reservations', 'availableDrivers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'booking_id' => 'required|integer',
            'user_id' => 'required|integer',
            'driver_id' => 'required|integer',
            'pick_up_location' => 'required|string|max:255',
            'drop_off_location' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
            'active' => 'boolean',
        ]);

        Reservation::create($validated);

        return redirect()->back()->with('success', 'Reservation added successfully');
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'booking_id' => 'required|integer',
            'user_id' => 'required|integer',
            'driver_id' => 'required|integer',
            'pick_up_location' => 'required|string|max:255',
            'drop_off_location' => 'required|string|max:255',
            'distance' => 'required|numeric',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
            'active' => 'boolean',
        ]);

        $reservation->update($validated);

        return redirect()->back()->with('success', 'Reservation updated successfully');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->back()->with('success', 'Reservation deleted successfully');
    }

    public function toggleStatus($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->active = !$reservation->active;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation status updated successfully');
    }
}
