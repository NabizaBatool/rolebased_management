<!-- /.row -->
@extends('dashboard')
@section('section')
<div class="content-wrapper">
@include('layout.alerts')
    <div class="container-fluid">
   
        <div class="row">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title ">Users Record</h3>
                    <div class="card-tools float-right ">
                        <a href="{{ url('adduser')}}" class="btn bg-primary mr-2"> <i class="ion-android-person-add"></i>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->

                <table class="table table-hover table-primary">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <!-- <th>Password</th> -->
                            <th>DOB</th>
                            <th>Status</th>
                            <th>Profile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td>{{$users->name }}</td>
                            <td>{{$users->email }}</td>
                            <!-- <td>{{$users->password }}</td> -->
                            <td>{{$users->dob }}</td>
                            <td>{{$users->status }}</td>
                            <td><img src="{{ asset('img/users/'.$users->profile_pic) }}" style="height: 80px; width: 80px;"></td>
                            <td><a href="{{ url('edituser/'.$users->id) }}" class="btn bg-primary mr-1"> <i class="ion-edit"></i>
                                </a><a href="{{ url('deleteuser/'.$users->id) }}" class="btn bg-danger"> <i class="ion-android-delete"></i></a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- /.card-body -->

                <!-- /.card -->

            </div>
        </div>

    </div>
</div>

@endsection