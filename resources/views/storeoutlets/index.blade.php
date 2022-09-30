@extends('layout.main')
@section('section')
<div class="content-wrapper">
    @include('layout.alerts')
    <div class="container-fluid">

        <div class="row">
            <div class="card">
                <div class="card-header bg-warning">
                    <h1 class="card-title ">Store Outlet</h1>
                    <div class="card-tools float-right ">
                        <a href="{{ url('api/storeoutlets/create')}}" class="btn bg-primary mr-2 float-right "><i class="ion-android-add"></i></a>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->

                <table class="table table-hover table-primary">
                    <thead>
                        <tr>
                            <th>Branch</th>
                            <th>Status</th>
                            <th>Store</th>
                            <th width="300px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($storeoutlet as $storeoutlets)
                        <tr>
                            <td>{{$storeoutlets->branch}}</td>
                            <td>{{$storeoutlets->status }}</td>
                            <td>{{$storeoutlets->store_id}}</td>
                            <td>
                            {{ Form::open(array('url' => 'api/storeoutlets/'.$storeoutlets->id , 'method' => 'DELETE')) }}
                                @csrf
                                    {{Form::submit('Delete', ['class'=>'btn btn-danger btn-sm'])}}    
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