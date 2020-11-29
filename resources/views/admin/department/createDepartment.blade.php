@extends('admin.master')

@section('mainContent')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Department</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{Session::get('message')}} </h3>
            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'department/save','method'=>'POST','class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Department Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="deptName">
                        <span class="text-danger">{{$errors->has('deptName') ? $errors->first('deptName') : ''}}</span>
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Save Department Information</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>

@endsection