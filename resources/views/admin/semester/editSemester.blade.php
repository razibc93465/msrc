@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <hr/>
    <div class="row">
        <div class="col-lg-12">

            <hr/>
            <div class="well">

                {!! Form::open(['url'=>'semester/update','method'=>'POST','class'=>'form-horizontal','name'=>'editSemesterForm','enctype'=>'multipart/form-data'])!!}
                
                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Semester Title</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$semesterById->semTitle}}" class="form-control" name="semTitle">
                        <input type="hidden" value="{{$semesterById->id}}" class="form-control" name="id">
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Semester Info</button>
                    </div>
                </div>

                {!! Form::close()!!}

            </div>
        </div>

    </div>
</div>
<script>
    document.forms['editSemesterForm'].elements['publicationStatus'].value = {{$semesterById -> publicationStatus}}
    
</script>



@endsection