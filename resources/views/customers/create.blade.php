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
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'awesome'])}}
                                {{Form::text('name', '', ['class' => 'form-control'  ,'placeholder' => 'Enter name'])}}
                                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                {{Form::select('status',['0','1'])}}
                                {{ Form::label('Active')}}
                            </div>
                            <div class="form-group">
                                {{Form::file('profile')}}
                                <span class="text-danger">@error('profile'){{ $message }} @enderror</span>
                            </div>
                            <button id="submit" type="button"  class="btn btn-primary">Submit</button>
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
    $('#submit').click(function (e) {
        e.preventDefault();
     
        $.ajax({
            url: "{{url('/formsubmit')}}",
            // crossDomain: FALSE,
            type: "POST",
            data: $('#customerForm').serialize(),
            success: function(response) {

                window.location.href = "/path/to/thankyoupage"
            }

     })
    })
    // function saveForm() {
      
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

        // $('#submit').html('Please Wait...');
        // $("#submit").attr("disabled", true);

        // $.ajax({
        //     url: "{{url('/formsubmit')}}",
        //     // crossDomain: FALSE,
        //     type: "POST",
        //     data: $('#customerForm').serialize(),
        //     success: function(response) {
        //         $('#submit').html('Submit');
        //         $("#submit").attr("disabled", false);
                //document.getElementById("#customerForm").reset();


    //             // window.location.href = "/path/to/thankyoupage";
    //         }
    //     });
    // }
</script>
@endsection
