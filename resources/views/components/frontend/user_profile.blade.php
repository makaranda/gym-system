

@php
     $log_user = Auth::user();
    // Redirect based on the user's role
    switch ($log_user->role) {
        case 'admin':
            $redirectUrl = route('admin.dashboard');
            $profile = route('admin.profile');
            $booking = '';
            $taxis = '';
            $setting = route('customer.profile');
            break;
        case 'customer':
            $redirectUrl = route('customer.dashboard');
            $profile = route('customer.profile');
            $booking = route('customer.booking');
            $taxis = '';
            $cancelbooking = route('customer.cancelbooking');
            $paymenthistory = route('customer.paymenthistory');
            $setting = route('customer.profile');
            break;
        case 'driver':
            $redirectUrl = route('driver.dashboard');
            $profile = route('driver.profile');
            $booking = route('driver.booking');
            $taxis = route('driver.taxis');
            $cancelbooking = route('driver.cancelbooking');
            $paymenthistory = route('driver.paymenthistory');
            $setting = route('customer.profile');
            break;
        case 'staff':
            $redirectUrl = route('staff.dashboard');
            $profile = route('staff.profile');
            $booking = '';
            $taxis = '';
            $cancelbooking = route('customer.profile');
            $paymenthistory = route('customer.profile');
            $setting = route('customer.profile');
            break;
        default:
            $redirectUrl = '';
            $profile = '';
            $booking = '';
            $taxis = '';
            $cancelbooking = '';
            $paymenthistory = '';
            $setting = '';
    }
@endphp
<div class="user-profile-sidebar">
    <div class="user-profile-sidebar-top">
       <div class="user-profile-img">
          <img src="{{ url('public/assets/img/account/'.Auth::user()->image.'') }}" alt>
          <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
          <input type="file" class="profile-img-file">
       </div>
       <h5>{{ $log_user->name }} </h5>
       {{-- {{ $log_user->role }} --}}
       <p><a href="mailto:{{ $log_user->email }}" class="__cf_email__">{{ $log_user->email }}</a></p>
    </div>
    <ul class="user-profile-sidebar-list">
       <li><a class="{{ Request::is(''.$log_user->role.'/dashboard') ? 'active' : '' }}" href="{{ $redirectUrl }}"><i class="far fa-gauge-high"></i> Dashboard</a></li>
       <li><a class="{{ Request::is(''.$log_user->role.'/dashboard/profile') ? 'active' : '' }}" href="{{ $profile }}"><i class="far fa-user"></i> My Profile</a></li>
       <li><a class="{{ Request::is(''.$log_user->role.'/dashboard/booking') ? 'active' : '' }}" href="{{ $booking }}"><i class="far fa-layer-group"></i> My Booking</a></li>
       <li class="{{ ($log_user->role != 'driver')?'d-none':'' }}"><a class="{{ Request::is(''.$log_user->role.'/dashboard/taxis') ? 'active' : '' }}" href="{{ $taxis }}"><i class="far fa-car"></i> Taxis</a></li>
       <li><a class="{{ Request::is(''.$log_user->role.'/dashboard/cancel-booking') ? 'active' : '' }}" href="{{ $cancelbooking }}"><i class="far fa-xmark-circle"></i> Cancel Booking</a></li>
       <li><a class="{{ Request::is(''.$log_user->role.'/dashboard/payment-history') ? 'active' : '' }}" href="{{ $paymenthistory }}"><i class="far fa-credit-card"></i> Payment History</a></li>
       {{-- <li><a href="#"><i class="far fa-gear"></i> Settings</a></li> --}}
       <li><a href="#" class="logoutBtn"><i class="far fa-sign-out"></i> Logout</a></li>
    </ul>
 </div>
