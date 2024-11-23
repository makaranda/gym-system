<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="{{ url('public/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ url('public/assets/js/paginathing.js')}}"></script>
<script src="{{ url('public/assets/js/jquery.redirect.js')}}"></script>
<script src="{{ url('public/assets/js/parsley.js')}}"></script>
<script src="{{ url('public/assets/js/select2.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/polyline/1.1.1/polyline.js"></script> --}}
{{-- <script src="https://unpkg.com/@mapbox/polyline@1.1.1/lib/polyline.js"></script> --}}
{{-- <script src="{{ url('public/assets/js/polyline.js') }}"></script> --}}
{{-- <script src="https://unpkg.com/@mapbox/polyline@1.1.1/lib/polyline.js"></script> --}}
<div id="validationAlertArea"></div>
<div  class="alert alert-danger alert-dismissible d-none">
    <button type="button" class="btn-close"></button>
    <strong>Warning!</strong> <span class="alert_messages"></span>
  </div>
<script>
    $(document).ready(function(){

    var encodedPolyline = "e}gi@w{lfNSzAMBTeBDaAKe@AG@GJGD@FBh@@vA@rHInFGdCYPCSqCOsAG{B@aA?E?e@M]a@W?OFuCBqAi@c@a@k@yCcGe@u@MQ`A}@xAuARQ|A{AjAiAdCaCTYWa@AC";

    // Use the polyline.decode function
    var decodedCoordinates = polyline.decode(encodedPolyline);

    // Log the decoded coordinates to the console
    //console.log('Polyline testing : '+decodedCoordinates);
    // var intervalID = setInterval(function() {
    //     checkCurrentBooking();
    // }, 5000);

    $('#scroll-top2').on('click',function(){
        checkCurrentBooking();
    });

    // setTimeout(function() {
    //     checkCurrentBooking();
    // }, 5000);

    checkCurrentBooking();

function checkCurrentBooking() {
    var checkUserUrl = '{{ route("booking.checkbooking") }}';
    var csrfToken = '{{ csrf_token() }}';

    $.ajax({
        url: checkUserUrl,
        type: 'POST',
        dataType: 'json',
        data: { action: 'checkuser', _token: csrfToken },
        success: function(data) {
            if (data.status == 1 && data.booking == 1) {
                // Prevent map reinitialization
                if (!window.mapInitialized) {
                    var pickupCoords = data.pick_up_location.split(',').map(Number); // Convert string to [lat, lng]
                    var dropoffCoords = data.drop_off_location.split(',').map(Number); // Convert string to [lat, lng]

                    // Initialize map centered on pickup location
                    var map_location = L.map('showMap').setView(pickupCoords, 13); // Start at pickupCoords

                    // Use OpenStreetMap tiles or any other tile provider with subdomains for faster loading
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors',
                        maxZoom: 19,
                        tileSize: 512,
                        zoomOffset: -1,
                        subdomains: ['a', 'b', 'c'],  // Use subdomains for parallel loading
                        noWrap: true  // Prevent loading unnecessary tiles outside the valid range
                    }).addTo(map_location);

                    window.mapInitialized = true; // Set map initialization flag

                    // Display Pickup Point Marker
                    L.marker(pickupCoords).addTo(map_location)
                        .bindPopup("Pickup Point")
                        .openPopup();

                    // Display Drop-Off Point Marker
                    L.marker(dropoffCoords).addTo(map_location)
                        .bindPopup("Drop-Off Point")
                        .openPopup();

                    // Fetch the route from the server
                    var checkUserUrl2 = '{{ route("booking.getroute") }}';
                    var csrfToken2 = '{{ csrf_token() }}';

                    $.ajax({
                        url: checkUserUrl2,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'checkuser',
                            start_lat: pickupCoords[0],
                            start_lng: pickupCoords[1],
                            end_lat: dropoffCoords[0],
                            end_lng: dropoffCoords[1]
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            console.log('AJAX Success Response:', data);

                            if (data.routes && data.routes.length > 0) {
                                var polylineEncoded = data.routes[0].geometry; // Encoded polyline
                                console.log('Encoded polyline:', polylineEncoded);

                                try {
                                    // Decode the polyline
                                    var decodedCoordinates = polyline.decode(polylineEncoded);
                                    console.log('Decoded coordinates:', decodedCoordinates);

                                    // Fix the coordinate order to [lat, lng] (Leaflet expects this order)
                                    var latlngs = decodedCoordinates.map(coord => [coord[1], coord[0]]); // Swap lat and lng

                                    // Draw the polyline on the map with the corrected coordinates
                                    var polylineLayer = L.polyline(latlngs, { color: 'blue' }).addTo(map_location);

                                    // Fit the map to the polyline bounds
                                    map_location.fitBounds(polylineLayer.getBounds());

                                    // Plot pickup and drop-off points (assuming pickupCoords and dropoffCoords are correct)
                                    L.marker(pickupCoords).addTo(map_location).bindPopup("Pickup Point").openPopup();
                                    L.marker(dropoffCoords).addTo(map_location).bindPopup("Drop-Off Point").openPopup();

                                } catch (error) {
                                    console.error('Error decoding polyline:', error);
                                }
                            } else {
                                console.error('No routes found');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Request Error:', error);
                        }
                    });

                }

                // Show the modal after initializing the map
                $('#scroll-top2').removeClass('d-none');
                $('#customModal').modal('show');
            } else {
                $('#scroll-top2').addClass('d-none');
            }

        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}






        // Clear the interval when the modal is shown
    $('#customModal').on('shown.bs.modal', function () {
        //clearInterval(intervalID);
    });
        // $('#validationAlertArea .btn-close').on('click',function(){
        //     $('#validationAlertArea alert').addClass('d-none');
        // });

        var myModal = new bootstrap.Modal($('#customModal')[0], {
            backdrop: false, // Disable the backdrop
            //backdrop: 'static', // Prevent closing the modal by clicking outside it
            keyboard: true
        });

        function validateStepFields(step) {
            var isValid = true;
            var errors = [];

            // Clear previous alerts
            $('#validationAlertArea').html(''); // Clear previous error messages
            console.log(step);
            //$('.alert').text('TESTING');
            // Loop through required fields in the given step
            $('#step-' + step + ' input, #step-' + step + ' select').each(function() {
                if ($(this).prop('required')) {
                    if ($(this).val() === "" || $(this).val() === null) {
                        var errorMessage = $(this).attr('data-title') + " is required.";
                        errors.push(errorMessage); // Collect error messages
                        isValid = false;

                    }
                }
            });

            // If there are errors, display them in separate Bootstrap alerts
            if (!isValid) {
                errors.forEach(function(error) {
                    console.log(error);

                    var alertHtml = `<div  class="alert alert-danger alert-dismissible">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Warning!</strong> <span class="alert_messages">${error}</span>
                                    </div>`;
                    $('#validationAlertArea').append(alertHtml);
                });
            }

            return isValid;
        }

        // function validateStepFields(step) {
        //     var isValid = true;

        //     // Clear previous alert
        //     $('#validationAlert').addClass('d-none');
        //     $('#validationAlert .alert_messages').text('');
        //     // Loop through required fields in the given step
        //     $('#step-' + step + ' input, #step-' + step + ' select').each(function() {
        //         if ($(this).prop('required')) {
        //             if ($(this).val() === "" || $(this).val() === null) {
        //                 var errorMessage = $(this).attr('data-title') + " is required.";

        //                 // Show the Bootstrap alert with the error message
        //                 $('#validationAlert').removeClass('d-none');
        //                 $('#validationAlert .alert_messages').text(errorMessage);

        //                 isValid = false;
        //                 return false; // Break the loop after the first invalid field
        //             }
        //         }
        //     });

        //     return isValid;
        // }



        $('.next-step').on('click', function() {
            var nextStep = $(this).data('next');
            var currentStep = nextStep - 1;
            if (validateStepFields(currentStep)) {
                $('.form-step').hide(); // Hide all steps
                // Show the next step
                console.log(nextStep);
                if(nextStep == 2){
                    var checkUserUrl = '{{ route("booking.checkuser") }}'; // Pass the route from Blade to a JS variable
                    var csrfToken = '{{ csrf_token() }}';
                    $.ajax({
                        url: checkUserUrl,
                        type: 'POST',
                        dataType: 'json',
                        data: {action:'checkuser'},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                             console.log('Success: ', data.status);
                            if(data.status == 1){
                                $('#step-3').show();
                            }else{
                                $('#login_username').attr('required', 'required');
                                $('#login_password').attr('required', 'required');
                                $('#step-2').show();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                }else if(nextStep == 3){
                    console.log('Step login');
                    var loginUserUrl = '{{ route("booking.loginuser") }}'; // Pass the route from Blade to a JS variable
                    var logincsrfToken = '{{ csrf_token() }}';
                    console.log(nextStep);
                    $.ajax({
                        url: loginUserUrl,
                        type: 'POST',
                        dataType: 'json',
                        data: $('#formBookingHome').serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('login : '+ response.status+' : '+ response.messageType+' : '+ response.message);
                            if(response.status == 1){
                                $('#step-3').show();
                            }else{
                                $('#step-2').show();
                                Swal.fire({
                                    position: "bottom-end",
                                    icon: response.messageType === 'success' ? "success" : "error",
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: response.messageType === 'success' ? 4000 : 2500
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                }else{
                    $('#step-' + nextStep).show();
                }
            }
        });

        // Show the previous step when clicking on 'Previous' button
        $('.previous-step').on('click', function() {
            var previousStep = $(this).data('previous');
            $('.form-step').hide(); // Hide all steps
            //$('#step-' + previousStep).show(); // Show the previous step

            console.log(previousStep);
            if(previousStep == 2){
                var checkUserUrl = '{{ route("booking.checkuser") }}'; // Pass the route from Blade to a JS variable
                var csrfToken = '{{ csrf_token() }}';
                $.ajax({
                    url: checkUserUrl,
                    type: 'POST',
                    dataType: 'json',
                    data: {action:'checkuser'},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        //console.log('Success: ', data);
                        if(data.status == 1){
                            $('#step-1').show();
                        }else{
                            $('#step-2').show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }else{
                $('#step-' + previousStep).show();
            }
        });

        //$('#openModalButton').parsley();
        $('#formBookingHome').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize();
            Swal.fire({
                title: 'Are you sure?',
                text: "You need to book this taxi..!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.preloader').css({'display':'flex'});
                    var now = new Date();
                    var currentTime = formatAMPM(now);
                    var bookedcsrfToken = '{{ csrf_token() }}';
                    // Correctly create a FormData object by passing the actual form element
                    $.ajax({
                        url: '{{ route("booking.frontpage") }}',
                        type: 'POST',
                        dataType: 'json',
                        data: $(this).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $('.preloader').css({'display':'none'});
                            console.log('Success: ', response);
                            $('#formBookingHome')[0].reset();
                            $('#pick_up_time').val(currentTime);
                            if(response.messageType === 'success'){
                                checkCurrentBooking();
                            }
                            Swal.fire({
                                position: "bottom-end",
                                icon: response.messageType === 'success' ? "success" : "error",
                                title: response.message,
                                showConfirmButton: false,
                                timer: response.messageType === 'success' ? 4000 : 2500
                            });
                            $('#step-3').hide();
                            $('#step-1').show();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error Status:', status);         // Error status (e.g., "timeout", "error", etc.)
                            console.error('HTTP Status Code:', xhr.status); // HTTP status code (e.g., 404, 500, etc.)
                            console.error('Response Text:', xhr.responseText); // Server response text
                            $('.preloader').css({'display':'none'});
                            Swal.fire({
                                position: "bottom-end",
                                icon: "error",
                                title: 'Error! \n There was an error processing your booking. '+error+'error',
                                showConfirmButton: false,
                                timer: 6500
                            });
                        }
                    });
                }
            });
        });

        function formatAMPM(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // If 0, set to 12
            minutes = minutes < 10 ? '0' + minutes : minutes; // Add leading zero to minutes if needed
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return strTime;
        }

        $('#vehicleType').on('change', function() {
            var type_id = $(this).val();
            console.log('testing');
            if (type_id) {
                form_type = '{{ route("vehicle.models", ":id") }}';
                form_type = form_type.replace(':id', type_id);
                console.log('testing - ' +form_type);
                // Make an AJAX request to fetch the vehicle models
                $.ajax({
                    url: ''+form_type+'',
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log('success'+ data);
                        //$('#vehicleModel').niceSelect('destroy');
                        //$('#vehicleModel').replaceWith('<select id="vehicleModel" class="select form-control"></select>');

                        $('#vehicleModel').empty();
                        $('#vehicleModel').append('<option value="">Choose Model</option>');

                        $.each(data, function(key, value) {
                            console.log('success'+ value.name);
                            $('#vehicleModel').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        //$('#vehicleModel').niceSelect();
                    }
                });
            } else {
                $('#vehicleModel').niceSelect('destroy');
                $('#vehicleModel').empty();
                $('#vehicleModel').append('<option value="">Choose Model</option>');

                //$('#vehicleModel').niceSelect();
            }
        });


        $('#logoutBtn').on('click',function(event){
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
    });
    </script>
