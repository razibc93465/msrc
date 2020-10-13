@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <hr/>
    <div class="row">
        <div class="col-lg-12">

            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'teacher/update','method'=>'POST','class'=>'form-horizontal','name'=>'editTeacherForm','enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Department Name </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="deptId">
                            <option>Select Department Name</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->deptName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher Name</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$teacherById->tName}}" class="form-control" name="tName">
                        <input type="hidden" value="{{$teacherById->id}}" class="form-control" name="id">
                    </div>
                </div> 
                 <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Teacher Address </label>
                <div class="col-sm-10">
                    <textarea class="form-control textarea" name="tAddress" rows="8">{{$teacherById->tAddress}}</textarea>
                    <span class="text-danger">{{$errors->has('tAddress') ? $errors->first('tAddress') : ''}}</span>
                </div>
            </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="tImage" accept="image/*">
                        <img src="{{asset($teacherById->tImage)}}" alt="" height="150" width="150">
                        <span class="text-danger">{{$errors->has('tImage') ? $errors->first('tImage') : ''}}</span>
                    </div>
                </div> 
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher Email</label>
                    <div class="col-sm-10">
                        <input type="email" value="{{$teacherById->tEmail}}" class="form-control" name="tEmail">
                        <input type="hidden" value="{{$teacherById->id}}" class="form-control" name="id">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher Password</label>
                    <div class="col-sm-10">
                        <input type="password" value="{{$teacherById->tPassword}}" class="form-control" name="tPassword">
                        <input type="hidden" value="{{$teacherById->id}}" class="form-control" name="id">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Publication Status </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="publicationStatus">
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Teacher Info</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>
<script>
    document.forms['editTeacherForm'].elements['publicationStatus'].value = {{$teacherById -> publicationStatus}}
    document.forms['editTeacherForm'].elements['deptId'].value = {{$teacherById -> deptId}}
</script>

<script src="{{asset('public/admin/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: '.textarea'});</script>


@endsection