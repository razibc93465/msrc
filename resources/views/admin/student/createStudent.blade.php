@extends('admin.master')

@section('mainContent')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Student</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{Session::get('message')}} </h3>
            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'student/save','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Select Department</label>
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Student's Roll</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="sExamRoll">
                        <span class="text-danger">{{$errors->has('sExamRoll') ? $errors->first('sExamRoll') : ''}}</span>
                    </div>
                </div>                                          
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student's Reg No</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sRegNo">
                        <span class="text-danger">{{$errors->has('sRegNo') ? $errors->first('sRegNo') : ''}}</span>
                    </div>
                </div>                                          
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student's Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sName">
                        <span class="text-danger">{{$errors->has('sName') ? $errors->first('sName') : ''}}</span>
                    </div>
                </div>                                          
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Student's Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control textarea" name="sAddress" rows="8"></textarea>
                        <span class="text-danger">{{$errors->has('sAddress') ? $errors->first('sAddress') : ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student's Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="sImage" accept="image/*">
                        <span class="text-danger">{{$errors->has('sImage') ? $errors->first('sImage') : ''}}</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Student's Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="sEmail">
                        <span class="text-danger">{{$errors->has('sEmail') ? $errors->first('sEmail') : ''}}</span>
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Student Information</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>
<script src="{{asset('public/admin/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: '.textarea'});</script>

@endsection