@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <div class="raw">
        <div class="well">
            {{Form::open(['route'=>'/updateData','method'=>'POST','name'=>'edit','class'=>'form-horizontal'])}}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{$data->name}}">
                    <input type="hidden" value="{{$data->id}}" class="form-control" name="id">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success btn-block">Update Data</button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
<script>
    document.forms['edit'].elements['name'].value = {{$data -> name}}

</script>

@endsection
