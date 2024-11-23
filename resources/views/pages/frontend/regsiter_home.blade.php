@extends('layouts.frontend')

@section('content')

<div class="site-breadcrumb" style="background: url({{ url('public/assets/img/breadcrumb/01.jpg') }})">
    <div class="container">
       <h2 class="breadcrumb-title">Register</h2>
       <ul class="breadcrumb-menu">
          <li><a href="index-2.html">Home</a></li>
          <li class="active">Register</li>
       </ul>
    </div>
 </div>
 <div class="login-area py-120">
    <div class="container">

       <div class="col-md-5 mx-auto">
          <div class="login-form">
             <div class="login-header">
                <img src="{{ url('public/assets/img/logo/logo.png') }}" alt>
                <p>Create your Taxica account</p>
             </div>

             <div class="d-flex align-items-center">
                <a href="{{ route('register.driver') }}" class="theme-btn"><i class="fas fa-taxi"></i> Register as a Driver</a>
             </div>

             <div class="d-flex align-items-center mt-4">
                <a href="{{ route('register.customer') }}" class="theme-btn"><i class="fas fa-user"></i> Register as a Customer</a>
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
    $('#customerRegisterForm').parsley();
    $('#customerRegisterForm').on('submit',function(event){
        event.preventDefault();
        if($('#customerRegisterForm').parsley().isValid())
        {
            $.ajax({
                url : {{ route('register.customer') }},
                cache: false,
                data: $(this).serialize() + '&_token={{ csrf_token() }}',
                type: 'POST',
                dataType: 'json',
                success : function(response) {
                    //console.log(response);
                    $('#customerRegisterForm').parsley().reset();
                    $('#customerRegisterForm')[0].reset();
                    Swal.fire({
                        position: "bottom-end",
                        icon: response.messageType === 'success' ? "success" : "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: response.messageType === 'success' ? 4000 : 2500
                    });
                    listTableDatas();
                    $('#overlay').hide();
                },
                error: function(xhr, status, error) {
                    //console.log("Error getting Categories ! \n", xhr, status, error);
                    $('#overlay').hide();
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
