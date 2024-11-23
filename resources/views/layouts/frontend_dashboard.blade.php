<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>Taxi App | Esoft ASE Assignment</title>
        @include('libraries.frontend.styles')
        @stack('css')
    </head>
  <body>
    @include('components.frontend.nav')
    <div id="overlay" style="display: block;">
        <div class="loader"></div>
    </div>
    @php
    if (Auth::check()) {
        if(Auth::user()->role == 'customer'){
            $personTitle = 'Customer';
            $userLoginType = 'customer';
            $homeRoute = route('customer.dashboard');
        }else if(Auth::user()->role == 'driver'){
            $personTitle = 'Driver';
            $userLoginType = 'driver';
            $homeRoute = route('driver.dashboard');
        }else{
            $personTitle = '';
            $homeRoute = '';
            $userLoginType = '';
        }
    }else{
        $personTitle = '';
        $homeRoute = '';
        $userLoginType = '';
    }
    @endphp
    <input type="hidden" name="user_login_type" id="user_login_type" value="{{ $userLoginType }}">
    <div class="site-breadcrumb" style="background: url({{ url('public/assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
           <h2 class="breadcrumb-title">{{ $personTitle }} Dashboard</h2>
           <ul class="breadcrumb-menu">
              <li><a href="{{ $homeRoute }}">Home</a></li>
              <li class="active">{{ $personTitle }} Dashboard</li>
           </ul>
        </div>
     </div>
     <div class="user-profile py-120">
        <div class="container">
           <div class="row">
            @if (Auth::user()->role == 'driver')
              <div class="col-12 col-md-12 mb-4">
                @if (Auth::user()->active == '' || Auth::user()->taxi_id == '' || Auth::user()->location == '')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Warinig!</strong> You should Select Active Profile ,Active Taxi & Current Location for start the taxi proccess...!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
                @endif
            @endif
           </div>
           <div class="row">
              <div class="col-lg-3">
                @include('components.frontend.user_profile')
              </div>
              <div class="col-lg-9">
                @yield('content')
              </div>
            </div>
        </div>
     </div>
        @include('components.frontend.footer')
        @include('libraries.frontend.scripts')
        @stack('scripts')
  </body>
</html>
