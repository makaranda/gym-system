@extends('layouts.login')

@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{ url('public/assets/login/images/bg-01.jpg') }}');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" action="#" id="userLoginForm" method="POST">
                <span class="login100-form-title p-b-49">
                    Admin Login
                </span>
                @if (Session::has('error'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div><i class="fa fa-ban mr-2"></i>Error</div>
                            </div>
                            <div class="col-12 col-md-12">
                                <p>{{ Session::get('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                @csrf
                <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" id="username" placeholder="Type your username">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" id="password" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                {{-- <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Forgot password?
                    </a>
                </div> --}}

                <div class="container-login100-form-btn mt-5">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>

                    </div>
                    <p><a href="{{ route('home.index') }}" class="btn btn-link">Back to Website</a></p>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

@endsection

@push('css')
    <style>

    </style>
@endpush

@push('scripts')
    <script>
    $(document).ready(function(){
        //action="{{ route('register.customer') }}"
        $('#userLoginForm').parsley();
        $('#userLoginForm').on('submit',function(event){
            event.preventDefault();
            if($('#userLoginForm').parsley().isValid())
            {
                $('.preloader').css({'display':'flex'});
                $.ajax({
                    url : "{{ route('adminlogin.login') }}",
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
