 @extends('dashboard')
 <!-- Main content -->
 @section('additional')
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
                         <form action="{{ route('user.addUser') }}" method="post"  enctype="multipart/form-data">
                             @csrf
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="name">Name</label>
                                     <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                 </div>
                                 <div class="form-group">
                                     <label for="Email">Email address</label>
                                     <input type="email" name="email" class="form-control" id="Email" placeholder="Enter email">
                                 </div>
                                 <div class="form-group">
                                     <label for="Password">Password</label>
                                     <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                                 </div>
                                 <div class="form-group">
                                     <label for="dob">Date Of Birth</label>
                                     <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
                                 </div>
                                 <div class="form-group mb-3">
                                    <input type="file" name="profile_pic" class="form-control">
                                 </div>
                                 <div class="form-check">
                                     <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1">
                                     <label class="form-check-label" for="exampleCheck1">Active</label>
                                 </div>

                             </div>

                             <div class="card-footer">
                                 <button type="submit" class="btn btn-primary">Submit</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>

 @endsection