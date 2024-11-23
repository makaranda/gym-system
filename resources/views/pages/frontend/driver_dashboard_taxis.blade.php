@extends('layouts.frontend_dashboard')

@section('content')

<div class="user-profile-wrapper">
    <div class="row">
       <div class="col-lg-12">
          <div class="user-profile-card">
             <h4 class="user-profile-card-title">Taxis</h4>
             <button type="button" class="btn btn-warning float-right mb-3" data-bs-toggle="modal" data-bs-target="#addTaxiModal">Add Taxi</button>
             <div class="table-responsive w-100" id="taxis">

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

    $('#frmAddTaxi').parsley();
    $(document).on('submit', '#frmAddTaxi', function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Create FormData object with form data
        var submitUrl = '{{ route("driver.addtaxi") }}';

        $.ajax({
            url: submitUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#addTaxiModal').modal('hide');
                $('.modal-backdrop').remove();
                if (response.messageType === 'success') {
                    Swal.fire({
                        position: "bottom-end",
                        icon: "success",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 4500
                    });
                    // Optionally, refresh the taxis list here
                    fetchTaxis();
                } else {
                    Swal.fire({
                        position: "bottom-end",
                        icon: "error",
                        title: response.message,
                        showConfirmButton: false,
                        timer: 4500
                    });
                }
            },
            error: function(xhr, status, error) {
                $('#addTaxiModal').modal('hide');
                $('.modal-backdrop').remove();
                console.error("Error getting data!", xhr, status, error);
                Swal.fire({
                    position: "bottom-end",
                    icon: "error",
                    title: "An error occurred while saving the taxi.",
                    showConfirmButton: false,
                    timer: 4500
                });
            }
        });
    });

    $(document).on('click','.activeTaxis',function(){
        var taxiDatas = $(this).attr('data-id');
        var taxiDataArry = taxiDatas.split('/');
        var checkUserUrl = '{{ route("driver.activetaxi") }}';
        var csrfToken = '{{ csrf_token() }}';

        //console.log(taxiDatas);
        $.ajax({
            url: checkUserUrl,
            type: 'GET',
            //dataType: 'json',
            data: { action: 'checkuser',taxi_id:taxiDataArry[0],user_id:taxiDataArry[1],taxi_status:taxiDataArry[2], _token: csrfToken },
            success: function(response) {
                fetchTaxis();
                Swal.fire({
                    position: "bottom-end",
                    icon: response.messageType === 'success' ? "success" : "error",
                    title: response.message,
                    showConfirmButton: false,
                    timer: response.messageType === 'success' ? 4000 : 2500
                });
            }
        });
    });

    fetchTaxis();
    function fetchTaxis(){
        var checkUserUrl = '{{ route("driver.fetchtaxis") }}';
        var csrfToken = '{{ csrf_token() }}';

        $.ajax({
            url: checkUserUrl,
            type: 'GET',
            //dataType: 'json',
            data: { action: 'checkuser', _token: csrfToken },
            success: function(data) {
                //console.log(data);
                //if (data.pending_booking) {
                    $('#taxis').html(data);
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


});
</script>

@endpush
