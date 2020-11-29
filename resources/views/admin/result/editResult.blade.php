@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <hr/>
    <div class="row">
        <div class="col-lg-12">

            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'result/update','method'=>'POST','class'=>'form-horizontal','name'=>'editResultForm','enctype'=>'multipart/form-data'])!!}
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
                    <label for="inputpassword3" class="col-sm-2 control-label">Select Semester</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="semId">
                            <option>Select Semester Name</option>
                            @foreach($semesters as $semester)
                            <option value="{{$semester->id}}">{{$semester->semTitle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Select Student</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="studentId">
                            <option>Select Department Name</option>
                            @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->sExamRoll}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Select Course</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="courseId">
                            <option>Select Department Name</option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->courseTitle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Attendance Marks</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$resultById->attendance}}" class="form-control" name="attendance">
                        <input type="hidden" value="{{$resultById->id}}" class="form-control" name="id">
                    </div>
                </div>                                                                                                                                            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tutorial Marks</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$resultById->tutorial}}" class="form-control" name="tutorial">
                        <input type="hidden" value="{{$resultById->id}}" class="form-control" name="id">
                    </div>
                </div>                                                                                                                                            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Midterm Marks</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$resultById->midterm}}" class="form-control" name="midterm">
                        <input type="hidden" value="{{$resultById->id}}" class="form-control" name="id">
                    </div>
                </div>                                                                                                                                            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Final Marks</label>
                    <div class="col-sm-10">
                        <input type="number" value="{{$resultById->final}}" class="form-control" name="final">
                        <input type="hidden" value="{{$resultById->id}}" class="form-control" name="id">
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Result Info</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>
<script>
    document.forms['editResultForm'].elements['publicationStatus'].value = {{$resultById -> publicationStatus}}
    document.forms['editResultForm'].elements['deptId'].value = {{$resultById -> deptId}}
    document.forms['editResultForm'].elements['semId'].value = {{$resultById -> semId}}
    document.forms['editResultForm'].elements['studentId'].value = {{$resultById -> studentId}}
    document.forms['editResultForm'].elements['courseId'].value = {{$resultById -> courseId}}
</script>



@endsection