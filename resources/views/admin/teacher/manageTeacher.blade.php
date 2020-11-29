@extends('admin.master')

@section('mainContent')
<div id="page-wrapper">
    <hr/>
    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
    <hr/>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dept.ID</th>
                <th>Department Name</th>
                <th>Teacher's Name</th>
                <th>Teacher's address</th>
                <th>Teacher's Image</th>
                <th>Teacher's email</th>
                <th>Teacher's Password</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <th scope="row">{{$teacher->id}}</th>
                <td>{{$teacher->deptId}}</td>
                <td>{{$teacher->deptName}}</td>
                <td>{{$teacher->tName}}</td>
                <td>{{$teacher->tAddress}}</td>
<!--                <td>{{$teacher->tImage}}</td>-->
                
               
            <th><img src="{{asset($teacher->tImage) }}" alt="{{$teacher->id}}" height="100" width="100"></th>
            
                
                
                <td>{{$teacher->tEmail}}</td>
                <td>{{$teacher->tPassword}}</td>
                <td>{{$teacher->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{url('/teacher/edit/'.$teacher->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="{{url('/teacher/delete/'.$teacher->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection