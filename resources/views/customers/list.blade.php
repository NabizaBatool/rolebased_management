@extends('dashboard')
@section('section')
<div class="content-wrapper">
    @include('layout.alerts')
    <div class="container">
        <div class="card-header bg-warning mb-3">
            <h1 class="card-title ">Customers Record</h1>
            <div class="card-tools float-right ">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajaxModal"><i class="ion-android-person-add"></i>
                </button>
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
    <!-- Create and Edit Modal Start -->

    @include('customers.create')

    <!-- Modal ends here -->
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
                ajax: "{{ route('customers.index') }}",
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

            //create  and update customer
            $(document).on('submit', '#customerForm', function(e) {
                e.preventDefault();
                let formData = new FormData($('#customerForm')[0]);
                var id = $('#customer_id').val()
                if (id == "") {
                    url = '/customers/create';    
                } else {
                    url = 'customers' + '/' + id;    
                }
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $('#save_errorlist').html('');
                            $('#save_errorlist').removeClass('d-none')
                            $.each(response.errors, function(key, err_value) {
                                $('#save_errorlist').append('<li>' + err_value + '</li>');
                            });
                        } else if (response.status == 200) {
                            $('#save_errorlist').html('');
                            $('#save_errorlist').addClass('d-none');
                            window.location.href = "/customers";
                            alert(response.message);
                        }
                    }
                })

            });

            // edit customer
            $(document).on('click', '.editCustomer', function() {
                var customer_id = $(this).data("id");
                $('#modelHeading').html("Edit Customer");
                $("#ajaxModal").modal("show");
                $.ajax({
                    type: "GET",
                    url: '/customers/' + customer_id + '/edit',
                    success: function(data) {
                        $('#customer_id').val(data.id);
                        $('#name').val(data.name);
                        $('#status').val(data.status);
                        $('#profile').val(data.profile);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

            // delete customer
            $(document).on('click', '.deleteCustomer', function() {

                var customer_id = $(this).data("id");
                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: 'customers' + '/' + customer_id,
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });

                }
            });

            //reset form 
            $(document).on('click', '.close', function() {
                document.getElementById("customerForm").reset()
                
            });
        })
    </script>

    @endsection