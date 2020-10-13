@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
<hr/>
<div class="row">
    <div class="col-lg-12">
       
        <hr/>
        <div class="well">
            
           {!! Form::open(['url'=>'department/update','method'=>'POST','class'=>'form-horizontal','name'=>'editDepartmentForm'])!!}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Department Name</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{$departmentById->deptName}}" class="form-control" name="deptName">
                        <input type="hidden" value="{{$departmentById->id}}" class="form-control" name="id">
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
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Department Info</button>
                    </div>
                </div>
               
         {!! Form::close()!!}
                
        </div>
    </div>
    
</div>
</div>
<script>
document.forms['editDepartmentForm'].elements['publicationStatus'].value={{$departmentById->publicationStatus}}
</script>

@endsection