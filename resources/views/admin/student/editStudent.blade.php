@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <hr/>
    <div class="row">
        <div class="col-lg-12">

            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'student/update','method'=>'POST','class'=>'form-horizontal','name'=>'editStudentForm','enctype'=>'multipart/form-data'])!!}
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Student Roll</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$studentById->sExamRoll}}" class="form-control" name="sExamRoll">
                        <input type="hidden" value="{{$studentById->id}}" class="form-control" name="id">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student Reg No</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$studentById->sRegNo}}" class="form-control" name="sRegNo">
                        <input type="hidden" value="{{$studentById->id}}" class="form-control" name="id">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student Name</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$studentById->sName}}" class="form-control" name="sName">
                        <input type="hidden" value="{{$studentById->id}}" class="form-control" name="id">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Student Address </label>
                    <div class="col-sm-10">
                        <textarea class="form-control textarea" name="sAddress" rows="8">{{$studentById->sAddress}}</textarea>
                        <span class="text-danger">{{$errors->has('sAddress') ? $errors->first('sAddress') : ''}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="sImage" accept="image/*">
                        <img src="{{asset($studentById->sImage)}}" alt="" height="150" width="150">
                        <span class="text-danger">{{$errors->has('sImage') ? $errors->first('sImage') : ''}}</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student Email</label>
                    <div class="col-sm-10">
                        <input type="email" value="{{$studentById->sEmail}}" class="form-control" name="sEmail">
                        <input type="hidden" value="{{$studentById->id}}" class="form-control" name="id">
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Student Info</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>
<script>
    document.forms['editStudentForm'].elements['publicationStatus'].value = {{$studentById -> publicationStatus}}
    document.forms['editStudentForm'].elements['deptId'].value = {{$studentById -> deptId}}
</script>

<script src="{{asset('public/admin/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: '.textarea'});</script>


@endsection