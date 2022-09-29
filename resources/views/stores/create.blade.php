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
                            <h3 class="card-title">Add Store</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            {{ Form::open(array('url' => 'api/stores/create' , 'method' => 'POST')) }}
                            <div class="form-group">
                                {{Form::label('Name')}}
                                {{Form::text('name', '', ['class' => 'form-control'  ,'placeholder' => 'Enter name'])}}
   
                            </div>
                            <div class="form-group">
                                {{Form::label('Slug')}}
                                {{Form::text('slug', '', ['class' => 'form-control'  ,'placeholder' => 'Enter slug'])}}
   
                            </div>
                            <div class="form-group">
                                {{Form::select('status',[null ,'Inactive','Active'] , ['id'=>'status'] )}}
                                {{ Form::label('Status')}}
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