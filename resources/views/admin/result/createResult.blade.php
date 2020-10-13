@extends('admin.master')

@section('mainContent')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Result</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{Session::get('message')}} </h3>
            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'result/save','method'=>'POST','class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Select Department</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="deptId">
<!--                            <option>Select Department Name</option>-->
                            @foreach($publishedDepartmentCourse as $department)
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
                            <option>Select Student Roll</option>
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
                            <option>Select Course</option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->courseTitle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Attendance Marks</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="attendance">
                        <span class="text-danger">{{$errors->has('attendance') ? $errors->first('attendance') : ''}}</span>
                    </div>
                </div>                                                                                                                                            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tutorial Marks</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="tutorial">
                        <span class="text-danger">{{$errors->has('tutorial') ? $errors->first('tutorial') : ''}}</span>
                    </div>
                </div>                                                                                                                                            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Midterm Marks</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="midterm">
                        <span class="text-danger">{{$errors->has('midterm') ? $errors->first('midterm') : ''}}</span>
                    </div>
                </div>                                                                                                                                            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Final Marks</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="final">
                        <span class="text-danger">{{$errors->has('final') ? $errors->first('final') : ''}}</span>
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Result Information</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>


@endsection