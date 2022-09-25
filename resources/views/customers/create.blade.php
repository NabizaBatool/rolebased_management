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
                            <h3 class="card-title">Add Customer</h3>
                        </div>
                        <div class="card-body">
                            {{ Form::open(array('id'=>'customerForm',  'enctype' => 'multipart/form-data')) }}
                            @csrf
                            <ul class="alert alert-warning d-none" id="save_errorlist"></ul>
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'awesome'])}}
                                {{Form::text('name','', ['class' => 'form-control', 'id'=>'name'  ,'placeholder' => 'Enter name'])}}
                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                {{Form::select('status',['0','1'] , ['id'=>'status'] )}}
                                {{ Form::label('Active')}}
                            </div>
                            <div class="form-group">
                                {{Form::file('profile' , ['id'=>'profile'])}}
                                <span class="text-danger">@error('profile'){{ $message }} @enderror</span>
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('submit', '#customerForm', function(e) {
            e.preventDefault();
            let formData = new FormData($('#customerForm')[0]);
            $.ajax({
                type: "POST",
                url: '/formsubmit',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#save_errorlist').html('');
                        $('#save_errorlist').removeClass('d-none')
                        $.each(response.errors, function(key, err_value) {
                            $('#save_errorlist').append('<li>'+err_value+'</li>');

                        });
                    }
                    else if(response.status == 200){
                        $('#save_errorlist').html('');
                        $('#save_errorlist').addClass('d-none');
                        window.location.href = "/users";
                        alert(response.message);

                        
                    }

                }
            });
        });

    });
</script>
@endsection