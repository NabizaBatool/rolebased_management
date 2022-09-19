<!-- /.row -->
@extends('dashboard')
@section('additional')
<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title ">Users Record</h3>
                        <div class="card-tools float-right ">  
                        <a href="" class="btn bg-primary"> <i class="ion-edit"></i>
                            </a>      
                            <a href="{{ url('adduser')}}" class="btn bg-primary mr-2"> <i class="ion-android-person-add"></i>
                            </a> 
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                    <table class="table table-hover text-nowrap table-primary">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>DOB</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                    <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
</div>

@endsection