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
                            <h3 class="card-title">Edit Store</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            {{ Form::open(array('url' => 'api/stores/'.$store->slug , 'method' => 'post')) }}
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                {{Form::label('Name')}}
                                {{Form::text('name', $store->name, ['class' => 'form-control','placeholder' => 'Enter name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::select('status',['Inactive','Active'] , $store->status , ['id'=>'status'] )}}
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