@extends('dashboard')
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form >
                                @csrf
                            
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="status" name="status">
                                    <label for="status">Active</label>
                                </div>
                                <div class="form-group">
                                    <label for="profile">Profile</label>
                                    <input type="file" id="profile" name="profile">
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $('#submit').click(function() {
        $.ajax({
            url: 'formsubmit',
            type: 'post',
            data: $('form').serialize(),
            success: function(result) {
                alert(result);

            }
        });
    });
</script>
@endsection