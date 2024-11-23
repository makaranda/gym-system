@extends('layouts.frontend')

@section('content')
<div class="site-breadcrumb" style="background: url({{ url('public/assets/img/breadcrumb/01.jpg') }})">
    <div class="container">
       <h2 class="breadcrumb-title">OTP Verify</h2>
       <ul class="breadcrumb-menu">
          <li><a href="{{ URL::to('/') }}">Home</a></li>
          <li class="active">OTP Verify</li>
       </ul>
    </div>
 </div>
 <div class="login-area py-120">
    <div class="container">
       <div class="col-md-5 mx-auto">
          <div class="login-form">
             <div class="login-header">
                <img src="{{ url('public/assets/img/logo/logo.png') }}" alt>
                <p>Verify your Taxica account</p>
                <form method="POST" id="otpForm" action="#" class="otp-form mt-4">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">

                        <div class="form-input dark-border-gradient">
                            <input type="number" class="form-control active" placeholder="0" id="five1" name="no1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" autofocus="true">
                        </div>
                        <div class="form-input dark-border-gradient">
                            <input type="number" class="form-control" placeholder="0" id="five2" name="no2" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)">
                        </div>
                        <div class="form-input dark-border-gradient">
                            <input type="number" class="form-control" placeholder="0" id="five3" name="no3" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)">
                        </div>
                        <div class="form-input dark-border-gradient">
                            <input type="number" class="form-control" placeholder="0" id="five4" name="no4" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)">
                        </div>
                        <div class="form-input dark-border-gradient">
                            <input type="number" class="form-control" placeholder="0" id="five5" name="no5" onkeyup="onKeyUpEvent(5, event)" onfocus="onFocusEvent(5)">
                        </div>

                    {{-- <div class="form-group">
                        <label for="otp">Enter OTP:</label>
                        <input type="number" id="otp" name="otp" data-parsley-trigger="keyup" class="form-control" required placeholder="Enter Your OTP">
                    </div>--}}
                    {{-- <div class="d-flex align-items-center">
                        <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i> Verify OTP</button>
                    </div> --}}

                </form>
             </div>
          </div>
       </div>
    </div>
 </div>


@endsection

@push('css')
    <style>
       input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .otp-form .form-input .form-control.active {
            background-color: rgb(255 238 197);
        }
        .otp-form {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
            -ms-flex-align: center;
                align-items: center;
        -webkit-box-pack: justify;
            -ms-flex-pack: justify;
                justify-content: space-between;
        -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
        gap: 20px;
        }
        @media (max-width: 600px) {
        .otp-form {
            gap: calc(10px + 10 * (100vw - 320px) / 280);
        }
        }
        .otp-form .form-input::-webkit-outer-spin-button, .otp-form .form-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
        .otp-form .form-input .form-control {
        position: relative;
        text-align: center;
        padding: 15px;
        color: rgba(0,0,0, 1);
        background-color: rgb(224 224 224);
        border-color: transparent;
        border-radius: 8px;
        }
        @media (max-width: 600px) {
        .otp-form .form-input .form-control {
            padding: calc(10px + 5 * (100vw - 320px) / 280);
        }
        }
        .otp-form .form-input .form-control::-webkit-input-placeholder {
        color: rgb(121, 125, 131);
        }
        .otp-form .form-input .form-control::-moz-placeholder {
        color: rgb(121, 125, 131);
        }
        .otp-form .form-input .form-control:-ms-input-placeholder {
        color: rgb(121, 125, 131);
        }
        .otp-form .form-input .form-control::-ms-input-placeholder {
        color: rgb(121, 125, 131);
        }
        .otp-form .form-input .form-control::placeholder {
        color: rgb(121, 125, 131);
        }
        .otp-form .form-input .form-control:focus {
        -webkit-box-shadow: none;
                box-shadow: none;
        border: 1px solid rgba(var(--theme-color), 1);
        }
        .otp-form .btn {
        margin-top: 80px;
        }

        .theme-form .form-group {
        position: relative;
        display: block;
        margin-top: 20px;
        }
    </style>
@endpush
@push('scripts')
<script>
    $(document).ready(function() {
         $('#otpForm').submit(function(e) {
             e.preventDefault();


         });
    });

/*=====================
 otp js
=======================*/
function getCodeBoxElement(index) {
  return document.getElementById("five" + index);
}

function onKeyUpEvent(index, event) {
  const eventCode = event.which || event.keyCode;

  // Add the 'active' class if there is a value in the input field
  if (getCodeBoxElement(index).value.length === 1) {
    getCodeBoxElement(index).classList.add('active'); // Add active class

    // Check if it's the last input field
    if (index !== 5) {
      getCodeBoxElement(index + 1).focus();
    } else {
      getCodeBoxElement(index).blur();

      // Validate OTP fields before submitting
      if (validateOTPFields()) {
        let otp = concatenateOTP();
        submitOTP(otp);
      } else {
        Swal.fire({
          icon: "error",
          title: "All fields are required. Please fill out the OTP correctly.",
          showConfirmButton: true
        });
      }
    }
  }

  // Remove 'active' class if the input field is empty
  if (getCodeBoxElement(index).value.length === 0) {
    getCodeBoxElement(index).classList.remove('active');
  }

  // If backspace is pressed and not the first input, move to the previous field
  if (eventCode === 8 && index !== 1) {
    getCodeBoxElement(index - 1).focus();
  }
}

function onFocusEvent(index) {
  for (let item = 1; item < index; item++) {
    const currentElement = getCodeBoxElement(item);
    if (!currentElement.value) {
      currentElement.focus();
      break;
    }
  }
}

// Concatenate input values into one OTP string
function concatenateOTP() {
  let otp = '';
  for (let i = 1; i <= 5; i++) {
    otp += getCodeBoxElement(i).value;
  }
  return otp;
}

// Validate that all OTP fields are filled
function validateOTPFields() {
  for (let i = 1; i <= 5; i++) {
    if (!getCodeBoxElement(i).value) {
      return false;
    }
  }
  return true;
}

// Submit the OTP with AJAX
function submitOTP(otp) {
  $('.preloader').css({'display':'flex'});
  $.ajax({
    url: "{{ route('otp.verify.submit') }}",
    method: "POST",
    data: {
      _token: "{{ csrf_token() }}",
      user_id: "{{ $user_id }}",
      otp: otp
    },
    success: function(response) {
      $('.preloader').css({'display':'none'});
      Swal.fire({
        position: "bottom-end",
        icon: response.messageType === 'success' ? "success" : "error",
        title: response.message,
        showConfirmButton: false,
        timer: response.type === 'expired' ? 9000 : 2500
      });
      if (response.type == 'login') {
        setTimeout(() => {
          window.location.href = "{{ route('login.index') }}";
        }, 3500);
      }else if(response.type == 'expired'){
        setTimeout(() => {
            location.reload();
        }, 10000);
      }else{
        setTimeout(() => {
            location.reload();
        }, 3500);
      }
    },
    error: function(response) {
      $('.preloader').css({'display':'none'});
      Swal.fire({
        position: "bottom-end",
        icon: "error",
        title: "OTP verification failed. Please try again...!!",
        showConfirmButton: false,
        timer: 2500
      });
      setTimeout(() => {
            location.reload();
        }, 3500);
    }
  });
}

    </script>

@endpush
