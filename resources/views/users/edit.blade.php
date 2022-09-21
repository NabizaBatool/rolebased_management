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
                                 {{Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required'  , 'id' => 'name' ,'placeholder' => 'Enter name'])}}
                             </div>
                             <div class="form-group">
                                 {{ Form::label('E-Mail')}}
                                 {{Form::email('email',  $user->email, ['class' => 'form-control', 'required' => 'required' , 'id' => 'email' ,'placeholder' => 'Enter email'])}}
                             </div>
                             <div class="form-group">
                                 {{ Form::label('Date Of Birth')}}
                                 {{Form::date('dob', $user->dob, ['class' => 'form-control'  , 'required' => 'required' , 'placeholder' => 'Date of Birth' ])}}
                             </div>
                            
                                <div class="form-group mb-3">
                                    <input type="file" name="profile_pic" class="form-control">
                                    <img src="{{ asset('img/users/'.$user->profile_pic) }}" style="height: 80px; width: 80px;">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" value="on" {{ $user->status=='on' ? 'checked':'' }} name="status" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection