<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(array('id'=>'customerForm', 'name'=>'customerForm', 'enctype' => 'multipart/form-data')) }}
                @csrf
                <ul class="alert alert-warning d-none" id="save_errorlist"></ul>
                <input type="hidden" name="customer_id" id="customer_id">
                <div class="form-group">
                    {{Form::label('name', 'Name', ['class' => 'awesome'])}}
                    {{Form::text('name','', ['class' => 'form-control', 'id'=>'name'  ,'placeholder' => 'Enter name'])}}
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                    {{Form::select('status',['Inactive','Active'] , '' , ['id'=>'status'] )}}
                    {{ Form::label('Status')}}
                </div>
                <div class="form-group">
                    {{Form::file('profile', ['id'=>'profile'])}}
                    <span class="text-danger">@error('profile'){{ $message }} @enderror</span>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    <button type="submit" name="saveBtn" id="submit" class="saveBtn btn btn-primary"></button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

</div>