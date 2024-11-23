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
        @include('components.frontend.nav')
        <input type="hidden" name="user_login_type" id="user_login_type" value="{{ $userLoginType }}">
        <div id="overlay" style="display: block;">
            <div class="loader"></div>
        </div>
        @yield('content')

        @include('components.frontend.footer')
        @include('libraries.frontend.scripts')
        @stack('scripts')
  </body>
</html>
