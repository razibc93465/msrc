@extends('admin.master')

@section('mainContent')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Course</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{Session::get('message')}} </h3>
            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'course/save','method'=>'POST','class'=>'form-horizontal'])!!}
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
                    <label for="inputpassword3" class="col-sm-2 control-label">Select Teacher</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="tId">
                            <option>Select Teacher Name</option>                                                                                
                            @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->tName}}</option>
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Code </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="courseCode">
                        <span class="text-danger">{{$errors->has('courseCode') ? $errors->first('courseCode') : ''}}</span>
                    </div>
                </div>                                                                                                                                     
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Title </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="courseTitle">
                        <span class="text-danger">{{$errors->has('courseTitle') ? $errors->first('courseTitle') : ''}}</span>
                    </div>
                </div>                                                                                                                                     
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Course Credit </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="courseCredit">
                        <span class="text-danger">{{$errors->has('courseCredit') ? $errors->first('courseCredit') : ''}}</span>
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Course Information</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>


@endsection