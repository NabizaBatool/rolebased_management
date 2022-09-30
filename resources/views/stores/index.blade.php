@extends('layout.main')
@section('section')
<div class="content-wrapper">
    @include('layout.alerts')
    <div class="container-fluid">

        <div class="row">
            <div class="card">
                <div class="card-header bg-warning">
                    <h1 class="card-title ">Stores</h1>
                    <div class="card-tools float-right ">
                        <a href="{{ url('api/stores/create')}}" class="btn bg-primary mr-2 float-right "><i class="ion-android-playstore"></i></a>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->

                <table class="table table-hover table-primary">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th width="300px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($store as $stores)
                        <tr>
                            <td>{{$stores->name}}</td>
                            <td>{{$stores->status }}</td>
                            <td>
                            {{ Form::open(array('url' => 'api/stores/'.$stores->slug , 'method' => 'DELETE', 'enctype' => 'multipart/form-data')) }}
                                @csrf
                                    {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}    
                                    <a href="{{ url('api/stores/'.$stores->slug. '/edit') }}" class="btn bg-primary btn-sm "> <i class="ion-edit"></i></a>  
                                    {{ Form::close() }}
                            </td>

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