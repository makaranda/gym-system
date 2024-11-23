<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerManagementController extends Controller
{
    public function index()
    {
        // Retrieve all customers
        $customers = User::where('role', 'customer')->get();
        return view('pages.app.admin_dashboard', compact('customers'));
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
            'social_medias' => 'nullable|json',
        ]);

        $validated['role'] = 'customer';
        $validated['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/img/users', 'public');
            $validated['image'] = basename($imagePath);
        }

        User::create($validated);

        return redirect()->back()->with('success', 'Customer added successfully');
    }

    public function update(Request $request, $id)
    {
        $customer = User::findOrFail($id);

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
            'social_medias' => 'nullable|json',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('assets/img/users', 'public');
            $validated['image'] = basename($imagePath);
        }

        $customer->update($validated);

        return redirect()->back()->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();

        return redirect()->back()->with('success', 'Customer deleted successfully');
    }

    public function toggleStatus($id)
    {
        $customer = User::findOrFail($id);
        $customer->status = !$customer->status;
        $customer->save();

        return redirect()->back()->with('success', 'Customer status updated successfully');
    }
}
