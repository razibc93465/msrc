@extends('admin.master')

@section('mainContent')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Notification</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{Session::get('message')}} </h3>
            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'notification/save','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Notification Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="notificationTitle">
                        <span class="text-danger">{{$errors->has('notificationTitle') ? $errors->first('notificationTitle') : ''}}</span>
                    </div>
                </div>                                          
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Notification Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control textarea" name="notificationDescription" rows="8"></textarea>
                        <span class="text-danger">{{$errors->has('notificationDescription') ? $errors->first('notificationDescription') : ''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Notification Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="nImage" accept="image/*">
                        <span class="text-danger">{{$errors->has('nImage') ? $errors->first('nImage') : ''}}</span>
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Notification Information</button>
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