@extends('layouts.frontend_dashboard')

@section('content')

<div class="user-profile-wrapper">

    <div class="row">
       <div class="col-lg-7">
          <div class="user-profile-card">
             <h4 class="user-profile-card-title">Profile Info</h4>
             <div class="user-profile-form">
                <form action="#" method="POST" id="updateProfile">
                    <input type="hidden" name="user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="user_role" name="user_role" value="{{ Auth::user()->role }}">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="user_name" id="user_name" value="{{ Auth::user()->name }}" placeholder="Name">
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="user_gender" id="user_gender">
                                <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <label>Birthday</label>
                            <input type="text" class="form-control date-picker-all" min="{{ date('Y-m-d', strtotime('-150 years')) }}"  name="user_birthday" id="user_birthday" value="{{ Auth::user()->birthday }}" placeholder="Birthday">
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="user_email" id="user_email" value="{{ Auth::user()->email }}" placeholder="Email">
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="user_phone" id="user_phone" value="{{ Auth::user()->phone }}" placeholder="Phone">
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="user_address" id="user_address" value="{{ Auth::user()->address }}" placeholder="Address">
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                            <label>Active</label>
                            <select name="user_active" class="form-control" id="user_active" required>
                                <option value="active" {{ old('active', Auth::user()->active) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('active', Auth::user()->active) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                         </div>
                      </div>
                   </div>
                   <button type="submit" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                </form>
             </div>
          </div>
       </div>
       <div class="col-lg-5">
          <div class="user-profile-card">
             <h4 class="user-profile-card-title">Change Password</h4>
             <div class="col-lg-12">
                <div class="user-profile-form">
                   <form action="#" id="updatePassword">
                      <input type="hidden" name="user_id" name="user_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="user_role" name="user_role" value="{{ Auth::user()->role }}">
                      <div class="form-group">
                         <label>Old Password</label>
                         <input type="password" class="form-control" placeholder="Old Password" name="old_password">
                      </div>
                      <div class="form-group">
                         <label>New Password</label>
                         <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password">
                      </div>
                      <div class="form-group">
                         <label>Re-Type Password</label>
                         <input type="password" class="form-control" placeholder="Re-Type Password" name="confirm_password">
                      </div>
                      <button type="submit" class="theme-btn my-3"><span class="far fa-key"></span> Change Password</button>
                   </form>
                </div>
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
    // Listen for the button click to save changes
    $('#updateProfile').on('submit', function(e) {
        e.preventDefault();
        // Collect form data
        var formData = {
            user_id: $('#updateProfile input[name="user_id"]').val(),
            user_role: $('#updateProfile input[name="user_role"]').val(),
            user_name: $('#updateProfile input[name="user_name"]').val(),
            user_gender: $('#updateProfile select[name="user_gender"]').val(),
            user_birthday: $('#updateProfile input[name="user_birthday"]').val(),
            user_email: $('#updateProfile input[name="user_email"]').val(),
            user_phone: $('#updateProfile input[name="user_phone"]').val(),
            user_active: $('#updateProfile #user_active').val(),
            user_address: $('#updateProfile input[name="user_address"]').val(),
            _token: '{{ csrf_token() }}' // Include CSRF token for security
        };
        console.log($('#updateProfile #user_active').val());
        //console.log(formData);
        // Send the AJAX request
        $.ajax({
            url: '{{ route("customer.updateprofile") }}', // Route name for update profile
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                // Handle the response from the server
                Swal.fire({
                    position: "bottom-end",
                    icon: response.messageType === 'success' ? "success" : "error",
                    title: response.message,
                    showConfirmButton: false,
                    timer: response.messageType === 'success' ? 4000 : 2500
                });

                // If successful, you can also add additional actions here like reloading the page, etc.
                if (response.messageType === 'success') {
                    setTimeout(function() {
                        location.reload(); // Optionally reload the page
                    }, 6000); // Delay for 4 seconds to show the success message
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', xhr, status, error);

                // If the request fails, show an error message
                Swal.fire({
                    position: "bottom-end",
                    icon: "error",
                    title: "Something went wrong. Please try again.",
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    });

    $('#updatePassword').on('submit', function(e) {
        e.preventDefault();

        // Collect form data
        var formData = {
            user_id: $('input[name="user_id"]').val(),
            user_role: $('input[name="user_role"]').val(),
            old_password: $('input[name="old_password"]').val(),
            new_password: $('input[name="new_password"]').val(),
            confirm_password: $('input[name="confirm_password"]').val(),
            _token: '{{ csrf_token() }}' // Include CSRF token for security
        };

        // Send the AJAX request
        $.ajax({
            url: '{{ route("customer.updatepassword") }}', // Route for updating password
            type: 'POST',
            data: formData,
            success: function(response) {
                // SweetAlert for successful or failed password update
                Swal.fire({
                    position: "bottom-end",
                    icon: response.messageType === 'success' ? "success" : "error",
                    title: response.message,
                    showConfirmButton: false,
                    timer: response.messageType === 'success' ? 4000 : 2500
                });

                // If successful, you can clear the form or redirect if necessary
                if (response.messageType === 'success') {
                    $('#updatePassword')[0].reset(); // Reset form if successful
                }
            },
            error: function(xhr) {
                // SweetAlert for any errors during the request
                Swal.fire({
                    position: "bottom-end",
                    icon: "error",
                    title: "Something went wrong. Please try again.",
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    });


});
</script>

@endpush
