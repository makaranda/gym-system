@extends('layouts.frontend')

@section('content')
    @php
        //var_dump($_SESSION);
    @endphp
    <div class="site-breadcrumb" style="background: url({{ url('public/assets/img/breadcrumb/01.jpg') }})">
        <div class="container">
           <h2 class="breadcrumb-title">Login</h2>
           <ul class="breadcrumb-menu">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li class="active">Login</li>
           </ul>
        </div>
     </div>
     <div class="login-area py-120">
        <div class="container">
           <div class="col-md-5 mx-auto">
              <div class="login-form">
                 <div class="login-header">
                    <img src="{{ url('public/assets/img/logo/logo.png') }}" alt>
                    <p>Login with your Taxica account</p>
                 </div>
                 <form action="{{ route('login.login') }}" method="POST" id="userLoginForm">
                    <div class="form-group">
                       <label>Email or Phone</label>
                       <input type="text" name="username" id="username" class="form-control" placeholder="Your Email or Phone" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" required>
                            <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                                <i class="far fa-eye" id="togglePasswordIcon"></i>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                       <div class="form-check">
                          <input class="form-check-input" type="checkbox" value id="remember" required>
                          <label class="form-check-label" for="remember">
                          Remember Me
                          </label>
                       </div>
                       <a href="#" class="forgot-pass" data-bs-toggle="modal" data-bs-target="#passwordResetModal">Forgot Password?</a>
                    </div>
                    <div class="d-flex align-items-center">
                       <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                    </div>
                 </form>
                 <div class="login-footer">
                    <p>Don't have an account? <a href="{{ route('register.index') }}">Register.</a></p>
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
function togglePasswordVisibility() {
    const passwordField = document.getElementById("password");
    const toggleIcon = document.getElementById("togglePasswordIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    }
}

$(document).ready(function(){
    //action="{{ route('register.customer') }}"
    $('#userLoginForm').parsley();
    $('#userLoginForm').on('submit',function(event){
        event.preventDefault();
        if($('#userLoginForm').parsley().isValid())
        {
            $('.preloader').css({'display':'flex'});
            $.ajax({
                url : "{{ route('login.login') }}",
                cache: false,
                data: $(this).serialize() + '&_token={{ csrf_token() }}',
                type: 'POST',
                dataType: 'json',
                success : function(response) {
                    console.log(response);
                    $('.preloader').css({'display':'none'});
                    //$('#userLoginForm').parsley().reset();
                    //$('#userLoginForm')[0].reset();
                    Swal.fire({
                        position: "bottom-end",
                        icon: response.messageType === 'success' ? "success" : "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: response.messageType === 'success' ? 4000 : 2500
                    });

                    if (response.messageType === 'success') {
                        // Redirect the user
                        setTimeout(() => {
                            window.location.href = response.redirectUrl;
                        }, 2000);
                    }
                    //$('#overlay').hide();
                },
                error: function(xhr, status, error) {
                    console.log("Error getting Categories ! \n", xhr, status, error);
                    //$('#overlay').hide();
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
