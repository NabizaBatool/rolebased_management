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
                            {{ Form::open(array('url' => 'api/storeoutlets' , 'method' => 'POST')) }}
                            @csrf
                            <div class="form-group">
                            {{Form::label('Branch')}}
                            {{Form::text('branch', '', ['class' => 'form-control'  ,'placeholder' => 'Enter branch'])}}
                            </div>
                            <div class="form-group">
                            {{ Form::label('Store')}}
                            {{Form::select('store_id',$select,['id'=>'store'] )}}
                            </div>
                            <div class="form-group">
                            {{ Form::label('Status')}}
                            {{Form::select('status',['Inactive','Active'] ,['id'=>'status'] )}}
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