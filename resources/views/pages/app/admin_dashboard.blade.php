@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <h4 class="mb-0">Dashboard</h4>
        </div>

        <div class="mt-4">
            <a href="#main-content" class="nav-link active">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <a href="#analytics" class="nav-link">
                <i class="fas fa-chart-line"></i>
                <span>Manage Drivers</span>
            </a>
            <a href="#users" class="nav-link">
                <i class="fas fa-users"></i>
                <span>Manage Customers</span>
            </a>
            <a href="#settings" class="nav-link">
                <i class="fas fa-cog"></i>
                <span>Reservations</span>
            </a>
            <a href="#reports" class="nav-link">
                <i class="fas fa-file-alt"></i>
                <span>Reports</span>
            </a>
            <a href="#notifications" class="nav-link">
                <i class="fas fa-bell"></i>
                <span>Notifications</span>
            </a>
            <a href="#vehicle-types" class="nav-link">
                <i class="fas fa-car-side"></i>
                <span>Vehicle Types</span>
            </a>
        </div>
        <div class="mt-4">
            <a href="#" class="nav-link bg-danger text-white logoutBtn">
                <i class="fas fa-home"></i>
                <span>Logout</span>
            </a>
        </div>
        <div class="profile-section">
            <div class="profile-card">
                <div class="d-flex align-items-center">
                    <img src="{{ url('public/assets/img/account/user.png') }}" class="rounded-circle" alt="Profile">
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <small>Administrator</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="main-content">
        <div class="container-fluid">
            <!-- Stats Row -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card">
                        <h6 class="text-muted">Active Drivers</h6>
                        <h3 class="mb-0">{{ $totalActiveDrivers }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h6 class="text-muted">Completed Bookings</h6>
                        <h3 class="mb-0">{{ $completedBookings }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h6 class="text-muted">Pending Bookings</h6>
                        <h3 class="mb-0">{{ $pendingBookings }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <h6 class="text-muted">Cancelled Bookings</h6>
                        <h3 class="mb-0">{{ $cancelledBookings }}</h3>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="chart-container">
                        <h5>Active Drivers</h5>
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($activeDrivers as $driver)
                                    <tr>
                                        <td width="50px">
                                            <div class="d-flex align-items-center">
                                                @if($driver->image)
                                                    <img src="{{ url('public/assets/img/account/'.$driver->image.'') }}" class="img-fluid rounded-circle me-2" alt="Driver">
                                                @endif
                                                {{ $driver->name }}
                                            </div>
                                        </td>
                                        <td>{{ $driver->email }}</td>
                                        <td>{{ $driver->phone }}</td>
                                        <td>{{ $driver->location }}</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="chart-container">

                        <h5>Recent Bookings</h5>
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>User</th>
                                        <th>Driver</th>
                                        <th>Pick-up Location</th>
                                        <th>Drop-off Location</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentBookings as $booking)
                                    <tr>
                                        <td>#{{ $booking->id }}</td>
                                        <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                        <td>{{ $booking->driver->name ?? 'N/A' }}</td>
                                        <td>{{ $booking->pick_up_location }}</td>
                                        <td>{{ $booking->drop_off_location }}</td>
                                        <td>${{ number_format($booking->total_charged, 2) }}</td>
                                        <td>
                                            @php
                                                $statusClass = [
                                                    'complete' => 'bg-success',
                                                    'pending' => 'bg-warning',
                                                    'cancel' => 'bg-danger'
                                                ][$booking->status] ?? 'bg-secondary';
                                            @endphp
                                            <span class="badge {{ $statusClass }}">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Activity Row -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="chart-container">
                        <h5>All Bookings</h5>
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Customer</th>
                                        <th>Driver</th>
                                        <th>Pick-up Location</th>
                                        <th>Drop-off Location</th>
                                        <th>Date & Time</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allBookings as $booking)
                                        <tr>
                                            <td>#{{ $booking->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($booking->user && $booking->user->image)
                                                        <img src="{{ url('public/assets/img/account/'.$booking->user->image.'') }}"
                                                            class="rounded-circle me-2 img-fluid"
                                                            alt="User">
                                                    @endif
                                                    {{ $booking->user->name ?? 'N/A' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($booking->driver && $booking->driver->image)
                                                        <img src="{{ url('public/assets/img/account/'.$booking->driver->image.'') }}"
                                                            class="rounded-circle me-2 img-fluid"
                                                            alt="Driver">
                                                    @endif
                                                    {{ $booking->driver->name ?? 'Not Assigned' }}
                                                </div>
                                            </td>
                                            <td>{{ $booking->pick_up_location }}</td>
                                            <td>{{ $booking->drop_off_location }}</td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($booking->pick_up_date)->format('M d, Y') }}
                                                <br>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($booking->pick_up_time)->format('h:i A') }}
                                                </small>
                                            </td>
                                            <td>${{ number_format($booking->total_charged, 2) }}</td>
                                            <td>
                                                @php
                                                    $statusClass = match($booking->status) {
                                                        'complete' => 'bg-success',
                                                        'pending' => 'bg-warning',
                                                        'cancel' => 'bg-danger',
                                                        default => 'bg-secondary'
                                                    };
                                                @endphp
                                                <span class="badge {{ $statusClass }}">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookingDetails{{ $booking->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-sm btn-outline-secondary">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">No bookings found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Details Modals -->
            @foreach($allBookings as $booking)
                <div class="modal fade" id="bookingDetails{{ $booking->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Booking Details #{{ $booking->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Customer Information</h6>
                                        <p><strong>Name:</strong> {{ $booking->user->name ?? 'N/A' }}</p>
                                        <p><strong>Phone:</strong> {{ $booking->user->phone ?? 'N/A' }}</p>
                                        <p><strong>Email:</strong> {{ $booking->user->email ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Driver Information</h6>
                                        <p><strong>Name:</strong> {{ $booking->driver->name ?? 'Not Assigned' }}</p>
                                        <p><strong>Phone:</strong> {{ $booking->driver->phone ?? 'N/A' }}</p>
                                        <p><strong>Email:</strong> {{ $booking->driver->email ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Booking Details</h6>
                                        <p><strong>Vehicle Type:</strong> {{ $booking->vehicle_type }}</p>
                                        <p><strong>Passengers:</strong> {{ $booking->passengers }}</p>
                                        <p><strong>Total Distance:</strong> {{ $booking->total_km }} km</p>
                                        <p><strong>Amount:</strong> ${{ number_format($booking->total_charged, 2) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Location Details</h6>
                                        <p><strong>Pick-up:</strong> {{ $booking->pick_up_location }}</p>
                                        <p><strong>Drop-off:</strong> {{ $booking->drop_off_location }}</p>
                                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->pick_up_date)->format('M d, Y') }}</p>
                                        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($booking->pick_up_time)->format('h:i A') }}</p>
                                    </div>
                                </div>
                                @if($booking->remarks)
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Remarks</h6>
                                            <p>{{ $booking->remarks }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div id="vehicle-types" class="content-section main-content" style="display: none;">
        <h2>Manage Vehicle Types</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add New Vehicle Type Form -->
        <form action="{{ route('vehicle-types.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-4">
                    <input type="file" name="icon" class="form-control" required>
                    <small class="text-muted">Upload an icon image.</small>
                </div>
                <div class="col-md-4">
                    <input type="file" name="map_icon" class="form-control" required>
                    <small class="text-muted">Upload a map icon image.</small>
                </div>
                <div class="col-md-4 mt-2">
                    <input type="number" name="perkm_charge" class="form-control" placeholder="Charge per KM" required min="0">
                </div>
                <div class="col-md-4 mt-2">
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-md-4 mt-2">
                    <button type="submit" class="btn btn-primary w-100">Add Vehicle Type</button>
                </div>
            </div>
        </form>

        <!-- Vehicle Types Table -->
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Map Icon</th>
                        <th>Charge per KM</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicleTypes as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>
                                <img src="{{ asset('public/assets/img/icon/vehicle-types/' . $type->icon) }}" alt="Icon" width="40">
                            </td>
                            <td>{{ $type->name }}</td>
                            <td>
                                <img src="{{ asset('public/assets/img/icon/vehicle-types/' . $type->map_icon) }}" alt="Map Icon" width="40">
                            </td>
                            <td>${{ number_format($type->perkm_charge, 2) }}</td>
                            <td>
                                @if($type->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit Form (in a modal) -->
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editVehicleType{{ $type->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Action -->
                                <form action="{{ route('vehicle-types.destroy', $type->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this vehicle type?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Toggle Status -->
                                <form action="{{ route('vehicle-types.toggle-status', $type->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $type->status ? 0 : 1 }}">
                                    <button class="btn btn-sm {{ $type->status ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                                        <i class="fa-solid fa-toggle-{{ $type->status ? 'off' : 'on' }}"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal for Vehicle Type -->
                        <div class="modal fade" id="editVehicleType{{ $type->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Vehicle Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('vehicle-types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $type->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Icon</label>
                                                <input type="file" name="icon" class="form-control">
                                                <small class="text-muted">Upload a new icon image to replace the current one.</small>
                                            </div>
                                            <div class="form-group">
                                                <label>Map Icon</label>
                                                <input type="file" name="map_icon" class="form-control">
                                                <small class="text-muted">Upload a new map icon to replace the current one.</small>
                                            </div>
                                            <div class="form-group">
                                                <label>Charge per KM</label>
                                                <input type="number" name="perkm_charge" class="form-control" value="{{ $type->perkm_charge }}" required min="0">
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" {{ $type->status ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ !$type->status ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>


    <!-- Tab Panels -->
    <div id="analytics" class="content-section main-content"style="display: none;">
        <h2>Driver Management Section</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add New Driver Form -->
        <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-4 mt-2">
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="col-md-4 mt-2">
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Upload profile image</small>
                </div>
                <div class="col-md-4 mt-2">
                    <button type="submit" class="btn btn-primary w-100">Add Driver</button>
                </div>
            </div>
        </form>

        <!-- Drivers Table -->
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                        <tr>
                            <td>{{ $driver->id }}</td>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->phone }}</td>
                            <td>{{ $driver->email }}</td>
                            <td>{{ $driver->address }}</td>
                            <td>
                                @if($driver->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editDriver{{ $driver->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Action -->
                                <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this driver?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Toggle Status -->
                                <form action="{{ route('drivers.toggle-status', $driver->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm {{ $driver->status ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                                        <i class="fa-solid fa-toggle-{{ $driver->status ? 'off' : 'on' }}"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal for Driver -->
                        <div class="modal fade" id="editDriver{{ $driver->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Driver</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('drivers.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $driver->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $driver->phone }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $driver->email }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" value="{{ $driver->address }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="users" class="content-section main-content" style="display: none;">
        <h2>Manage Customers Section</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add New Customer Form -->
        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-4 mt-2">
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>
                <div class="col-md-4 mt-2">
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Upload profile image</small>
                </div>
                <div class="col-md-4 mt-2">
                    <button type="submit" class="btn btn-primary w-100">Add Customer</button>
                </div>
            </div>
        </form>

        <!-- Customers Table -->
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>
                                @if($customer->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCustomer{{ $customer->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <!-- Delete Action -->
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                                <!-- Toggle Status -->
                                <form action="{{ route('customers.toggle-status', $customer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm {{ $customer->status ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                                        <i class="fa-solid fa-toggle-{{ $customer->status ? 'off' : 'on' }}"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal for Customer -->
                        <div class="modal fade" id="editCustomer{{ $customer->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Customer</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="settings" class="content-section main-content" style="display: none;">
        <h2>Reservations Section</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add New Reservation Form -->
        <form action="{{ route('admin.reservations.store') }}" method="POST" id="reservationForm">
            @csrf
            <div class="row mb-3">
                <!-- Name, Phone, Email -->
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <!-- Vehicle Type Selection -->
                <div class="col-md-3 mt-2">
                    <select name="vehicle_type_id" class="form-control" id="vehicleTypeSelect" required>
                        <option value="" disabled selected>Select Vehicle Type</option>
                        @foreach($vehicleTypes as $type)
                            <option value="{{ $type->id }}" data-perkm="{{ $type->perkm_charge }}">
                                {{ $type->name }} - Rs.{{ number_format($type->perkm_charge, 2) }}/km
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Driver Selection -->
                <div class="col-md-3 mt-2">
                    <select name="driver_id" class="form-control" required>
                        <option value="" disabled selected>Select Driver</option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Pick-up and Drop-off Locations -->
                <div class="col-md-3 mt-2">
                    <input type="text" name="pick_up_location" class="form-control" id="startLocation" placeholder="Pick-up Location" required>
                    <div id="startLocationSuggestions" class="suggestion-box"></div>
                </div>
                <div class="col-md-3 mt-2">
                    <input type="text" name="drop_off_location" class="form-control" id="endLocation" placeholder="Drop-off Location" required>
                    <div id="endLocationSuggestions" class="suggestion-box"></div>
                </div>

                <!-- Total Distance and Calculated Price (Read-Only) -->
                <div class="col-md-3 mt-2">
                    <input type="number" name="distance" class="form-control" id="totalDistance" placeholder="Total Distance (km)" readonly>
                </div>
                <div class="col-md-3 mt-2">
                    <input type="number" name="total_amount" class="form-control" id="totalPrice" placeholder="Total Price" readonly>
                </div>

                <!-- Status Toggle and Active Status -->
                <div class="col-md-3 mt-2">
                    <label>Status:</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="status" id="statusToggle" value="1" checked>
                        <label class="form-check-label" for="statusToggle">Active</label>
                    </div>
                </div>
                <div class="col-md-3 mt-2">
                    <select name="active" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="col-md-3 mt-2">
                    <button type="submit" class="btn btn-primary w-100">Add Reservation</button>
                </div>
            </div>
        </form>

        <!-- Reservations Table -->
        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Driver</th>
                        <th>Pick-up Location</th>
                        <th>Drop-off Location</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($reservations)
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->phone }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->driver->name ?? 'Unassigned' }}</td>
                                <td>{{ $reservation->pick_up_location }}</td>
                                <td>{{ $reservation->drop_off_location }}</td>
                                <td>Rs.{{ number_format($reservation->total_amount, 2) }}</td>
                                <td>
                                    @if($reservation->active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editReservation{{ $reservation->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Delete Action -->
                                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this reservation?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                    <!-- Toggle Status -->
                                    <form action="{{ route('admin.reservations.toggle-status', $reservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm {{ $reservation->active ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                                            <i class="fa-solid fa-toggle-{{ $reservation->active ? 'off' : 'on' }}"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal for Reservation -->
                            <div class="modal fade" id="editReservation{{ $reservation->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Reservation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $reservation->name }}" required>
                                                </div>
                                                <!-- Add other fields similarly as in the add form -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <div id="reports" class="content-section main-content" style="display: none;">
        <h2>Reports Section</h2>
        <!-- Reports content here -->
    </div>

    <div id="notifications" class="content-section main-content" style="display: none;">
        <h2>Notifications Section</h2>
        <!-- Notifications content here -->
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection

@push('css')
<style>
    :root {
        --sidebar-width: 280px;
        --header-height: 70px;
        --primary-gradient: linear-gradient(135deg, #6366F1 0%, #4F46E5 100%);
        --secondary-gradient: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
        --success-gradient: linear-gradient(135deg, #10B981 0%, #059669 100%);
        --danger-gradient: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
        --bg-gradient: linear-gradient(135deg, #F3F4F6 0%, #E5E7EB 100%);
        --card-gradient: linear-gradient(145deg, #ffffff, #f3f4f6);
    }

    .suggestion-box {
        position: absolute;
        background: white;
        border: 1px solid #ddd;
        border-top: none;
        max-height: 200px;
        overflow-y: auto;
        width: 100%;
        z-index: 1000;
        display: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .suggestion-item {
        padding: 8px 12px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
    }

    .suggestion-item:hover {
        background-color: #f5f5f5;
    }

    .suggestion-item:last-child {
        border-bottom: none;
    }

    /* Add position relative to container elements */
    .col-md-3 {
        position: relative;
    }

    body {
        background: var(--bg-gradient);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        min-height: 100vh;
    }

    .sidebar {
        width: var(--sidebar-width);
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        background: var(--card-gradient);
        box-shadow: 5px 0 25px rgba(0, 0, 0, 0.05);
        z-index: 1000;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
    }

    .main-content {
        margin-left: var(--sidebar-width);
        padding: 20px;
        min-height: 100vh;
    }

    .nav-link {
        padding: 15px 25px;
        color: #1D1D1F;
        border-radius: 12px;
        margin: 5px 15px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .nav-link:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--primary-gradient);
        opacity: 0;
        transition: all 0.3s ease;
        z-index: -1;
    }

    .nav-link:hover:before, .nav-link.active:before {
        opacity: 1;
    }

    .nav-link:hover, .nav-link.active {
        color: white;
        transform: translateX(5px);
    }

    .nav-link i {
        width: 24px;
        text-align: center;
        margin-right: 10px;
    }

    .stat-card {
        background: var(--card-gradient);
        border-radius: 16px;
        padding: 25px;
        box-shadow: 20px 20px 60px #d1d1d1, -20px -20px 60px #ffffff;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }

    .stat-card:hover {
        transform: translateY(-5px) scale(1.02);
    }

    .chart-container {
        background: var(--card-gradient);
        border-radius: 16px;
        padding: 25px;
        box-shadow: 20px 20px 60px #d1d1d1, -20px -20px 60px #ffffff;
        margin-top: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo-container {
        padding: 25px;
        background: var(--primary-gradient);
        margin-bottom: 20px;
    }

    .logo-container h4 {
        color: white;
        margin: 0;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .profile-section {
        position: absolute;
        bottom: 20px;
        width: 100%;
        padding: 0 15px;
    }

    .profile-card {
        background: var(--secondary-gradient);
        border-radius: 12px;
        padding: 6px 6px;
        color: white;
    }

    .profile-card h6, .profile-card small {
        color: white;
    }

    .chart-placeholder {
        width: 100%;
        height: 300px;
        background: var(--bg-gradient);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #86868B;
    }

    .badge {
        padding: 8px 12px;
        border-radius: 8px;
    }

    .bg-success {
        background: var(--success-gradient) !important;
    }

    .bg-primary {
        background: var(--primary-gradient) !important;
    }

    .bg-warning {
        background: linear-gradient(135deg, #FBBF24 0%, #D97706 100%) !important;
    }

    .custom-table {
        border-collapse: separate;
        border-spacing: 0 8px;
    }

    .custom-table tr {
        background: var(--card-gradient);
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .custom-table td, .custom-table th {
        padding: 15px;
        border: none;
    }

    .custom-table td:first-child {
        border-top-left-radius: 12px;
        border-bottom-left-radius: 12px;
    }

    .custom-table td:last-child {
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    /* Glass morphism effects */
    .glass-effect {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-gradient);
        border-radius: 4px;
    }

    /* Animation for stats */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card {
        animation: fadeInUp 0.5s ease forwards;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }

    .rounded-circle{
        width: 30% !important;
    }
</style>
@endpush

@push('scripts')
<script>


    $('.logoutBtn').on('click',function(event){
        event.preventDefault(); // Prevent immediate navigation
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the logout (you can customize the action here)
                window.location.href = "{{ route('login.logout') }}"; // Adjust to your actual logout route
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link');
        const contentSections = document.querySelectorAll('.content-section');
        const mainContent = document.getElementById('main-content');

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all links
                navLinks.forEach(l => l.classList.remove('active'));

                // Add active class to clicked link
                this.classList.add('active');

                // Hide all content sections and main content
                contentSections.forEach(section => section.style.display = 'none');
                mainContent.style.display = 'none';

                // Show the corresponding content section or main content if 'Home' is clicked
                const targetId = this.getAttribute('href').replace('#', '');
                if(targetId === 'main-content') {
                    mainContent.style.display = 'block';
                } else {
                    const targetSection = document.getElementById(targetId);
                    if(targetSection) targetSection.style.display = 'block';
                }
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function () {
        const startLocation = document.getElementById('startLocation');
        const endLocation = document.getElementById('endLocation');
        const vehicleTypeSelect = document.getElementById('vehicleTypeSelect');
        const totalDistanceInput = document.getElementById('totalDistance');
        const totalPriceInput = document.getElementById('totalPrice');
        const ORS_API_KEY = "5b3ce3597851110001cf6248c29a9e63be404b1f91192c6c65a3b2f4";

        startLocation.addEventListener('input', debounce(() => handleLocationInput('startLocation'), 500));
        endLocation.addEventListener('input', debounce(() => handleLocationInput('endLocation'), 500));
        vehicleTypeSelect.addEventListener('change', calculateDistanceAndPrice);

        function debounce(func, wait) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        function calculateHaversineDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Earth's radius in kilometers
            const dLat = toRad(lat2 - lat1);
            const dLon = toRad(lon2 - lon1);

            const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                    Math.sin(dLon/2) * Math.sin(dLon/2);

            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
            const distance = R * c;

            return Math.round(distance * 100) / 100; // Round to 2 decimal places
        }

        function toRad(degrees) {
            return degrees * (Math.PI/180);
        }

        async function handleLocationInput(inputId) {
            const input = document.getElementById(inputId);
            if (input.value.length >= 3) {
                await fetchLocationSuggestions(inputId);
                if (startLocation.value && endLocation.value) {
                    calculateDistanceAndPrice();
                }
            }
        }

        async function fetchLocationSuggestions(inputId) {
            const input = document.getElementById(inputId);
            const query = input.value;
            const suggestionBox = document.getElementById(inputId + 'Suggestions');

            try {
                const response = await fetch(`https://api.openrouteservice.org/geocode/search?api_key=${ORS_API_KEY}&text=${encodeURIComponent(query)}, Sri Lanka`);
                const data = await response.json();

                suggestionBox.innerHTML = '';

                if (data.features && data.features.length) {
                    data.features.forEach(feature => {
                        const div = document.createElement('div');
                        div.className = 'suggestion-item';
                        div.textContent = feature.properties.label;
                        div.onclick = () => {
                            input.value = feature.properties.label;
                            const [lon, lat] = feature.geometry.coordinates;
                            input.setAttribute('data-lat', lat);
                            input.setAttribute('data-lon', lon);
                            suggestionBox.style.display = 'none';
                            if (startLocation.value && endLocation.value) {
                                calculateDistanceAndPrice();
                            }
                        };
                        suggestionBox.appendChild(div);
                    });
                    suggestionBox.style.display = 'block';
                }
            } catch (error) {
                console.error('Error fetching suggestions:', error);
            }
        }

        async function calculateDistanceAndPrice() {
            const startLat = parseFloat(startLocation.getAttribute('data-lat'));
            const startLon = parseFloat(startLocation.getAttribute('data-lon'));
            const endLat = parseFloat(endLocation.getAttribute('data-lat'));
            const endLon = parseFloat(endLocation.getAttribute('data-lon'));

            if (isNaN(startLat) || isNaN(startLon) || isNaN(endLat) || isNaN(endLon)) return;

            const selectedOption = vehicleTypeSelect.options[vehicleTypeSelect.selectedIndex];
            const perKmCharge = parseFloat(selectedOption.dataset.perkm);

            if (isNaN(perKmCharge)) return;

            // Calculate distance using Haversine formula
            const distance = calculateHaversineDistance(startLat, startLon, endLat, endLon);
            totalDistanceInput.value = distance;

            // Calculate total price
            const totalPrice = Math.round((distance * perKmCharge) * 100) / 100;
            totalPriceInput.value = totalPrice;

            // Send data to backend for processing
            try {
                const response = await fetch('/update-price-distance', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        distancekm: distance,
                        map_booking_id: document.querySelector('[name="booking_id"]')?.value
                    })
                });

                const data = await response.json();
                // Update UI with response if needed
            } catch (error) {
                console.error('Error updating price and distance:', error);
            }
        }
    });
</script>


@endpush
