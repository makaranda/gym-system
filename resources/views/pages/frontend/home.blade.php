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
            <input type="hidden" name="bookingFormType" id="bookingFormType" value="front-form"/>

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
                <div class="col-lg-2">
                   <div class="form-group">
                      <label>Passengers</label>
                      <input type="number" class="form-control" placeholder="Passengers" min="1" step="1" max="4" value="1" data-title="Passengers" name="passengers" id="passengers" required>
                      <i class="far fa-user-tie"></i>
                   </div>
                </div>
                <div class="col-lg-2">
                   <div class="form-group">
                      <label>Pick Up Date</label>
                      <input type="text" class="form-control date-picker" min="{{ date('Y-m-d') }}" data-title="Pickup Date" name="pick_up_date" value="{{ date('Y-m-d') }}" placeholder="MM/DD/YY"  required>
                      <i class="far fa-calendar-days"></i>
                   </div>
                </div>
                <div class="col-lg-2">
                   <div class="form-group">
                      <label>Pick Up Time</label>
                      <input type="text" class="form-control time-picker" placeholder="00:00 AM" data-title="Pickup Time" name="pick_up_time" id="pick_up_time" required>
                      <i class="far fa-clock"></i>
                   </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                       <label>Choose Vehicle</label>
                       <div class="image-radio-group">
                            @foreach ($allVehicleTypes as $key => $vehicleType)
                                @php
                                    if($vehicleType->id == 1){
                                        $checked = 'checked';
                                    }else{
                                        $checked = '';
                                    }
                                @endphp
                                <div class="image-container">
                                    <input type="radio" name="vehicle_type" data-id="{{ $vehicleType->id }}" data-title="Vehicle Type" id="radio{{ $key+1 }}"  {{ $checked }}>
                                    <img src="{{ url('public/assets/img/icon/vehicle-types/'.$vehicleType->icon.'') }}" alt="{{ $vehicleType->name }}" onclick="document.getElementById('radio{{ $key+1 }}').click();">
                                    <p class="fw-bold text-dark">{{ $vehicleType->name }}</p>
                                </div>
                            @endforeach
                        </div>
                       {{-- <select class="select form-control" id="vehicleType" name="vehicle_type"  required>
                         <option value>Choose Type</option>



                       </select> --}}
                    </div>
                 </div>
               {{--  <div class="col-lg-3">
                   <div class="form-group">
                      <label>Cab Model</label>
                      <select class="select form-control" id="vehicleModel" name="vehicle_model" data-title="Vehicle Model" required>
                         <option value>Choose Model</option>
                         {{-- @foreach ($allVehicleModels as $vehicleModel)
                             <option value="{{ $vehicleModel->id }}">{{ $vehicleModel->name }}</option>
                         @endforeach --}}
                       {{-- </select>
                   </div>
                </div> --}}
                <div class="col-lg-3 align-self-end mt-3">
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
                   <img src="{{ url('public/assets/img/about/01.png') }}" alt>
                </div>
                <div class="about-experience">
                   <div class="about-experience-icon">
                      <img src="{{ url('public/assets/img/icon/taxi-booking.svg') }}" alt>
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
                At Taxica, we are committed to delivering exceptional cab services that prioritize safety, comfort, and reliability. With a focus on customer satisfaction, we ensure that every journey with us is a positive experience.
                </p>
                <div class="about-list-wrapper">
                   <ul class="about-list list-unstyled">
                      <li>
                      - Professional Drivers: Our skilled and friendly drivers are dedicated to providing a safe and pleasant ride.
                      </li>
                      <li>
                      - Modern Fleet: We maintain a diverse fleet of well-maintained vehicles to cater to all your transportation needs.
                      </li>
                      <li>
                      - 24/7 Availability: Whether it's day or night, our services are always available to ensure you reach your destination on time.
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
                   <img src="{{ url('public/assets/img/service/01.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ url('public/assets/img/icon/taxi-booking-1.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Online Booking</a>
                   </h3>
                   <p class="service-text">
                   Easily book your ride with our user-friendly online platform. Enjoy the convenience of scheduling your taxi from the comfort of your home or on the go.
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
                   <img src="{{ url('public/assets/img/service/02.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ url('public/assets/img/icon/city-taxi.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">City Transport</a>
                   </h3>
                   <p class="service-text">
                   Navigate the city with ease using our reliable city transport services. Our experienced drivers know the best routes to get you to your destination quickly and efficiently.
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
                   <img src="{{ url('public/assets/img/service/03.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ url('public/assets/img/icon/airport.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Airport Transport</a>
                   </h3>
                   <p class="service-text">
                   Start your journey stress-free with our dedicated airport transport service. We provide timely pickups and drop-offs, ensuring you catch your flight or arrive home safely.
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
                   <img src="{{ url('public/assets/img/service/04.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ url('public/assets/img/icon/business.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Business Transport</a>
                   </h3>
                   <p class="service-text">
                   Make a great impression with our professional business transport solutions. We offer comfortable and punctual rides for meetings, conferences, and corporate events.
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
                   <img src="{{ url('public/assets/img/service/05.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ url('public/assets/img/icon/taxi-2.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Regular Transport</a>
                   </h3>
                   <p class="service-text">
                   Count on us for your everyday transportation needs. Whether it's commuting to work or running errands, our reliable service is here to support you, with maximum effort.
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
                   <img src="{{ url('public/assets/img/service/06.jpg') }}" alt>
                </div>
                <div class="service-icon">
                   <img src="{{ url('public/assets/img/icon/taxi.svg') }}" alt>
                </div>
                <div class="service-content">
                   <h3 class="service-title">
                      <a href="#">Tour Transport</a>
                   </h3>
                   <p class="service-text">
                   Explore your city or nearby attractions with our customized tour transport services. Our knowledgeable drivers will guide you to the best sights and experiences
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
             <li data-filter=".cat1">Tuk</li>
             <li data-filter=".cat2">Flex</li>
             <li data-filter=".cat3">Mini Cars</li>
             <li data-filter=".cat4">Cars</li>
             <li data-filter=".cat5">Vans</li>
             <li data-filter=".cat6">Mini Vans</li>
             <li data-filter=".cat7">Motorbikes</li>
          </ul>
       </div>
       <div class="row filter-box">
         <!-- TUK List -->
          <div class="col-md-6 col-lg-4 filter-item cat1">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ url('public/assets/img/taxi/tuk/T (1).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Bajaj</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                      <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>1</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>1</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>No</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat1">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ url('public/assets/img/taxi/tuk/T (7).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Piaggio</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                      <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>1</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>3</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>No</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat1">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ url('public/assets/img/taxi/tuk/T (11).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>TVS king</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>1</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>1</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>No</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <!-- FLEX List -->
          <div class="col-md-6 col-lg-4 filter-item cat2">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/flex/T (2).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>suzuki alto</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
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

          <div class="col-md-6 col-lg-4 filter-item cat2">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/flex/T (3).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>BMW X2</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
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

          <div class="col-md-6 col-lg-4 filter-item cat2">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/flex/T (4).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Audi a4</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
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
          <!-- MINI CARS List -->
          <div class="col-md-6 col-lg-4 filter-item cat3">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/minicar/T (1).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Suzuki maruti</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
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

          <div class="col-md-6 col-lg-4 filter-item cat3">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/minicar/T (4).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>micro panda</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
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

          <div class="col-md-6 col-lg-4 filter-item cat3">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/minicar/T (3).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>nissan march</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>3</span></li>
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
          <!-- CARS List -->
          <div class="col-md-6 col-lg-4 filter-item cat4">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/car/T (1).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Toyota Prius Hybrid</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
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
                <img src="{{ url('public/assets/img/taxi/car/T (2).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Toyota allion</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
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
                <img src="{{ url('public/assets/img/taxi/car/T (3).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>toyota premio</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>4</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <!-- VANS List -->
          <div class="col-md-6 col-lg-4 filter-item cat5">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/van/T (1).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Toyota Hiace</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>3</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>9</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat5">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/van/T (2).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>nissan vanette</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>3</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>6</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat5">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/van/T (5).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>Toyota KDH hiace</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>4</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>13</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <!-- MINI VANS List -->
          <div class="col-md-6 col-lg-4 filter-item cat6">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/minivan/T (5).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>kia acrnival iii</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>3</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>6</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat6">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/minivan/T (1).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>nissan serrena</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>3</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>6</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat6">
             <div class="taxi-item">
                <div class="taxi-img">
                <img src="{{ url('public/assets/img/taxi/minivan/T (2).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>nissan nv200</h4>
                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-car-side-bolt"></i> Taxi Doors: <span>3</span></li>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>6</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>4</span></li>
                         <li><i class="far fa-heat"></i> Air Condition: <span>Yes</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <!-- MOTORBIKES List -->
          <div class="col-md-6 col-lg-4 filter-item cat7">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ url('public/assets/img/taxi/motorbike/T (1).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>apache rtr 200</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>1</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>0</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat7">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ url('public/assets/img/taxi/motorbike/T (2).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>yamaha fz</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>1</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>0</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat7">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ url('public/assets/img/taxi/motorbike/T (4).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>honda dio</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>1</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>0</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-md-6 col-lg-4 filter-item cat7">
             <div class="taxi-item">
                <div class="taxi-img">
                   <img src="{{ url('public/assets/img/taxi/motorbike/T (3).png') }}" alt>
                </div>
                <div class="taxi-content">
                   <div class="taxi-head">
                      <h4>yadea t5</h4>

                   </div>
                   <div class="taxi-feature">
                      <ul>
                         <li><i class="far fa-person-seat"></i> Passengers: <span>1</span></li>
                         <li><i class="far fa-suitcase-rolling"></i> Luggage Carry: <span>0</span></li>
                         <li><i class="far fa-map-location-dot"></i> GPS Navigation: <span>Yes</span></li>
                         <li><i class="far fa-user-pilot"></i> Driver Choosing: <span>Yes</span></li>
                      </ul>
                   </div>
                   <a href="#" class="theme-btn">Book Taxi Now<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>

          <!-- List END -->


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
                      <img src="{{ url('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                      <h6 class="title">+ Available Taxi </h6>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                   <div class="icon">
                      <img src="{{ url('public/assets/img/icon/happy.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="90" data-speed="3000">90</span>
                      <h6 class="title">+ Happy Clients</h6>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                   <div class="icon">
                      <img src="{{ url('public/assets/img/icon/driver.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="70" data-speed="3000">70</span>
                      <h6 class="title">+ Our Drivers</h6>
                   </div>
                </div>
             </div>
             <div class="col-lg-3 col-sm-6">
                <div class="counter-box">
                   <div class="icon">
                      <img src="{{ url('public/assets/img/icon/trip.svg') }}" alt>
                   </div>
                   <div>
                      <span class="counter" data-count="+" data-to="180" data-speed="3000">180</span>
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
                   <img src="{{ url('public/assets/img/icon/taxi-safety.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>Safety Guarantee</h4>
                   <p>Your safety is our top priority. We adhere to strict safety standards and protocols to ensure a secure and comfortable ride for all our passengers.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="feature-item mt-lg-5 wow fadeInDown" data-wow-delay=".25s">
                <div class="feature-icon">
                   <img src="{{ url('public/assets/img/icon/pickup.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>Fast Pickup</h4>
                   <p>Experience the convenience of our fast pickup service. Our drivers are always prompt, minimizing your wait time and getting you to your destination as quickly as possible.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                <div class="feature-icon">
                   <img src="{{ url('public/assets/img/icon/money.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>Affordable Rate</h4>
                   <p>Enjoy competitive and transparent pricing with our affordable rates. We believe in providing high-quality service without breaking the bank, making every ride economical.
                   </p>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-3">
             <div class="feature-item mt-lg-5 wow fadeInDown" data-wow-delay=".25s">
                <div class="feature-icon">
                   <img src="{{ url('public/assets/img/icon/support.svg') }}" alt>
                </div>
                <div class="feature-content">
                   <h4>24/7 Support</h4>
                   <p>We’re here for you around the clock with our 24/7 support. Whether you have questions or need assistance, our dedicated team is always just a call away.
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
                      <img src="{{ url('public/assets/img/rate/01.png') }}" alt>
                   </div>
                </div>
                <div class="rate-header-content">
                   <h4>Basic Pakage</h4>
                   <p class="rate-duration">One Time Payment</p>
                </div>
                <div class="rate-content">
                   <div class="rate-icon">
                      <img src="{{ url('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="rate-feature">
                      <ul>
                         <li><i class="far fa-check-double"></i> Base Charge: <span>Rs 200</span></li>
                         <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                         <li><i class="far fa-check-double"></i> Up To 50 kms: <span>Rs 200/km</span></li>
                         {{-- <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li> --}}
                         {{-- <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li> --}}
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
                      <img src="{{ url('public/assets/img/rate/01.png') }}" alt>
                   </div>
                </div>
                <div class="rate-header-content">
                   <h4>Standard Pakage</h4>
                   <p class="rate-duration">One Time Payment</p>
                </div>
                <div class="rate-content">
                   <div class="rate-icon">
                      <img src="{{ url('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="rate-feature">
                      <ul>
                         <li><i class="far fa-check-double"></i> Base Charge: <span>Rs 250</span></li>
                         <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                         <li><i class="far fa-check-double"></i> Up To 50 kms: <span>Rs 200/km</span></li>
                         {{-- <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li> --}}
                         {{-- <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li> --}}
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
                      <img src="{{ url('public/assets/img/rate/01.png') }}" alt>
                   </div>
                </div>
                <div class="rate-header-content">
                   <h4>Premium Pakage</h4>
                   <p class="rate-duration">One Time Payment</p>
                </div>
                <div class="rate-content">
                   <div class="rate-icon">
                      <img src="{{ url('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="rate-feature">
                      <ul>
                         <li><i class="far fa-check-double"></i> Base Charge: <span>Rs 300</span></li>
                         <li><i class="far fa-check-double"></i> Distance Allowance: <span>5000m</span></li>
                         <li><i class="far fa-check-double"></i> Up To 50 kms: <span>Rs 300/km</span></li>
                         {{-- <li><i class="far fa-check-double"></i> Booking Fee: <span>$0.99</span></li> --}}
                         {{-- <li><i class="far fa-check-double"></i> Extra Passangers: <span>$0.45</span></li> --}}
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
                   <img src="{{ url('public/assets/img/team/01.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Sunil Shantha</a></h5>
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
                   <img src="{{ url('public/assets/img/team/02.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Ayesha Thennakoon</a></h5>
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
                   <img src="{{ url('public/assets/img/team/03.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Suresh Wijethunga</a></h5>
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
                   <img src="{{ url('public/assets/img/team/04.jpg') }}" alt="thumb">
                </div>
                <div class="team-content">
                   <div class="team-bio">
                      <h5><a href="#">Asanka Udaya</a></h5>
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
                   <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=q0mbKsKG-ng">
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
                   At Taxica, we are dedicated to delivering quality service that exceeds your expectations. Our commitment to customer satisfaction drives everything we do, ensuring a great experience for every passenger.
                   </p>
                </div>
                <div class="choose-img wow fadeInUp" data-wow-delay=".25s">
                   <img src="{{ url('public/assets/img/choose/01.png') }}" alt>
                </div>
             </div>
          </div>
          <div class="col-lg-6">
             <div class="choose-content-wrapper wow fadeInRight" data-wow-delay=".25s">
                <div class="choose-item">
                   <span class="choose-count">01</span>
                   <div class="choose-item-icon">
                      <img src="{{ url('public/assets/img/icon/taxi-1.svg') }}" alt>
                   </div>
                   <div class="choose-item-info">
                      <h3>Best Quality Taxi</h3>
                      <p>We pride ourselves on offering the best quality taxis in the industry. Our vehicles are meticulously maintained to ensure a clean, comfortable, and enjoyable ride every time.</p>
                   </div>
                </div>
                <div class="choose-item ms-lg-5">
                   <span class="choose-count">02</span>
                   <div class="choose-item-icon">
                      <img src="{{ url('public/assets/img/icon/driver.svg') }}" alt>
                   </div>
                   <div class="choose-item-info">
                      <h3>Expert Drivers</h3>
                      <p>Our team of expert drivers is committed to providing you with a safe and pleasant journey. With extensive knowledge of the area and exceptional customer service skills, they make every ride a positive experience.</p>
                   </div>
                </div>
                <div class="choose-item mb-lg-0">
                   <span class="choose-count">03</span>
                   <div class="choose-item-icon">
                      <img src="{{ url('public/assets/img/icon/taxi-location.svg') }}" alt>
                   </div>
                   <div class="choose-item-info">
                      <h3>Many Locations</h3>
                      <p>With services available in numerous locations, we are always just a ride away. No matter where you are, you can count on us to be there when you need us.</p>
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
                <p class="about-text">We understand that you may have questions about our services. Our FAQ section provides quick answers to common inquiries, helping you find the information you need easily.
                </p>
                <div class="faq-img mt-3">
                   <img src="{{ url('public/assets/img/faq/01.jpg') }}" alt>
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
                      Booking a ride is quick and easy! Typically, our online booking process takes just a few minutes, allowing you to schedule your transportation with minimal hassle.
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
                      Becoming a member is simple and beneficial! Visit our website to sign up, and enjoy exclusive offers, discounts, and faster booking options tailored just for you.
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
                      We support a variety of secure payment gateways to make transactions easy and safe. You can choose from credit/debit cards, digital wallets, and other popular payment methods.
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
                      If you need to cancel your ride, simply log into your account and follow the cancellation instructions. Our user-friendly system ensures that cancellations are quick and hassle-free.
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
                   <img src="{{ url('public/assets/img/testimonial/01.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Dilani Silva</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                "I had a fantastic experience with Taxica. The driver was punctual, friendly, and navigated the city expertly. I highly recommend their service for anyone needing reliable transportation!"
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
                   <img src="{{ url('public/assets/img/testimonial/02.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Deneth Anjana</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                "Booking my ride online was a breeze, and the pickup was super fast. The car was clean and comfortable, making my journey enjoyable. I will definitely use this service again!".
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
                   <img src="{{ url('public\assets\img\testimonial\03.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Nalaka Perera</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                "I often travel for business, and Taxica has never let me down. Their drivers are professional, and the service is always top-notch. I appreciate their commitment to quality and safety."
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
                   <img src="{{ url('public/assets/img/testimonial/04.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Ishara Galappaththi</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                "I booked a taxi for my family trip, and it was perfect! The driver was courteous and knew all the best routes. Affordable rates and excellent service—I'll be using them for all my future travels!"
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
                   <img src="{{ url('public/assets/img/testimonial/05.jpg') }}" alt>
                </div>
                <div class="testimonial-author-info">
                   <h4>Rukshan De Silva</h4>
                   <p>Customer</p>
                </div>
             </div>
             <div class="testimonial-quote">
                <span class="testimonial-quote-icon"><i class="far fa-quote-right"></i></span>
                <p>
                "Booking my ride online was a breeze, and the pickup was super fast. The car was clean and comfortable, making my journey enjoyable. I will definitely use this service again!".
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
                <p>Booking your cab with Taxica is quick and easy! Simply enter your pickup location, choose your destination, and select your preferred vehicle—all at affordable rates. Experience hassle-free transportation with just a few clicks!</p>
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
                   <img src="{{ url('public/assets/img/blog/01.jpg') }}" alt="Thumb">
                </div>
                <div class="blog-item-info">
                   <div class="blog-item-meta">
                      <ul>
                         <li><a href="#"><i class="far fa-user-circle"></i> Suranga Marasingha</a></li>
                         <li><a href="#"><i class="far fa-calendar-alt"></i> October 25, 2024</a></li>
                      </ul>
                   </div>
                   <h4 class="blog-title">
                      <a href="#">New Fleet Expansion</a>
                   </h4>
                   <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="blog-item wow fadeInUp" data-wow-delay=".50s">
                <div class="blog-item-img">
                   <img src="{{ url('public/assets/img/blog/02.jpg') }}" alt="Thumb">
                </div>
                <div class="blog-item-info">
                   <div class="blog-item-meta">
                      <ul>
                         <li><a href="#"><i class="far fa-user-circle"></i> Dilan Godamanna</a></li>
                         <li><a href="#"><i class="far fa-calendar-alt"></i> October 23, 2024</a></li>
                      </ul>
                   </div>
                   <h4 class="blog-title">
                      <a href="#">Tips for a Safe Taxi Ride</a>
                   </h4>
                   <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right"></i></a>
                </div>
             </div>
          </div>
          <div class="col-md-6 col-lg-4">
             <div class="blog-item wow fadeInUp" data-wow-delay=".75s">
                <div class="blog-item-img">
                   <img src="{{ url('public/assets/img/blog/03.jpg') }}" alt="Thumb">
                </div>
                <div class="blog-item-info">
                   <div class="blog-item-meta">
                      <ul>
                         <li><a href="#"><i class="far fa-user-circle"></i> Aruna Fernando</a></li>
                         <li><a href="#"><i class="far fa-calendar-alt"></i> October 24, 2024</a></li>
                      </ul>
                   </div>
                   <h4 class="blog-title">
                      <a href="#">Introducing Our Loyalty Program</a>
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
                <img src="{{ url('public/assets/img/partner/01.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ url('public/assets/img/partner/02.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ url('public/assets/img/partner/03.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ url('public/assets/img/partner/01.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ url('public/assets/img/partner/02.png') }}" alt>
             </div>
          </div>
          <div class="partner-item">
             <div class="partner-img">
                <img src="{{ url('public/assets/img/partner/03.png') }}" alt>
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
                      Experience the convenience of Taxica at your fingertips. Download our app for free and book your rides anytime, anywhere!
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
             <img src="{{ url('public/assets/img/download/01.png') }}" alt>
          </div>
       </div>
    </div>
 </div>





@endsection

@push('css')
    <style>

    </style>
@endpush
@push('scripts')
<script>

</script>

@endpush
