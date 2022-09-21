@if(Session::get('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('success') }}
</div>
@endif
@if(Session::get('fail'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('fail') }}
</div>
@endif