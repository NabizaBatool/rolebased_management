 @extends('layout.main')
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
                             <h3 class="card-title">Add User</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->
                         <div class="card-body">
                             {{ Form::open(array('url' => '/adduser' , 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
                             <div class="form-group">
                                 {{Form::label('Name')}}
                                 {{Form::text('name', '', ['class' => 'form-control'  ,'placeholder' => 'Enter name'])}}
                                 <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                             </div>
                             <div class="form-group">
                                 {{ Form::label('E-Mail')}}
                                 {{Form::email('email', '', ['class' => 'form-control','placeholder' => 'Enter email'])}}
                                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                             </div>
                             <div class="form-group">
                                 {{ Form::label('Password')}}
                                 {{Form::password('password', ['class' => 'form-control'   , 'placeholder' => 'Password...' ])}}
                                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                             </div>
                             <div class="form-group">
                                 {{ Form::label('Date Of Birth')}}
                                 {{Form::date('dob', '', ['class' => 'form-control'  , 'placeholder' => 'Date of Birth' ])}}
                                 <span class="text-danger">@error('dob'){{ $message }} @enderror</span>
                             </div>
                             <div class="form-group">
                                 {{Form::file('profile_pic')}}
                                 <span class="text-danger">@error('profile_pic'){{ $message }} @enderror</span>
                             </div>
                             <div class="form-group">
                                 {{Form::checkbox('status')}}
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