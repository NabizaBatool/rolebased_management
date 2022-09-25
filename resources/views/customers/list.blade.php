@extends('dashboard')
@section('section')
<div class="content-wrapper">
    @include('layout.alerts')
    <div class="container">
        <div class="card-header bg-warning mb-3">
            <h1 class="card-title ">Customers Record</h1>
            <div class="card-tools float-right ">
                <a href="{{ url('/addcustomer')}}" class="btn bg-primary mr-2"> <i class="ion-android-person-add"></i></a>
            </div>
        </div>

        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Profile</th>
                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    @endsection
    @section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('customers') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'profile',
                        name: 'profile'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
          
            $(document).on('click', '.deleteCustomer', function() {

                var customer_id = $(this).data("id");
                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('deletecustomer') }}" + '/' + customer_id,
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });

                }
            });

            // $(document).on('click', '.editCustomer', function() {
            //     var customer_id = $(this).data("id");
            //     // $.get("{{ url('editcustomer') }}" + '/' + customer_id, function(data) {
            //     $.ajax({
            //     type: "GET",
            //     url: "{{ url('editcustomer') }}" + '/' + customer_id,
            //     contentType: false,
            //     processData: false,

            //    });
            //  });

        });
    </script>

    @endsection