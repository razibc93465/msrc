@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <hr/>
    <div class="row">
        <div class="col-lg-12">

            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'notification/update','method'=>'POST','class'=>'form-horizontal','name'=>'editNotificationForm','enctype'=>'multipart/form-data'])!!}
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Notification Title</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$notificationById->notificationTitle}}" class="form-control" name="notificationTitle">
                        <input type="hidden" value="{{$notificationById->id}}" class="form-control" name="id">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Notification Description </label>
                    <div class="col-sm-10">
                        <textarea class="form-control textarea" name="notificationDescription" rows="8">{{$notificationById->notificationDescription}}</textarea>
                        <span class="text-danger">{{$errors->has('notificationDescription') ? $errors->first('notificationDescription') : ''}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Notification Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="nImage" accept="image/*">
                        <img src="{{asset($notificationById->nImage)}}" alt="" height="150" width="150">
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Notification Info</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>
<script>
    document.forms['editNotificationForm'].elements['publicationStatus'].value = {{$notificationById -> publicationStatus}}
    document.forms['editNotificationForm'].elements['deptId'].value = {{$notificationById -> deptId}}
</script>

<script src="{{asset('public/admin/')}}/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector: '.textarea'});</script>


@endsection