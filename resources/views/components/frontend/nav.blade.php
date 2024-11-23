<div class="preloader">
    <div class="loader-ripple">
       <div></div>
       <div></div>
    </div>
 </div>
 <header class="header">
    <div class="header-top">
       <div class="container">
          <div class="header-top-wrapper">
             <div class="header-top-left">
                <div class="header-top-contact">
                   <ul>
                      <li><a href="mailto:taxiapp@esoft.lk"><i class="far fa-envelopes"></i>
                        taxiapp@esoft.lk</a>
                      </li>
                      <li><a href="tel:+94773944180"><i class="far fa-phone-volume"></i> +9477 39 44 180</a>
                      </li>
                      {{-- <li><a href="#"><i class="far fa-alarm-clock"></i> Sun - Fri (08AM - 10PM)</a></li> --}}
                   </ul>
                </div>
             </div>
             <div class="header-top-right">
                @if(!Auth::check())
                 <div class="header-top-link">
                    <a href="{{ route('login.login') }}"><i class="far fa-arrow-right-to-bracket"></i> Login</a>
                    <a href="{{ route('register.index') }}"><i class="far fa-user-vneck"></i> Register</a>
                 </div>
                @endif

                {{-- <div class="header-top-social d-none">
                   <span>Follow Us: </span>
                   <a href="#"><i class="fab fa-facebook"></i></a>
                   <a href="#"><i class="fab fa-twitter"></i></a>
                   <a href="#"><i class="fab fa-instagram"></i></a>
                   <a href="#"><i class="fab fa-linkedin"></i></a>
                </div> --}}
             </div>
          </div>
       </div>
    </div>
    <div class="main-navigation">
       <nav class="navbar navbar-expand-lg">
          <div class="w-100 pl-3 pr-3 pt-3 pb-3 d-block d-sm-none d-md-none">
            @if(!Auth::check())
            <div class="row justify-content-center">
                <div class="col-12 text-right"><a href="{{ route('login.login') }}" class="btn btn-sm btn-warning"><i class="far fa-arrow-right-to-bracket"></i> Login</a>
                <a href="{{ route('register.index') }}" class="btn btn-sm btn-warning"><i class="far fa-user-vneck"></i> Register</a></div>
            </div>
            @endif
          </div>
          <div class="container position-relative">
             <a class="navbar-brand" href="{{ URL::to('/') }}">
             <img src="{{ url('public/assets/img/logo/logo.png') }}" alt="logo">
             </a>
             <div class="mobile-menu-right">
                <div class="search-btn">
                   <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                </button>
             </div>
             <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                   <li class="nav-item dropdown">
                      <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                   </li>
                   <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                   <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                   <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <div class="nav-right">
                    @if (Auth::check())
                    @php
                         $user = Auth::user();
                        // Redirect based on the user's role
                        switch ($user->role) {
                            case 'admin':
                                $redirectUrl = route('admin.dashboard');
                                $profile = route('admin.profile');
                                $booking = '';
                                $setting = route('customer.profile');
                                break;
                            case 'customer':
                                $redirectUrl = route('customer.dashboard');
                                $profile = route('customer.profile');
                                $booking = route('customer.booking');
                                $setting = route('customer.profile');
                                break;
                            case 'driver':
                                $redirectUrl = route('driver.dashboard');
                                $profile = route('driver.profile');
                                $booking = route('driver.booking');
                                $setting = route('driver.profile');
                                break;
                            case 'staff':
                                $redirectUrl = route('staff.dashboard');
                                $profile = route('staff.profile');
                                $booking = '';
                                $setting = route('customer.profile');
                                break;
                            default:
                                $redirectUrl = '';
                                $profile = '';
                                $booking = '';
                                $setting = '';
                        }


                    @endphp
                    <div class="nav-right-account">
                        <div class="dropdown">
                            <div data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ url('public/assets/img/account/user.png') }}" alt>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ $redirectUrl }}"><i class="far fa-gauge-high"></i> Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ $profile }}"><i class="far fa-user"></i> My Profile</a></li>
                                @if ($booking)
                                <li><a class="dropdown-item" href="{{ $booking }}"><i class="far fa-layer-group"></i> My Booking</a></li>
                                @endif
                                {{-- <li><a class="dropdown-item" href="{{ $setting }}"><i class="far fa-cog"></i> Settings</a></li> --}}
                                <li><a class="dropdown-item logoutBtn" href="#" id="logoutBtn"><i class="far fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                   {{-- <div class="search-btn">
                      <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                   </div> --}}
                   <div class="nav-right-btn mt-2">
                      <a href="#" class="theme-btn nav-booking-btn"><span class="fas fa-taxi"></span>Book A Taxi</a>
                   </div>
                   <div class="sidebar-btn">
                      <button type="button" class="nav-right-link"><i class="far fa-bars-filter"></i></button>
                   </div>
                </div>
             </div>
             <div class="search-area">
                <form action="#">
                   <div class="form-group">
                      <input type="text" class="form-control" placeholder="Type Keyword...">
                      <button type="submit" class="search-icon-btn"><i class="far fa-search"></i></button>
                   </div>
                </form>
             </div>
          </div>
       </nav>
    </div>
 </header>
 <div class="sidebar-popup">
    <div class="sidebar-wrapper">
       <div class="sidebar-content">
          <button type="button" class="close-sidebar-popup"><i class="far fa-xmark"></i></button>
          <div class="sidebar-logo">
             <img src="{{ url('public/assets/img/logo/logo.png') }}" alt>
          </div>
          <div class="sidebar-about">
             <h4>About Us</h4>
             <p>There are many variations of passages available sure there majority have suffered alteration in
                some form by injected humour or randomised words which don't look even slightly believable.
             </p>
          </div>
          <div class="sidebar-contact">
             <h4>Contact Info</h4>
             <ul>
                <li>
                   <h6>Email</h6>
                   <a href="mailto:taxiapp@esoft.lk"><i class="far fa-envelope"></i>taxiapp@esoft.lk</a>
                </li>
                <li>
                   <h6>Phone</h6>
                   <a href="tel:+94773944180"><i class="far fa-phone"></i>+9477 39 44 180</a>
                </li>
                <li>
                   <h6>Address</h6>
                   <a href="#"><i class="far fa-location-dot"></i>36 Bauddhaloka Mawatha, Gampaha</a>
                </li>
             </ul>
          </div>
          {{-- <div class="sidebar-social">
             <h4>Follow Us</h4>
             <a href="#"><i class="fab fa-facebook"></i></a>
             <a href="#"><i class="fab fa-twitter"></i></a>
             <a href="#"><i class="fab fa-instagram"></i></a>
             <a href="#"><i class="fab fa-linkedin"></i></a>
          </div> --}}
       </div>
    </div>
 </div>
 <main class="main">
