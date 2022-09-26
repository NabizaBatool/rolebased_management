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

    <div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Add customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('id'=>'customerForm', 'name'=>'customerForm', 'enctype' => 'multipart/form-data')) }}
                    @csrf
                    <ul class="alert alert-warning d-none" id="save_errorlist"></ul>
                    <input type="hidden" name="customer_id" id="customer_id">
                    <div class="form-group">
                        {{Form::label('name', 'Name', ['class' => 'awesome'])}}
                        {{Form::text('name','', ['class' => 'form-control', 'id'=>'name'  ,'placeholder' => 'Enter name'])}}
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        {{Form::select('status',['0','1'] ,  ['id'=>'status'] )}}
                        {{ Form::label('Active')}}
                    </div>
                    <div class="form-group">

                        {{Form::file('profile' , ['id'=>'profile'])}}
                        <span class="text-danger">@error('profile'){{ $message }} @enderror</span>
                    </div>


                    <div class="modal-footer">
                        <button type="button" id="close" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                        <button type="submit" name="saveBtn" id="submit" class="btn btn-primary">Save</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>

    </div>



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

            //create customer
            $(document).on('submit', '#customerForm', function(e) {
                e.preventDefault();
                let formData = new FormData($('#customerForm')[0]);
                var id = $('#customer_id').val()
                if (id == "") {
                    $.ajax({
                        type: "POST",
                        url: '/formsubmit',
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
                } else {
                    $.ajax({
                        type: "POST",
                        url: 'update' + '/' + id,
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
                    });

                }



            });

            // delete customer
            $(document).on('click', '.deleteCustomer', function() {

                var customer_id = $(this).data("id");
                if (confirm("Are You sure want to delete !")) {
                    $.ajax({
                        type: "DELETE",
                        url: 'deletecustomer' + '/' + customer_id,
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });

                }
            });

            // edit customer
            $(document).on('click', '.editCustomer', function() {
                var customer_id = $(this).data("id");
                $('#modelHeading').html("Edit Customer");
                $("#ajaxModal").modal("show");

                $.ajax({
                    type: "GET",
                    url: "{{ url('editcustomer') }}" + '/' + customer_id,
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
            //reset form 
            $(document).on('click', '.close', function() {
                document.getElementById("customerForm").reset()
            });
        })
    </script>

    @endsection