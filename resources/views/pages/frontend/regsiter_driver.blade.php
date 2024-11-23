@extends('layouts.frontend')

@section('content')

<div class="site-breadcrumb" style="background: url({{ url('public/assets/img/breadcrumb/01.jpg') }})">
    <div class="container">
       <h2 class="breadcrumb-title">Register Driver</h2>
       <ul class="breadcrumb-menu">
          <li><a href="{{ URL::to('/') }}">Home</a></li>
          <li><a href="{{ route('register.index') }}">Register</a></li>
          <li class="active">Register Driver</li>
       </ul>
    </div>
 </div>
 <div class="login-area py-120">
    <div class="container">
        <div class="col-12 col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
       <div class="col-md-5 mx-auto">
          <div class="login-form">
             <div class="login-header">
                <img src="{{ url('public/assets/img/logo/logo.png') }}" alt>
                <p>Create your Taxica account</p>
             </div>
             <form action="#" id="driverRegisterForm" method="POST">
                <input type="hidden" name="userType" id="userType" value="driver">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup" autofocus>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"  data-parsley-trigger="keyup">
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required data-parsley-length="[8, 16]" data-parsley-trigger="keyup">
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" data-parsley-equalto="#password" data-parsley-trigger="keyup" class="form-control" required>
                </div>
                <div class="form-check form-group">
                   <input class="form-check-input" type="checkbox" value id="agree" required>
                   <label class="form-check-label" for="agree">
                   I agree with the <a href="#">Terms Of Service.</a>
                   </label>
                </div>
                <div class="d-flex align-items-center">
                   <button type="submit" class="theme-btn"><i class="fas fa-taxi"></i> Register</button>
                </div>
             </form>
             <div class="login-footer">
                <p>Already have an account? <a href="{{ route('login.index') }}">Login.</a></p>
                {{-- <div class="social-login">
                   <p>Continue with social media</p>
                   <div class="social-login-list">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-google"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                   </div>
                </div> --}}
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
$(document).ready(function(){
    //action="{{ route('register.customer') }}"
    $('#driverRegisterForm').parsley();
    $('#driverRegisterForm').on('submit',function(event){
        event.preventDefault();
        if($('#driverRegisterForm').parsley().isValid())
        {
            $('.preloader').css({'display':'flex'});
            $.ajax({
                url : "{{ route('register.driverform') }}",
                cache: false,
                data: $(this).serialize() + '&_token={{ csrf_token() }}',
                type: 'POST',
                dataType: 'json',
                success : function(response) {
                    console.log(response);
                    $('#driverRegisterForm').parsley().reset();
                    $('#driverRegisterForm')[0].reset();
                    $('.preloader').css({'display':'none'});
                    Swal.fire({
                        position: "bottom-end",
                        icon: response.messageType === 'success' ? "success" : "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: response.messageType === 'success' ? 4000 : 2500
                    });

                    if(response.messageType == 'success'){
                        let updateUrl = '{{ route("otp.verify", ":id") }}';
                        updateUrl = updateUrl.replace(':id', response.user_id);
                        setTimeout(() => {
                            window.location.href = ""+updateUrl+""; // Redirect to the specified URL
                        }, 3500);
                    }
                },
                error: function(xhr, status, error) {
                    $('.preloader').css({'display':'none'});
                    console.log("Error getting Categories ! \n", xhr, status, error);
                }
            });
        }else{
            Swal.fire({
                position: "bottom-end",
                icon: "error",
                title: "this form data is not valid yet..!!",
                showConfirmButton: false,
                timer: 4000
            });
        }

    });
});
</script>



@endpush
