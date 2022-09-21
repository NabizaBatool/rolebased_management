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
                             <h3 class="card-title">Add User</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->
                         <div class="card-body">
                             {{ Form::open(array('url' => '/adduser' , 'method' => 'POST', 'enctype' => 'multipart/form-data')) }}
                             <div class="form-group">
                                 {{Form::label('Name')}}
                                 {{Form::text('name', '', ['class' => 'form-control', 'required' => 'required'  , 'id' => 'name' ,'placeholder' => 'Enter name'])}}
                             </div>
                             <div class="form-group">
                                 {{ Form::label('E-Mail')}}
                                 {{Form::email('email', '', ['class' => 'form-control', 'required' => 'required' , 'id' => 'email' ,'placeholder' => 'Enter email'])}}
                             </div>
                             <div class="form-group">
                                 {{ Form::label('Password')}}
                                 {{Form::password('password', ['class' => 'form-control'  , 'required' => 'required' , 'placeholder' => 'Password...' ])}}
                             </div>
                             <div class="form-group">
                                 {{ Form::label('Date Of Birth')}}
                                 {{Form::date('dob', '', ['class' => 'form-control'  , 'required' => 'required' , 'placeholder' => 'Date of Birth' ])}}
                             </div>
                             <div class="form-group">
                                 {{Form::file('profile_pic')}}
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