</main>
<footer class="footer-area">
   <div class="footer-widget">
      <div class="container">
         <div class="row footer-widget-wrapper pt-120 pb-70">
            <div class="col-md-6 col-lg-4">
               <div class="footer-widget-box about-us">
                  <a href="#" class="footer-logo">
                  <img src="{{ url('public/assets/img/logo/logo-light.png') }}" alt="Logo"/>
                  </a>
                  <p class="mb-3">
                     We are many variations of passages available but the majority have suffered alteration
                     in some form by injected humour words believable.
                  </p>
                  <ul class="footer-contact">
                     <li><a href="tel:+94773944180"><i class="far fa-phone"></i>+94 7739 44 180</a></li>
                     <li><i class="far fa-map-marker-alt"></i>36 Bauddhaloka Mawatha, Gampaha</li>
                     <li><a href="mailto:makarandapathirana@gmail.com"><i class="far fa-envelope"></i><span class="__cf_email__">[email&#160;protected]</span></a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-6 col-lg-2">
               <div class="footer-widget-box list">
                  <h4 class="footer-widget-title">Quick Links</h4>
                  <ul class="footer-list">
                     <li><a href="#"><i class="fas fa-caret-right"></i> About Us</a></li>
                     <li><a href="#"><i class="fas fa-caret-right"></i> Update News</a></li>
                     <li><a href="#"><i class="fas fa-caret-right"></i> Terms Of Service</a></li>
                     <li><a href="#"><i class="fas fa-caret-right"></i> Privacy policy</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-6 col-lg-3">
               <div class="footer-widget-box list">
                  <h4 class="footer-widget-title">Support Center</h4>
                  <ul class="footer-list">
                     <li><a href="#"><i class="fas fa-caret-right"></i> FAQ's</a></li>
                     <li><a href="#"><i class="fas fa-caret-right"></i> Book A Ride</a></li>
                     <li><a href="#"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                     <li><a href="#"><i class="fas fa-caret-right"></i> Sitemap</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-6 col-lg-3">
               <div class="footer-widget-box list">
                  <h4 class="footer-widget-title">Newsletter</h4>
                  <div class="footer-newsletter">
                     <p>Subscribe Our Newsletter To Get Latest Update And News</p>
                     <div class="subscribe-form">
                        <form action="#">
                           <input type="email" class="form-control" placeholder="Your Email">
                           <button class="theme-btn" type="submit">
                           Subscribe Now <i class="far fa-paper-plane"></i>
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="copyright">
      <div class="container">
         <div class="row">
            <div class="col-md-6 align-self-center">
               <p class="copyright-text">
                  &copy; Copyright <span id="date"></span> <a href="#"> Taxica </a> All Rights Reserved.
               </p>
            </div>
            <div class="col-md-6 align-self-center">
               <ul class="footer-social">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                  <li><a href="#"><i class="fab fa-youtube"></i></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</footer>
<a href="#" id="scroll-top2" class="map-icon d-none"><img src="{{ url('public/assets/img/map-point.png') }}" alt=""></a>
<a href="#" id="scroll-top3" class="map-icon d-none"><img src="{{ url('public/assets/img/map-point.png') }}" alt=""></a>
<a href="#" id="scroll-top"><i class="far fa-arrow-up"></i></a>
{{-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script> --}}


<!-- Modal -->
<div class="modal fade" id="addTaxiModal" tabindex="-1" aria-labelledby="addTaxiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addTaxiModalLabel">Add Taxi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="frmAddTaxi" enctype="multipart/form-data">
                    @csrf <!-- Include CSRF token for security -->

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Vehicle Type</label>
                                <select name="type" class="form-control" id="type" required>
                                    <option value="">Select Vehicle Type</option>
                                    @foreach ($allVehicleTypes as $allVehicleType)
                                        <option value="{{ $allVehicleType->id }}">{{ $allVehicleType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="doors" class="form-label">Doors</label>
                                <input type="number" class="form-control" id="doors" name="doors" value="1" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="passengers" class="form-label">Passengers</label>
                                <input type="number" class="form-control" id="passengers" name="passengers" value="1" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="luggage_carry" class="form-label">Luggage Capacity</label>
                                <input type="number" class="form-control" id="luggage_carry" name="luggage_carry" value="1" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="transmission" class="form-label">Transmission</label>
                                <select class="form-control" id="transmission" name="transmission" required>
                                    <option value="automatic">Automatic</option>
                                    <option value="manual">Manual</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="year" class="form-label">Year</label>
                                <select class="form-control" id="year" name="year" required>
                                    @for ($x = 2024; $x >= 1950; $x--)
                                        <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <select class="form-control" id="fuel_type" name="fuel_type" required>
                                    <option value="petrol">Petrol</option>
                                    <option value="diesel">Diesel</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="air_condition" class="form-label">Air Condition</label>
                                <select class="form-control" id="air_condition" name="air_condition" required>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="gps" class="form-label">GPS</label>
                                <select class="form-control" id="gps" name="gps" required>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="engine" class="form-label">Engine</label>
                                <input type="text" class="form-control" id="engine" name="engine" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="registered_no" class="form-label">Registered No</label>
                                <input type="text" class="form-control" id="registered_no" name="registered_no" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <div class="modal-footer d-block">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Close</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-bottom-right">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Booking Routes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <input type="hidden" name="pick_up_location" id="pick_up_location"/>
          <input type="hidden" name="drop_off_location" id="drop_off_location"/>
          <input type="hidden" name="map_destance" id="map_destance"/>
          <input type="hidden" name="map_booking_id" id="map_booking_id" value="{{ session('booking_id', 0) }}"/>
          <div id="showMap"  style="height: 400px;width:100%;"></div>
        </div>
        <div class="modal-footer d-block">
            <div class="row pb-2">
                <div class="col-12 col-md-6">
                    <h6>Destances : <span id="showModalDestances">0</span></h6>
                </div>
                <div class="col-12 col-md-6">
                    <h6>Charge : Rs <span id="showModalCharge">00</span></h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 text-center pt-2">
                    <button type="button" class="btn btn-danger w-100" id="driverCancel">Cancel Trip</button>
                </div>
                <div class="col-12 col-md-6 text-center pt-2 {{ isset(Auth::user()->role) && Auth::user()->role == 'driver' ? 'd-flex' : 'd-none'  }}">
                    <input type="hidden" id="endTripBookigId" name="endTripBookigId"/>
                    <button type="button" class="btn btn-primary w-100" id="driverEdnTrip">End Trip</button>
                </div>
            </div>
          {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
        </div>
      </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cancelModalLabel">Cancel Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" id="frmCancelBooking">
        <div class="modal-body p-0">
            <input type="hidden" name="cancel_booking_id" id="cancel_booking_id"/>
            <input type="hidden" name="cance_user_id" id="cance_user_id"/>
            <input type="hidden" name="cancel_driver_id" id="cancel_driver_id"/>
            <input type="hidden" name="cancel_role" id="cancel_role"/>
            <div class="row p-4">
                <div class="col-md-12">
                    <div class="form-group">
                       <label>Reason For Cancellation</label>
                       <select class="form-control" name="choose_reason" id="choose_reason" required>
                          <option value="">Choose Reason</option>
                          <option value="1">Low Rider Score</option>
                          <option value="2">Personal Issues</option>
                          <option value="3">Others</option>
                       </select>
                    </div>
                 </div>
                 <div class="col-md-12">
                    <div class="form-group">
                       <label>Your Comment</label>
                       <textarea class="form-control" rows="3" placeholder="Write Comment" name="comments" id="comments" required></textarea>
                    </div>
                 </div>
            </div>
        </div>
          <div class="modal-footer d-block">
              <div class="row">
                  <div class="col-6 col-md-6 pl-0">
                      <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col-6 col-md-6 pr-0">
                      <button type="submit" class="btn btn-primary w-100" id="confirmationSubmit">Submit</button>
                  </div>
              </div>
          </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmationsModal" tabindex="-1" aria-labelledby="confirmationsLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmationsLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
            <input type="hidden" name="confirmation_booking_id" id="confirmation_booking_id"/>
            <input type="hidden" name="confirmation_user_id" id="confirmation_user_id"/>
            <input type="hidden" name="confirmation_driver_id" id="confirmation_driver_id"/>
            <input type="hidden" name="confirmation_role" id="confirmation_role"/>
            <div class="w-100 pt-4 pb-4" id="confirmationBody">
            </div>
        </div>
          <div class="modal-footer d-block">
              <div class="row">
                  <div class="col-6 col-md-6 pl-0">
                      <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col-6 col-md-6 pr-0">
                      <button type="button" class="btn btn-primary w-100 d-none" id="confirmationSubmit">Submit</button>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="driverModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-bottom-right">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Find Near by Customers</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
          <input type="hidden" name="driver_pick_up_location" id="driver_pick_up_location"/>
          <input type="hidden" name="driver_drop_off_location" id="driver_drop_off_location"/>
          <input type="hidden" name="driver_map_destance" id="driver_map_destance"/>
          <input type="hidden" name="map_driver_id" id="map_driver_id" value="{{ Auth::check() ? Auth::user()->id : '' }}"/>
          <input type="hidden" name="driver_map_booking_id" id="driver_map_booking_id" value=""/>
          <div id="showDriverMap"  style="height: 400px;width:100%;"></div>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bookingModalLabel">Book Your Ride</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="#" id="navFormBookingHome">
                <input type="hidden" name="bookingNavFormType" value="navi-form"/>

                <input type="hidden" name="nav_picup_long" id="nav_picup_long"/>
                <input type="hidden" name="nav_picup_lati" id="nav_picup_lati"/>

                <input type="hidden" name="nav_dropoff_long" id="nav_dropoff_long"/>
                <input type="hidden" name="nav_dropoff_lati" id="nav_dropoff_lati"/>
                <div class="row nav-form-step" id="nav-step-1">
                   <div class="col-lg-3">
                      <div class="form-group">
                         <label>Pick Up Location</label>
                         <input type="text" class="form-control" id="navpickuplocation" name="navpickuplocation" data-title="Pickup Location" placeholder="Click Here - Get Pickup" required/>
                         <i class="far fa-location-dot"></i>
                      </div>
                   </div>
                   <div class="col-lg-3">
                      <div class="form-group">
                         <label>Drop Off Location</label>
                         <input type="text" class="form-control" id="navdropofflocation" name="navdropofflocation" data-title="Dropoff Location" placeholder="Click Here - Get Dropoff" required/>
                         <i class="far fa-location-dot"></i>
                      </div>
                   </div>
                   <div class="col-lg-2">
                      <div class="form-group">
                         <label>Passengers</label>
                         <input type="number" class="form-control" placeholder="Passengers" min="1" step="1" max="4" value="1" data-title="Passengers" name="navpassengers" id="navpassengers" required>
                         <i class="far fa-user-tie"></i>
                      </div>
                   </div>
                   <div class="col-lg-2">
                      <div class="form-group">
                         <label>Pick Up Date</label>
                         <input type="text" class="form-control date-picker" min="{{ date('Y-m-d') }}" data-title="Pickup Date" name="nav_pick_up_date" value="{{ date('Y-m-d') }}" placeholder="MM/DD/YY"  required>
                         <i class="far fa-calendar-days"></i>
                      </div>
                   </div>
                   <div class="col-lg-2">
                      <div class="form-group">
                         <label>Pick Up Time</label>
                         <input type="text" class="form-control time-picker" value="" placeholder="00:00 AM" data-title="Pickup Time" name="nav_pick_up_time" id="nav_pick_up_time" required>
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
                                       <input type="radio" name="nav_vehicle_type" data-id="{{ $vehicleType->id }}" data-title="Vehicle Type" id="navradio{{ $key+1 }}"  {{ $checked }}>
                                       <img src="{{ url('public/assets/img/icon/vehicle-types/'.$vehicleType->icon.'') }}" alt="{{ $vehicleType->name }}" onclick="document.getElementById('navradio{{ $key+1 }}').click();">
                                       <p class="fw-bold text-dark">{{ $vehicleType->name }}</p>
                                   </div>
                               @endforeach
                           </div>
                       </div>
                    </div>
                   <div class="col-lg-3 align-self-end mt-3">
                      <button class="theme-btn nav-next-step" data-next="2" type="button">Next <i class="fas fa-arrow-right"></i></button>
                   </div>
                </div>
                <div class="row nav-form-step mt-4 justify-content-center" id="nav-step-2" style="display:none;">
                   <div class="col-lg-6">
                       <div class="form-group">
                          <label>User Name</label>
                          <input type="text" class="form-control" placeholder="Type Your Email or Phone" name="nav_login_username" data-title="Login Email or Password" id="nav_login_username">
                          {{-- <i class="far fa-clock"></i> --}}
                       </div>
                    </div>

                   <div class="col-lg-6">
                       <div class="form-group">
                          <label>Password</label>
                          <input type="text" class="form-control" placeholder="Type Your Password" data-title="Login Password" name="nav_login_password" id="nav_login_password">
                          {{-- <i class="far fa-clock"></i> --}}
                       </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                       <h5>You've not registered yet this sytem. Please below register button. after registerd you please use these steps as well..!!</h5>
                    </div>
                   <div class="col-lg-12 align-self-end mt-4">
                       <div class="row mt-4 justify-content-center">
                           <div class="col-12 col-md-4">
                               <button type="button" class="theme-btn nav-previous-step" data-previous="1"><i class="fas fa-arrow-left"></i> Previous</button>
                           </div>
                           <div class="col-12 col-md-4">
                               <button type="button" class="theme-btn3">Register Now <i class="fas fa-arrow-top"></i></button>
                           </div>
                           <div class="col-12 col-md-4">
                               <button type="button" class="theme-btn2 nav-next-step" data-next="3">Next <i class="fas fa-arrow-right"></i></button>
                           </div>
                       </div>
                   </div>
                </div>
                <div class="row nav-form-step mt-4 justify-content-center" id="nav-step-3" style="display:none;">
                   <div class="col-lg-12">
                       <div class="form-group text-center">
                          <h2>Great!</h2>
                          <h5 class="mt-4">You've completed all the necessary steps. Please submit your booking to finalize the process.</h5>
                       </div>

                       <div class="col-lg-12 align-self-end mt-4">
                           <div class="row mt-4 justify-content-center">
                               <div class="col-12 col-md-6">
                                   <button type="button" class="theme-btn nav-previous-step" data-previous="2"><i class="fas fa-arrow-left"></i> Previous</button>
                               </div>
                               <div class="col-12 col-md-6 text-right">
                                   <button type="submit" class="theme-btn2 nav-submit-step" data-next="3">Book Now <i class="fas fa-arrow-right"></i></button>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
             </form>
        </div>
        <div class="modal-footer d-none">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>


 <!-- Modal -->
 <div class="modal fade" id="driverlocationmodal" tabindex="-1" aria-labelledby="driverlocationmodallbl" aria-hidden="true">
    <div class="modal-dialog">
      <form action="#" method="POST" id="frmDiverLocationPickup">
        <input type="hidden" name="longatude" id="longatude"/>
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="driverlocationmodallbl">Driver Current Location</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="drivermapid" style="height: 400px;"></div>
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


 <!-- Modal -->
 <div class="modal fade" id="passwordResetModal" tabindex="-1" aria-labelledby="passwordResetModalLbl" aria-hidden="true">
    <div class="modal-dialog">
      <form action="#" method="POST" id="frmPasswordReset">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="passwordResetModalLbl">Reset Password</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="login-form">
                <form action="#" method="POST" id="userLoginForm">
                   <div class="form-group">
                      <label>Email or Phone</label>
                      <input type="text" name="pwdresetusername" id="pwdresetusername" class="form-control" placeholder="Your Email or Phone" required>
                   </div>
                   <div class="form-group">
                       <label>Password</label>
                        <input type="password" name="pwdresetpassword" id="pwdresetpassword" class="form-control" placeholder="Your Password" required>
                   </div>
                   <div class="form-group">
                       <label>New Password</label>
                        <input type="password" name="pwdresetnewpassword" id="pwdresetnewpassword" class="form-control" placeholder="Your New Password" required>
                   </div>
             </div>
        </div>
        <div class="modal-footer d-block">
            <div class="row">
                <div class="col-6 col-md-6 pl-0">
                    <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="col-6 col-md-6 pr-0">
                    <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </form>
    </div>
  </div>

<script src="{{ url('public/assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ url('public/assets/js/modernizr.min.js') }}"></script>
<script src="{{ url('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('public/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ url('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('public/assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('public/assets/js/jquery.appear.min.js') }}"></script>
<script src="{{ url('public/assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ url('public/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('public/assets/js/counter-up.js') }}"></script>
<script src="{{ url('public/assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ url('public/assets/js/jquery.timepicker.min.js') }}"></script>
{{-- <script src="{{ url('public/assets/js/jquery.nice-select.min.js') }}"></script> --}}
<script src="{{ url('public/assets/js/wow.min.js') }}"></script>
<script src="{{ url('public/assets/js/polyline.js') }}"></script>
<script src="{{ url('public/assets/js/main.js') }}?v={{ date('is') }}"></script>
{{-- <script src="https://unpkg.com/@mapbox/polyline@1.1.1/lib/polyline.js"></script> --}}

    <script>
     $(document).ready(function() {
        // Toggle sidebar open
        $('.navbar-toggler').on('click', function() {
            $('#main_nav').addClass('show_mobile_menu');
            $('.navbar-toggler').addClass('show_mobile_menu_toggler');
            //$('#main_nav').toggleClass('show').hide();
        });
        $('.show_mobile_menu_toggler').on('click', function() {
            $('.show_mobile_menu').style({'display':'none'});
            $('#main_nav').removeClass('show_mobile_menu');
            $('#main_nav').removeClass('show');
        });
    });
        //$('.select').niceSelect();

        // let watchId; // Variable to store the watchPosition ID
        // startWatchingLocation();

        // function startWatchingLocation() {
        //     // Check if geolocation is supported
        //     if (navigator.geolocation) {
        //         // Request user's location with high accuracy
        //         watchId = navigator.geolocation.watchPosition(
        //             showPosition,
        //             showError,
        //             {
        //                 enableHighAccuracy: true, // Request the best possible accuracy
        //                 timeout: 10000, // Wait 10 seconds before timing out
        //                 maximumAge: 0 // Don't use cached location
        //             }
        //         );
        //     } else {
        //         //alert("Geolocation is not supported by this browser.");
        //     }
        // }

        // function stopWatchingLocation() {
        //     // Stop tracking location changes
        //     if (watchId) {
        //         navigator.geolocation.clearWatch(watchId);
        //         console.log('Location tracking stopped.');
        //     }
        // }

        // function showPosition(position) {
        //     // Extract latitude, longitude, and accuracy
        //     const lat = position.coords.latitude;
        //     const lon = position.coords.longitude;
        //     const accuracy = position.coords.accuracy; // Accuracy in meters

        //     console.log(`Latitude: ${lat}, Longitude: ${lon}, Accuracy: ${accuracy} meters`);

        //     if (accuracy > 50) { // For example, 50 meters threshold
        //         //alert('Location accuracy is low. Please move to an open area for better accuracy.');
        //     }
        //     // You can send this data to your Laravel backend
        //     // Example: sendLocationToServer(lat, lon);
        // }

        // function showError(error) {
        //     // Handle geolocation errors
        //     switch (error.code) {
        //         case error.PERMISSION_DENIED:
        //             alert("User denied the request for Geolocation.");
        //             break;
        //         case error.POSITION_UNAVAILABLE:
        //             alert("Location information is unavailable.");
        //             break;
        //         case error.TIMEOUT:
        //             alert("The request to get user location timed out.");
        //             break;
        //         case error.UNKNOWN_ERROR:
        //             alert("An unknown error occurred.");
        //             break;
        //     }
        // }

        // // Optional: function to send location data to your Laravel backend
        // function sendLocationToServer(lat, lon) {
        //     fetch('/save-location', {
        //         method: 'POST',
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //         },
        //         body: JSON.stringify({
        //             latitude: lat,
        //             longitude: lon
        //         })
        //     })
        //     .then(response => response.json())
        //     .then(data => console.log('Location saved:', data))
        //     .catch((error) => console.error('Error:', error));
        // }
    </script>


</body>
</html>
