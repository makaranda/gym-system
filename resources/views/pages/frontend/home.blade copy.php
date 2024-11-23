@extends('layouts.frontend')

@section('content')


<div class="hero-section">
    <div class="hero-slider owl-carousel owl-theme">
       <div class="hero-single" style="background: url({{ url('public/assets/img/slider/slider-1.jpg') }})">
          <div class="container">
             <div class="row align-items-center">
                <div class="col-md-12 col-lg-9 mx-auto">
                   <div class="hero-content text-center">
                      <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                         Taxica!
                      </h6>
                      <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                         Book <span>Taxi</span> For Your Ride
                      </h1>
                      <p data-animation="fadeInLeft" data-delay=".75s">
                         There are many variations of passages available the majority have suffered
                         alteration in some form generators on the Internet tend to repeat predefined
                         chunks injected humour randomised words look even slightly believable.
                      </p>
                      <div class="hero-btn justify-content-center" data-animation="fadeInUp" data-delay="1s">
                         <a href="#" class="theme-btn">About More<i class="fas fa-arrow-right"></i></a>
                         <a href="#" class="theme-btn theme-btn2">Learn More<i class="fas fa-arrow-right"></i></a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="hero-single" style="background: url({{ url('public/assets/img/slider/slider-2.jpg') }})">
          <div class="container">
             <div class="row align-items-center">
                <div class="col-md-12 col-lg-9 mx-auto">
                   <div class="hero-content text-center">
                      <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                         Taxica!
                      </h6>
                      <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                         Book <span>Taxi</span> For Your Ride
                      </h1>
                      <p data-animation="fadeInLeft" data-delay=".75s">
                         There are many variations of passages available the majority have suffered
                         alteration in some form generators on the Internet tend to repeat predefined
                         chunks injected humour randomised words look even slightly believable.
                      </p>
                      <div class="hero-btn justify-content-center" data-animation="fadeInUp" data-delay="1s">
                         <a href="#" class="theme-btn">About More<i class="fas fa-arrow-right"></i></a>
                         <a href="#" class="theme-btn theme-btn2">Learn More<i class="fas fa-arrow-right"></i></a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="hero-single" style="background: url({{ url('public/assets/img/slider/slider-3.jpg') }})">
          <div class="container">
             <div class="row align-items-center">
                <div class="col-md-12 col-lg-9 mx-auto">
                   <div class="hero-content text-center">
                      <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                         Taxica!
                      </h6>
                      <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                         Book <span>Taxi</span> For Your Ride
                      </h1>
                      <p data-animation="fadeInLeft" data-delay=".75s">
                         There are many variations of passages available the majority have suffered
                         alteration in some form generators on the Internet tend to repeat predefined
                         chunks injected humour randomised words look even slightly believable.
                      </p>
                      <div class="hero-btn justify-content-center" data-animation="fadeInUp" data-delay="1s">
                         <a href="#" class="theme-btn">About More<i class="fas fa-arrow-right"></i></a>
                         <a href="#" class="theme-btn theme-btn2">Learn More<i class="fas fa-arrow-right"></i></a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="booking-area">
    <div class="container">
       <div class="booking-form">
          <h4 class="booking-title">Book Your Ride</h4>
          <form action="#" id="formBookingHome">
             <input type="hidden" name="picup_long" id="picup_long"/>
             <input type="hidden" name="picup_lati" id="picup_lati"/>

             <input type="hidden" name="dropoff_long" id="dropoff_long"/>
             <input type="hidden" name="dropoff_lati" id="dropoff_lati"/>
             <div class="row form-step" id="step-1">
                <div class="col-lg-3">
                   <div class="form-group">
                      <label>Pick Up Location</label>
                      <input type="text" class="form-control" id="pickuplocation" name="pickuplocation" data-title="Pickup Location" placeholder="Click Here - Get Pickup" required/>
                      <i class="far fa-location-dot"></i>
                   </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                      <label>Drop Off Location</label>
                      <input type="text" class="form-control" id="dropofflocation" name="dropofflocation" data-title="Dropoff Location" placeholder="Click Here - Get Dropoff" required/>
                      <i class="far fa-location-dot"></i>
                   </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                      <label>Passengers</label>
                      <input type="number" class="form-control" placeholder="Passengers" min="1" step="1" max="4" value="1" data-title="Passengers" name="passengers" required>
                      <i class="far fa-user-tie"></i>
                   </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                      <label>Cab Type</label>
                      <select class="select form-control" id="vehicleType" name="vehicle_type" data-title="Vehicle Type" required>
                        <option value>Choose Type</option>
                        @foreach ($allVehicleTypes as $vehicleType)
                            <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}</option>
                        @endforeach
                      </select>
                   </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                      <label>Pick Up Date</label>
                      <input type="text" class="form-control date-picker" min="{{ date('Y-m-d') }}" data-title="Pickup Date" name="pick_up_date" value="{{ date('Y-m-d') }}" placeholder="MM/DD/YY"  required>
                      <i class="far fa-calendar-days"></i>
                   </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                      <label>Pick Up Time</label>
                      <input type="text" class="form-control time-picker" placeholder="00:00 AM" data-title="Pickup Time" name="pick_up_time" id="pick_up_time" required>
                      {{-- <i class="far fa-clock"></i> --}}
                   </div>
                </div>
                <div class="col-lg-3">
                   <div class="form-group">
                      <label>Cab Model</label>
                      <select class="select form-control" id="vehicleModel" name="vehicle_model" data-title="Vehicle Model" required>
                         <option value>Choose Model</option>
                         {{-- @foreach ($allVehicleModels as $vehicleModel)
                             <option value="{{ $vehicleModel->id }}">{{ $vehicleModel->name }}</option>
                         @endforeach --}}
                      </select>
                   </div>
                </div>
                <div class="col-lg-3 align-self-end">
                   <button class="theme-btn next-step" data-next="2" type="button" id="openModalButton">Next <i class="fas fa-arrow-right"></i></button>
                </div>
             </div>
             <div class="row form-step mt-4 justify-content-center" id="step-2" style="display:none;">
                <div class="col-lg-6">
                    <div class="form-group">
                       <label>User Name</label>
                       <input type="text" class="form-control" placeholder="Type Your Email or Phone" name="login_username" data-title="Login Email or Password" id="login_username">
                       {{-- <i class="far fa-clock"></i> --}}
                    </div>
                 </div>

                <div class="col-lg-6">
                    <div class="form-group">
                       <label>Password</label>
                       <input type="text" class="form-control" placeholder="Type Your Password" data-title="Login Password" name="login_password" id="login_password">
                       {{-- <i class="far fa-clock"></i> --}}
                    </div>
                 </div>
                 <div class="col-lg-12 mt-4">
                    <h5>You've not registered yet this sytem. Please below register button. after registerd you please use these steps as well..!!</h5>
                 </div>
                <div class="col-lg-12 align-self-end mt-4">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-12 col-md-4">
                            <button type="button" class="theme-btn previous-step" data-previous="1"><i class="fas fa-arrow-left"></i> Previous</button>
                        </div>
                        <div class="col-12 col-md-4">
                            <button type="button" class="theme-btn3">Register Now <i class="fas fa-arrow-top"></i></button>
                        </div>
                        <div class="col-12 col-md-4">
                            <button type="button" class="theme-btn2 next-step" data-next="3">Next <i class="fas fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row form-step mt-4 justify-content-center" id="step-3" style="display:none;">
                <div class="col-lg-12">
                    <div class="form-group text-center">
                       <h2>Great!</h2>
                       <h5 class="mt-4">You've completed all the necessary steps. Please submit your booking to finalize the process.</h5>
                    </div>

                    <div class="col-lg-12 align-self-end mt-4">
                        <div class="row mt-4 justify-content-center">
                            <div class="col-12 col-md-6">
                                <button type="button" class="theme-btn previous-step" data-previous="2"><i class="fas fa-arrow-left"></i> Previous</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <button type="submit" class="theme-btn2 submit-step" data-next="3">Book Now <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
          </form>
       </div>
    </div>
 </div>
 <div class="about-area py-120">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-lg-6">
             <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                <div class="about-img">
                   <img src="{{ ('public/assets/img/about/01.png') }}" alt>
                </div>
                <div class="about-experience">
                   <div class="about-experience-icon">
                      <img src="{{ ('public/assets/img/icon/taxi-booking.svg') }}" alt>
                   </div>
                   <b>30 Years Of <br> Quality Service</b>
                </div>
             </div>
          </div>
          <div class="col-lg-6">
             <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                <div class="site-heading mb-3">
                   <span class="site-title-tagline justify-content-start">
                   <i class="flaticon-drive"></i> About Us
                   </span>
                   <h2 class="site-title">
                      We Provide Trusted <span>Cab Service</span> In The World
                   </h2>
                </div>
                <p class="about-text">
                   There are many variations of passages of Lorem Ipsum available, but the majority have
                   suffered alteration in some form, by injected humour.
                </p>
                <div class="about-list-wrapper">
                   <ul class="about-list list-unstyled">
                      <li>
                         At vero eos et accusamus et iusto odio.
                      </li>
                      <li>
                         Established fact that a reader will be distracted.
                      </li>
                      <li>
                         Sed ut perspiciatis unde omnis iste natus sit.
                      </li>
                   </ul>
                </div>
                <a href="about.html" class="theme-btn mt-4">Discover More<i class="fas fa-arrow-right"></i></a>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="service-area bg py-120">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 mx-auto">
             <div class="site-heading text-center">
                <span class="site-title-tagline">Services</span>
                <h2 class="site-title">Our Best Services For You</h2>
                <div class="heading-divider"></div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6 col-lg-4">
             <div class="service-item wow fadeInUp" data-wow-delay=".25s">
                <div class="service-img">
                   <img src="{{ ('public/assets/img/service/01.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ ('public/assets/img/icon/taxi-booking-1.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Online Booking</a>
                   </h3>
                   <p class="service-text">
                      There are many variations of passages orem psum available but the majority have
                      suffered alteration in some form by injected.
                   </p>
                   <div class="service-arrow">
                      <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="service-item wow fadeInUp" data-wow-delay=".50s">
                <div class="service-img">
                   <img src="{{ ('public/assets/img/service/02.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ ('public/assets/img/icon/city-taxi.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">City Transport</a>
                   </h3>
                   <p class="service-text">
                      There are many variations of passages orem psum available but the majority have
                      suffered alteration in some form by injected.
                   </p>
                   <div class="service-arrow">
                      <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="service-item wow fadeInUp" data-wow-delay=".75s">
                <div class="service-img">
                   <img src="{{ ('public/assets/img/service/03.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ ('public/assets/img/icon/airport.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Airport Transport</a>
                   </h3>
                   <p class="service-text">
                      There are many variations of passages orem psum available but the majority have
                      suffered alteration in some form by injected.
                   </p>
                   <div class="service-arrow">
                      <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="service-item wow fadeInUp" data-wow-delay=".25s">
                <div class="service-img">
                   <img src="{{ ('public/assets/img/service/04.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ ('public/assets/img/icon/business.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Business Transport</a>
                   </h3>
                   <p class="service-text">
                      There are many variations of passages orem psum available but the majority have
                      suffered alteration in some form by injected.
                   </p>
                   <div class="service-arrow">
                      <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="service-item wow fadeInUp" data-wow-delay=".50s">
                <div class="service-img">
                   <img src="{{ ('public/assets/img/service/05.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ ('public/assets/img/icon/taxi-2.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Regular Transport</a>
                   </h3>
                   <p class="service-text">
                      There are many variations of passages orem psum available but the majority have
                      suffered alteration in some form by injected.
                   </p>
                   <div class="service-arrow">
                      <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="service-item wow fadeInUp" data-wow-delay=".75s">
                <div class="service-img">
                   <img src="{{ ('public/assets/img/service/06.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ ('public/assets/img/icon/taxi.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Tour Transport</a>
                   </h3>
                   <p class="service-text">
                      There are many variations of passages orem psum available but the majority have
                      suffered alteration in some form by injected.
                   </p>
                   <div class="service-arrow">
                      <a href="#" class="theme-btn">Read More<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="taxi-area py-120">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 mx-auto">
             <div class="site-heading text-center">
                <span class="site-title-tagline">Our Taxi</span>
                <h2 class="site-title">Let's Check Available Taxi</h2>
                <div class="heading-divider"></div>
             </div>
          </div>
       </div>
       <div class="filter-controls">
          <ul class="filter-btns">
             <li class="active" data-filter="*">All Taxi</li>
             <li data-filter=".cat1">Hybrid Taxi</li>
             <li data-filter=".cat2">Town Taxi</li>
             <li data-filter=".cat3">Suv Taxi</li>
             <li data-filter=".cat4">Limousine Taxi</li>
          </ul>
       </div>
       <div class="row filter-box">
          <div class="col-md-6 col-lg-4 filter-item cat1 cat2">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ ('public/assets/img/taxi/01.png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>BMW M5 2019 Model</h4>
                      <span>$1.25/km</span>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>2</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4 filter-item cat3 cat4">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ ('public/assets/img/taxi/01.png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>BMW M5 2019 Model</h4>
                      <span>$1.25/km</span>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>2</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4 filter-item cat1 cat4">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ ('public/assets/img/taxi/01.png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>BMW M5 2019 Model</h4>
                      <span>$1.25/km</span>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>2</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4 filter-item cat1 cat3">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ ('public/assets/img/taxi/01.png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>BMW M5 2019 Model</h4>
                      <span>$1.25/km</span>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>2</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4 filter-item cat1 cat2 cat3">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ ('public/assets/img/taxi/01.png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>BMW M5 2019 Model</h4>
                      <span>$1.25/km</span>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>2</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4 filter-item cat4">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ ('public/assets/img/taxi/01.png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>BMW M5 2019 Model</h4>
                      <span>$1.25/km</span>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>2</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="counter-area">
    <div class="container">
       <div class="counter-wrapper">
          <div class="row">
             <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                   <div class="icon">
                      <img src="{{ ('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
                      <h6 class="title">+ Available Taxi </h6>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                   <div class="icon">
                      <img src="{{ ('public/assets/img/icon/happy.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="900" data-speed="3000">900</span>
                      <h6 class="title">+ Happy Clients</h6>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                   <div class="icon">
                      <img src="{{ ('public/assets/img/icon/driver.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="700" data-speed="3000">700</span>
                      <h6 class="title">+ Our Drivers</h6>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                   <div class="icon">
                      <img src="{{ ('public/assets/img/icon/trip.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="1800" data-speed="3000">1800</span>
                      <h6 class="title">+ Road Trip Done</h6>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="feature-area feature-bg py-120">
    <div class="container mt-150">
       <div class="row">
          <div class="col-lg-6 mx-auto">
             <div class="site-heading text-center">
                <span class="site-title-tagline">Feature</span>
                <h2 class="site-title text-white">Our Awesome Feature</h2>
                <div class="heading-divider"></div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6 col-lg-3">
             <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                <div class="feature-icon">
                   <img src="{{ ('public/assets/img/icon/taxi-safety.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>Safety Guarantee</h4>
                   <p>There are many variations of majority have suffered alteration in some form injected
                      humour randomised words.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="feature-item mt-lg-5 wow fadeInDown" data-wow-delay=".25s">
                <div class="feature-icon">
                   <img src="{{ ('public/assets/img/icon/pickup.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>Fast Pickup</h4>
                   <p>There are many variations of majority have suffered alteration in some form injected
                      humour randomised words.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                <div class="feature-icon">
                   <img src="{{ ('public/assets/img/icon/money.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>Affordable Rate</h4>
                   <p>There are many variations of majority have suffered alteration in some form injected
                      humour randomised words.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="feature-item mt-lg-5 wow fadeInDown" data-wow-delay=".25s">
                <div class="feature-icon">
                   <img src="{{ ('public/assets/img/icon/support.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>24/7 Support</h4>
                   <p>There are many variations of majority have suffered alteration in some form injected
                      humour randomised words.
                   </p>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="taxi-rate py-120">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 mx-auto">
             <div class="site-heading text-center">
                <span class="site-title-tagline">Taxi Rate</span>
                <h2 class="site-title">Our Taxi Rate For You</h2>
                <div class="heading-divider"></div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6 col-lg-4">
             <div class="rate-item wow fadeInUp" data-wow-delay=".25s">
                <div class="rate-header">
                   <div class="rate-img">
                      <img src="{{ ('public/assets/img/rate/01.png') }}" alt>
                   </div>
                </div>
                <div class="rate-header-content">
                   <h4>Basic Pakage</h4>
                   <p class="rate-duration">One Time Payment</p>
                </div>
                <div class="rate-content">
                   <div class="rate-icon">
                      <img src="{{ ('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="rate-feature">
                      <ul>
                         <li><i class="far fa-check-double"></i> Base Charge: <span>$2.30</span></li>
                         <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                         <li><i class="far fa-check-double"></i> Up To 50 kms: <span>$1.38/km</span></li>
                         <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li>
                         <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li>
                      </ul>
                      <a href="#" class="theme-btn">Choose Plan<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="rate-item wow fadeInDown" data-wow-delay=".25s">
                <div class="rate-header">
                   <div class="rate-img">
                      <img src="{{ ('public/assets/img/rate/01.png') }}" alt>
                   </div>
                </div>
                <div class="rate-header-content">
                   <h4>Standard Pakage</h4>
                   <p class="rate-duration">One Time Payment</p>
                </div>
                <div class="rate-content">
                   <div class="rate-icon">
                      <img src="{{ ('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="rate-feature">
                      <ul>
                         <li><i class="far fa-check-double"></i> Base Charge: <span>$2.30</span></li>
                         <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                         <li><i class="far fa-check-double"></i> Up To 50 kms: <span>$1.38/km</span></li>
                         <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li>
                         <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li>
                      </ul>
                      <a href="#" class="theme-btn">Choose Plan<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="rate-item wow fadeInUp" data-wow-delay=".25s">
                <div class="rate-header">
                   <div class="rate-img">
                      <img src="{{ ('public/assets/img/rate/01.png') }}" alt>
                   </div>
                </div>
                <div class="rate-header-content">
                   <h4>Premium Pakage</h4>
                   <p class="rate-duration">One Time Payment</p>
                </div>
                <div class="rate-content">
                   <div class="rate-icon">
                      <img src="{{ ('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="rate-feature">
                      <ul>
                         <li><i class="far fa-check-double"></i> Base Charge: <span>$2.30</span></li>
                         <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                         <li><i class="far fa-check-double"></i> Up To 50 kms: <span>$1.38/km</span></li>
                         <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li>
                         <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li>
                      </ul>
                      <a href="#" class="theme-btn">Choose Plan<i class="fas fa-arrow-right"></i></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="team-area pb-120">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 mx-auto">
             <div class="site-heading text-center">
                <span class="site-title-tagline">Drivers</span>
                <h2 class="site-title">Our Expert Drivers</h2>
                <div class="heading-divider"></div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6 col-lg-3">
             <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                <div class="team-img">
                   <img src="{{ ('public/assets/img/team/01.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Alma Mcelroy</a></h5>
                      <span>Expert Driver</span>
                   </div>
                </div>
                <div class="team-social">
                   <a href="#"><i class="fab fa-facebook-f"></i></a>
                   <a href="#"><i class="fab fa-twitter"></i></a>
                   <a href="#"><i class="fab fa-linkedin-in"></i></a>
                   <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="team-item wow fadeInDown" data-wow-delay=".25s">
                <div class="team-img">
                   <img src="{{ ('public/assets/img/team/02.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Marie Hooks</a></h5>
                      <span>Expert Driver</span>
                   </div>
                </div>
                <div class="team-social">
                   <a href="#"><i class="fab fa-facebook-f"></i></a>
                   <a href="#"><i class="fab fa-twitter"></i></a>
                   <a href="#"><i class="fab fa-linkedin-in"></i></a>
                   <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                <div class="team-img">
                   <img src="{{ ('public/assets/img/team/03.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Daniel Nesmith</a></h5>
                      <span>Expert Driver</span>
                   </div>
                </div>
                <div class="team-social">
                   <a href="#"><i class="fab fa-facebook-f"></i></a>
                   <a href="#"><i class="fab fa-twitter"></i></a>
                   <a href="#"><i class="fab fa-linkedin-in"></i></a>
                   <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="team-item wow fadeInDown" data-wow-delay=".25s">
                <div class="team-img">
                   <img src="{{ ('public/assets/img/team/04.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Gertrude Barrow</a></h5>
                      <span>Expert Driver</span>
                   </div>
                </div>
                <div class="team-social">
                   <a href="#"><i class="fab fa-facebook-f"></i></a>
                   <a href="#"><i class="fab fa-twitter"></i></a>
                   <a href="#"><i class="fab fa-linkedin-in"></i></a>
                   <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="video-area vda-2">
    <div class="container">
       <div class="video-content" style="background-image: url({{ url('public/assets/img/video/taxi-cab-hire.png') }})">
          <div class="row align-items-center">
             <div class="col-lg-12">
                <div class="video-wrapper">
                   <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=4G17YkkGxGk">
                   <i class="fas fa-play"></i>
                   </a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="choose-area cha-2 py-120">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-lg-6">
             <div class="choose-content">
                <div class="site-heading wow fadeInDown mb-4" data-wow-delay=".25s">
                   <span class="site-title-tagline text-white justify-content-start">
                   <i class="flaticon-drive"></i> Why Choose Us
                   </span>
                   <h2 class="site-title text-white mb-10">We are dedicated <span>to provide</span> quality service</h2>
                   <p class="text-white">
                      There are many variations of passages available but the majority have suffered alteration in some form going to use a passage by injected humour randomised words which don't look even slightly believable.
                   </p>
                </div>
                <div class="choose-img wow fadeInUp" data-wow-delay=".25s">
                   <img src="{{ ('public/assets/img/choose/01.png') }}" alt>
                </div>
             </div>
          </div>
          <div class="col-lg-6">
             <div class="choose-content-wrapper wow fadeInRight" data-wow-delay=".25s">
                <div class="choose-item">
                   <span class="choose-count">01</span>
                   <div class="choose-item-icon">
                      <img src="{{ ('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="choose-item-info">
                      <h3>Best Quality Taxi</h3>
                      <p>There are many variations of passages available but the majority have suffered alteration in form injected humour words which don't look even slightly believable. If you are going passage you need there anything embar.</p>
                   </div>
                </div>
                <div class="choose-item ms-lg-5">
                   <span class="choose-count">02</span>
                   <div class="choose-item-icon">
                      <img src="{{ ('public/assets/img/icon/driver.svg') }}" alt>
                   </div>
                   <div class="choose-item-info">
                      <h3>Expert Drivers</h3>
                      <p>There are many variations of passages available but the majority have suffered alteration in form injected humour words which even slightly believable. If you are going passage you need there anything.</p>
                   </div>
                </div>
                <div class="choose-item mb-lg-0">
                   <span class="choose-count">03</span>
                   <div class="choose-item-icon">
                      <img src="{{ ('public/assets/img/icon/taxi-location.svg') }}" alt>
                   </div>
                   <div class="choose-item-info">
                      <h3>Many Locations</h3>
                      <p>There are many variations of passages available but the majority have suffered alteration in form injected humour words which don't look even slightly believable. If you are going passage you need there anything embar.</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="faq-area py-120">
    <div class="container">
       <div class="row">
          <div class="col-lg-6">
             <div class="faq-right">
                <div class="site-heading mb-3">
                   <span class="site-title-tagline justify-content-start">Faq's</span>
                   <h2 class="site-title my-3">General <span>frequently</span> asked questions</h2>
                </div>
                <p class="about-text">There are many variations of passages of Lorem Ipsum available,
                   but the majority have suffered alteration in some form, by injected humour, or
                   randomised words which don't look even.
                </p>
                <div class="faq-img mt-3">
                   <img src="{{ ('public/assets/img/faq/01.jpg') }}" alt>
                </div>
             </div>
          </div>
          <div class="col-lg-6">
             <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                   <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span><i class="far fa-question"></i></span> How Long Does A Booking Take ?
                      </button>
                   </h2>
                   <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         We denounce with righteous indignation and dislike men who
                         are so beguiled and demoralized by the charms of pleasure of the moment, so
                         blinded by desire. Ante odio dignissim quam, vitae pulvinar turpis erat ac elit
                         eu orci id odio facilisis pharetra.
                      </div>
                   </div>
                </div>
                <div class="accordion-item">
                   <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <span><i class="far fa-question"></i></span> How Can I Become A Member
                      ?
                      </button>
                   </h2>
                   <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         We denounce with righteous indignation and dislike men who
                         are so beguiled and demoralized by the charms of pleasure of the moment, so
                         blinded by desire. Ante odio dignissim quam, vitae pulvinar turpis erat ac elit
                         eu orci id odio facilisis pharetra.
                      </div>
                   </div>
                </div>
                <div class="accordion-item">
                   <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <span><i class="far fa-question"></i></span> What Payment Gateway You Support ?
                      </button>
                   </h2>
                   <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         We denounce with righteous indignation and dislike men who
                         are so beguiled and demoralized by the charms of pleasure of the moment, so
                         blinded by desire. Ante odio dignissim quam, vitae pulvinar turpis erat ac elit
                         eu orci id odio facilisis pharetra.
                      </div>
                   </div>
                </div>
                <div class="accordion-item">
                   <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <span><i class="far fa-question"></i></span> How Can I Cancel My Request ?
                      </button>
                   </h2>
                   <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                         We denounce with righteous indignation and dislike men who
                         are so beguiled and demoralized by the charms of pleasure of the moment, so
                         blinded by desire. Ante odio dignissim quam, vitae pulvinar turpis erat ac elit
                         eu orci id odio facilisis pharetra.
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="testimonial-area py-120">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 mx-auto">
             <div class="site-heading text-center">
                <span class="site-title-tagline"><i class="flaticon-drive"></i> Testimonials</span>
                <h2 class="site-title text-white">What Our Client <span>Say's</span></h2>
                <div class="heading-divider"></div>
             </div>
          </div>
       </div>
       <div class="testimonial-slider owl-carousel owl-theme">
          <div class="testimonial-single">
             <div class="testimonial-content">
                <div class="testimonial-author-img">
                   <img src="{{ ('public/assets/img/testimonial/01.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Sylvia Green</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                   There are many variations of words suffered available to the have majority but the majority
                   suffer to alteration injected hidden the middle text.
                </p>
             </div>
             <div class="testimonial-rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
             </div>
          </div>
          <div class="testimonial-single">
             <div class="testimonial-content">
                <div class="testimonial-author-img">
                   <img src="{{ ('public/assets/img/testimonial/02.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Gordo Novak</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                   There are many variations of words suffered available to the have majority but the majority
                   suffer to alteration injected hidden the middle text.
                </p>
             </div>
             <div class="testimonial-rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
             </div>
          </div>
          <div class="testimonial-single">
             <div class="testimonial-content">
                <div class="testimonial-author-img">
                   <img src="{{ ('public/assets/img/testimonial/03.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Reid Butt</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                   There are many variations of words suffered available to the have majority but the majority
                   suffer to alteration injected hidden the middle text.
                </p>
             </div>
             <div class="testimonial-rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
             </div>
          </div>
          <div class="testimonial-single">
             <div class="testimonial-content">
                <div class="testimonial-author-img">
                   <img src="{{ ('public/assets/img/testimonial/04.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Parker Jime</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                   There are many variations of words suffered available to the have majority but the majority
                   suffer to alteration injected hidden the middle text.
                </p>
             </div>
             <div class="testimonial-rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
             </div>
          </div>
          <div class="testimonial-single">
             <div class="testimonial-content">
                <div class="testimonial-author-img">
                   <img src="{{ ('public/assets/img/testimonial/05.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Heruli Nez</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                   There are many variations of words suffered available to the have majority but the majority
                   suffer to alteration injected hidden the middle text.
                </p>
             </div>
             <div class="testimonial-rate">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="cta-area">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-lg-7 text-center text-lg-start">
             <div class="cta-text cta-divider">
                <h1>Book Your Cab It's Simple And Affordable</h1>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout point of using is that it has normal distribution of letters.</p>
             </div>
          </div>
          <div class="col-lg-5 text-center text-lg-end">
             <div class="mb-20">
                <a href="94773944180" class="cta-number"><i class="far fa-headset"></i>+94 77 3944 180</a>
             </div>
             <div class="cta-btn">
                <a href="#" class="theme-btn">Book Your Cab<i class="fas fa-arrow-right"></i></a>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="blog-area pt-120">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 mx-auto">
             <div class="site-heading text-center">
                <span class="site-title-tagline"><i class="flaticon-drive"></i> Our Blog</span>
                <h2 class="site-title">Latest News & Blog</h2>
                <div class="heading-divider"></div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-6 col-lg-4">
             <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                <div class="blog-item-img">
                   <img src="{{ ('public/assets/img/blog/01.jpg') }}" alt="Thumb">
                </div>
                <div class="blog-item-info">
                   <div class="blog-item-meta">
                      <ul>
                         <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                         <li><a href="#"><i class="far fa-calendar-alt"></i> February 23, 2023</a></li>
                      </ul>
                   </div>
                   <h4 class="blog-title">
                      <a href="#">There are many variations of passage available.</a>
                   </h4>
                   <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="blog-item wow fadeInUp" data-wow-delay=".50s">
                <div class="blog-item-img">
                   <img src="{{ ('public/assets/img/blog/02.jpg') }}" alt="Thumb">
                </div>
                <div class="blog-item-info">
                   <div class="blog-item-meta">
                      <ul>
                         <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                         <li><a href="#"><i class="far fa-calendar-alt"></i> February 23, 2023</a></li>
                      </ul>
                   </div>
                   <h4 class="blog-title">
                      <a href="#">There are many variations of passage available.</a>
                   </h4>
                   <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="blog-item wow fadeInUp" data-wow-delay=".75s">
                <div class="blog-item-img">
                   <img src="{{ ('public/assets/img/blog/03.jpg') }}" alt="Thumb">
                </div>
                <div class="blog-item-info">
                   <div class="blog-item-meta">
                      <ul>
                         <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                         <li><a href="#"><i class="far fa-calendar-alt"></i> February 23, 2023</a></li>
                      </ul>
                   </div>
                   <h4 class="blog-title">
                      <a href="#">There are many variations of passage available.</a>
                   </h4>
                   <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="partner pt-80 pb-80">
    <div class="container">
       <div class="partner-slider owl-carousel owl-theme">
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ ('public/assets/img/partner/01.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ ('public/assets/img/partner/02.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ ('public/assets/img/partner/03.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ ('public/assets/img/partner/01.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ ('public/assets/img/partner/02.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ ('public/assets/img/partner/03.png') }}" alt>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="download-area mb-120">
    <div class="container">
       <div class="download-wrapper">
          <div class="row">
             <div class="col-lg-6">
                <div class="download-content">
                   <div class="site-heading mb-4">
                      <span class="site-title-tagline justify-content-start">
                      <i class="flaticon-drive"></i> Get Our App
                      </span>
                      <h2 class="site-title mb-10">Download <span>Our Taxica</span> App For Free</h2>
                      <p>
                         There are many variations of passages available but the majority have suffered in some form going to use a passage by injected humour.
                      </p>
                   </div>
                   <div class="download-btn">
                      <a href="#">
                         <i class="fab fa-google-play"></i>
                         <div class="download-btn-content">
                            <span>Get It On</span>
                            <strong>Google Play</strong>
                         </div>
                      </a>
                      <a href="#">
                         <i class="fab fa-app-store"></i>
                         <div class="download-btn-content">
                            <span>Get It On</span>
                            <strong>App Store</strong>
                         </div>
                      </a>
                   </div>
                </div>
             </div>
          </div>
          <div class="download-img">
             <img src="{{ ('public/assets/img/download/01.png') }}" alt>
          </div>
       </div>
    </div>
 </div>


 <!-- Modal -->
<div class="modal fade" id="locationmodal" tabindex="-1" aria-labelledby="locationmodallbl" aria-hidden="true">
    <div class="modal-dialog">
      <form action="#" method="POST" id="locationPickup">
        <input type="hidden" name="formType" id="formType"/>
        <input type="hidden" name="longatude" id="longatude"/>
        <input type="hidden" name="latitude" id="latitude"/>
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="locationmodallbl">Pickup Location</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="mapid" style="height: 400px;"></div>
        </div>
        <div class="modal-footer d-block">
            <div class="row">
                <div class="col-6 col-md-6 pl-0">
                    <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="col-6 col-md-6 pr-0">
                    <button type="submit" class="btn btn-primary w-100">Add Location</button>
                </div>
            </div>
        </div>
      </div>
    </form>
    </div>
  </div>



@endsection

@push('css')
    <style>

    </style>
@endpush
@push('scripts')
<script>
$(document).ready(function() {

    $('#pickuplocation').on('click', function() {
        console.log("pickup");
        $('#locationmodallbl').text("Pickup Location");
        $('#formType').val("pickup");
        $('#locationmodal').modal('show');
    });

    $('#dropofflocation').on('click', function() {
        console.log("dropoff");
        $('#locationmodallbl').text("Dropoff Location");
        $('#formType').val("dropoff");
        $('#locationmodal').modal('show');
    });

    $('#locationPickup').on('submit', function(event) {
        event.preventDefault(); // Corrected 'preventDefault' method
        if($("#formType").val() == 'pickup'){
            $('#picup_long').val($('#longatude').val());
            $('#picup_lati').val($('#latitude').val());
            $('#pickuplocation').val('Assign the Location');
        }else{
            $('#dropoff_long').val($('#longatude').val());
            $('#dropoff_lati').val($('#latitude').val());
            $('#dropofflocation').val('Assign the Location');
        }
        $('#locationmodal').modal('hide');
        //console.log("locationPickup");
    });

    var map;
    $('#locationmodal').on('shown.bs.modal', function () {
        // Check if map already exists to avoid reinitializing
        //console.log('window mapInitialized' + window.mapInitialized);
        //if (!window.mapInitialized) {
            //window.mapInitialized = true; // Prevent reinitialization
            //console.log('testi pickup');
            // Use browser's geolocation to get the current location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    // Get the coordinates
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    //alert();
                    console.log('Latitude:', lat, 'Longitude:', lng); // Log the coordinates
                    $('#latitude').val(lat);
                    $('#longatude').val(lng);

                    // Initialize Leaflet map centered on user's location
                    var map = L.map('mapid').setView([lat, lng], 13);

                    // Add OpenStreetMap tiles
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);

                    // Create a draggable marker for the user's current location
                    var marker = L.marker([lat, lng], { draggable: true }).addTo(map)
                        .bindPopup('Your current location.')
                        .openPopup();

                    // Listen for the dragend event to update coordinates
                    marker.on('dragend', function(e) {
                        var newLatLng = marker.getLatLng();
                        $('#latitude').val(newLatLng.lat);
                        $('#longatude').val(newLatLng.lng);
                        marker.bindPopup('Moved to: ' + newLatLng.lat.toFixed(5) + ', ' + newLatLng.lng.toFixed(5)).openPopup();
                    });

                    // Listen for map clicks to add a new marker at the clicked location
                    map.on('click', function(e) {
                        var clickedLat = e.latlng.lat;
                        var clickedLng = e.latlng.lng;

                        // Update input fields with the clicked location
                        $('#latitude').val(clickedLat);
                        $('#longatude').val(clickedLng);

                        // Remove the previous marker if it exists and create a new one
                        if (marker) {
                            map.removeLayer(marker); // Remove the old marker
                        }

                        // Add a new marker at the clicked location
                        marker = L.marker([clickedLat, clickedLng], { draggable: true }).addTo(map)
                            .bindPopup('New location: ' + clickedLat.toFixed(5) + ', ' + clickedLng.toFixed(5))
                            .openPopup();

                        // Update the coordinates when the new marker is dragged
                        marker.on('dragend', function(e) {
                            var newLatLng = marker.getLatLng();
                            $('#latitude').val(newLatLng.lat);
                            $('#longatude').val(newLatLng.lng);
                            marker.bindPopup('Moved to: ' + newLatLng.lat.toFixed(5) + ', ' + newLatLng.lng.toFixed(5)).openPopup();
                        });
                    });

                }, function(error) {
                    console.error('Geolocation error:', error);
                    alert('Unable to retrieve your location.');
                });
            } else {
                alert('Geolocation is not supported by this browser.');
            }
        //}
    });


});
</script>

@endpush
