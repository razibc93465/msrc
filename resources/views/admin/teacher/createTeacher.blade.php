@extends('admin.master')

@section('mainContent')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Teacher</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{Session::get('message')}} </h3>
            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'teacher/save','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher's Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tName">
                        <span class="text-danger">{{$errors->has('tName') ? $errors->first('tName') : ''}}</span>
                    </div>
                </div>                                          
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Teacher's Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control textarea" name="tAddress" rows="8"></textarea>
                        <span class="text-danger">{{$errors->has('tAddress') ? $errors->first('tAddress') : ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher's Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="tImage" accept="image/*">
                        <span class="text-danger">{{$errors->has('tImage') ? $errors->first('tImage') : ''}}</span>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher's Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="tEmail">
                        <span class="text-danger">{{$errors->has('tEmail') ? $errors->first('tEmail') : ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Teacher's Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="tPassword">
                        <span class="text-danger">{{$errors->has('tPassword') ? $errors->first('tPassword') : ''}}</span>
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Teacher Information</button>
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