@extends('layouts.frontend_dashboard')

@section('content')

<div class="user-profile-wrapper">
    <div class="row">
       <div class="col-lg-12">
          <div class="user-profile-card">
             <h4 class="user-profile-card-title">Cancel Booking</h4>
             <div class="user-profile-form">
                <form method="POST" id="frmBookingCancel">
                   <div class="row">
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Booking Id</label>
                            <select class="form-control" name="booking_id" id="booking_id">
                                <option value="">Select Booking ID</option>
                                @foreach ($getAllBookings as $getAllBooking)
                                    <option value="{{ $getAllBooking->id }}">{{ 'ID: '.$getAllBooking->id.' / Date:'.$getAllBooking->pick_up_date }}</option>
                                @endforeach
                            </select>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Reason For Cancellation</label>
                            <select class="form-control" name="choose_reason" id="choose_reason">
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
                            <textarea class="form-control" rows="3" placeholder="Write Comment" name="comments" id="comments"></textarea>
                         </div>
                      </div>
                   </div>
                   <button type="submit" class="theme-btn my-3"><span class="far fa-xmark-circle"></span> Cancel Booking</button>
                </form>
             </div>
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

$(document).ready(function() {
    $('#booking_id').select2({
        placeholder: 'Select Booking ID', // Optional placeholder
        allowClear: true                   // Allows the user to clear the selection
    });

    $('#choose_reason').select2({
        placeholder: 'Select Reason', // Optional placeholder
        allowClear: true                   // Allows the user to clear the selection
    });


    $('#frmBookingCancel').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        var bookingId = $('#booking_id').val();
        var chooseReason = $('#choose_reason').val();
        var comments = $('#comments').val();
        var csrfToken = '{{ csrf_token() }}';

        // Validation check (optional)
        if (!bookingId || !chooseReason || !comments) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Please fill all fields',
                timer: 2500,
                showConfirmButton: false
            });
            return;
        }

        $.ajax({
            url: '{{ route("driver.cancelbookingform") }}', // Replace with the correct route to handle booking cancellation
            type: 'POST',
            data: {
                booking_id: bookingId,
                reason: chooseReason,
                remarks: comments,
                _token: csrfToken
            },
            success: function(response) {
                // Display SweetAlert based on response messageType
                Swal.fire({
                    position: "bottom-end",
                    icon: response.messageType === 'success' ? "success" : "error",
                    title: response.message,
                    showConfirmButton: false,
                    timer: response.messageType === 'success' ? 4000 : 2500
                });

                // Optionally clear the form fields after success
                if (response.messageType === 'success') {
                    $('#frmBookingCancel')[0].reset();
                }
            },
            error: function(xhr, status, error) {
                console.log("Error getting Categories ! \n", xhr, status, error);
                Swal.fire({
                    position: "bottom-end",
                    icon: "error",
                    title: "An error occurred. Please try again.",
                    showConfirmButton: false,
                    timer: 2500
                });
                //$('#overlay').hide();
            }
        });
    });


});
</script>

@endpush
