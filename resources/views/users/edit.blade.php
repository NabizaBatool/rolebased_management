@extends('dashboard')
<!-- Main content -->
@section('section')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            {{ Form::open(array('url' => 'updateuser/'.$user->id , 'method' => 'PUT', 'enctype' => 'multipart/form-data')) }}
                            <div class="form-group">
                                {{Form::label('Name')}}
                                {{Form::text('name', $user->name, ['class' => 'form-control','placeholder' => 'Enter name'])}}
                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                {{ Form::label('E-Mail')}}
                                {{Form::email('email', $user->email, ['class' => 'form-control' ,'placeholder' => 'Enter email'])}}
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                {{ Form::label('Date Of Birth')}}
                                {{Form::date('dob', $user->dob, ['class' => 'form-control'   , 'placeholder' => 'Date of Birth' ])}}
                                <span class="text-danger">@error('dob'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-group">
                                <img src="{{ asset('img/users/'.$user->profile_pic) }}" style="height: 80px; width: 80px;">
                                {{Form::file('profile_pic')}}
                                <span class="text-danger">@error('profile_pic'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                {{ Form::checkbox('status', 'Active', $user->status=='Active') }}
                                {{ Form::label('Active')}}
                            </div>
                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                            {{ Form::close() }}
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection