@extends('layouts.frontend_dashboard')

@section('content')

<div class="user-profile-wrapper">
    {{-- <div class="row">
       <div class="col-md-6 col-lg-4">
          <div class="dashboard-widget dashboard-widget-color-1">
             <div class="dashboard-widget-info">
                <h1>{{ $allUpcommingBooking ?? 0 }}</h1>
                <span>Pending Booking</span>
             </div>
             <div class="dashboard-widget-icon">
                <i class="fal fa-list"></i>
             </div>
          </div>
       </div>
       <div class="col-md-6 col-lg-4">
          <div class="dashboard-widget dashboard-widget-color-2">
             <div class="dashboard-widget-info">
                <h1>{{ $allTotalBooking ?? 0 }}</h1>
                <span>Total Booking</span>
             </div>
             <div class="dashboard-widget-icon">
                <i class="fal fa-eye"></i>
             </div>
          </div>
       </div>
       <div class="col-md-6 col-lg-4">
          <div class="dashboard-widget dashboard-widget-color-3">
             <div class="dashboard-widget-info">
                <h1>{{ $allCancelBooking ?? 0 }}</h1>
                <span>Cancel Booking</span>
             </div>
             <div class="dashboard-widget-icon">
                <i class="fal fa-xmark-circle"></i>
             </div>
          </div>
       </div>
    </div> --}}
    <div class="row">
       <div class="col-lg-12">
          <div class="user-profile-card">
             <h4 class="user-profile-card-title">My Booking</h4>
             <div class="table-responsive" id="booking">

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
    fetchBooking();
    function fetchBooking(){
        var checkUserUrl = '{{ route("customer.fetchcustomerbooking") }}';
        var csrfToken = '{{ csrf_token() }}';

        $.ajax({
            url: checkUserUrl,
            type: 'GET',
            //dataType: 'json',
            data: { action: 'checkuser', _token: csrfToken },
            success: function(data) {
                //console.log(data);
                //if (data.pending_booking) {
                    $('#booking').html(data);
                //}
                    // Destroy any existing DataTable instances on this element
                    if ($.fn.DataTable.isDataTable('.table')) {
                        $('.table').DataTable().destroy();
                    }
                    // Initialize DataTable after inserting the data
                    $('.table').DataTable({
                        lengthChange: false,
                        info: false,
                        ordering: false,
                        paging: true
                    });
            }
        });
    }
</script>

@endpush
