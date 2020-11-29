@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <hr/>
    <div class="row">
        <div class="col-lg-12">

            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'course/update','method'=>'POST','class'=>'form-horizontal','name'=>'editCourseForm','enctype'=>'multipart/form-data'])!!}
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
                    <label for="inputpassword3" class="col-sm-2 control-label">Teacher Name </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tId">
                            <option>Select Department Name</option>
                            @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->tName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Semester Title </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="semId">
                            <option>Select Department Name</option>
                            @foreach($semesters as $semester)
                            <option value="{{$semester->id}}">{{$semester->semTitle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Code</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$courseById->courseCode}}" class="form-control" name="courseCode">
                        <input type="hidden" value="{{$courseById->id}}" class="form-control" name="id">
                    </div>
                </div>               
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Title</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$courseById->courseTitle}}" class="form-control" name="courseTitle">
                        <input type="hidden" value="{{$courseById->id}}" class="form-control" name="id">
                    </div>
                </div>               
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Credit</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$courseById->courseCredit}}" class="form-control" name="courseCredit">
                        <input type="hidden" value="{{$courseById->id}}" class="form-control" name="id">
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Course Info</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>
<script>
    document.forms['editCourseForm'].elements['publicationStatus'].value = {{$courseById -> publicationStatus}}
    document.forms['editCourseForm'].elements['deptId'].value = {{$courseById -> deptId}}
    document.forms['editCourseForm'].elements['tId'].value = {{$courseById -> tId}}
    document.forms['editCourseForm'].elements['semId'].value = {{$courseById -> semId}}
</script>



@endsection