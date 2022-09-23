@extends('dashboard')
@section('section')
<div class="content-wrapper">
    @include('layout.alerts')
    <div class="container">
        <h4>Customers</h4>
        <a href="{{ url('/addcustomer')}}" class="btn bg-primary mr-2"> <i class="ion-android-person-add"></i></a>
        <table class="table table-bordered data-table">
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
        $(function() {
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
                        data: $cust.name,
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
        });
    </script>
    @endsection