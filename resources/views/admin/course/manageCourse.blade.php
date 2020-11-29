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
                <th>Department Name</th>
                <th>Teacher Name</th>
                <th>Semester Title</th>              
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Course Credit</th>              
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <th scope="row">{{$course->id}}</th>
                <td>{{$course->deptName}}</td>
                <td>{{$course->tName}}</td>
                <td>{{$course->semTitle}}</td>                             
                <td>{{$course->courseCode}}</td>                             
                <td>{{$course->courseTitle}}</td>                             
                <td>{{$course->courseCredit}}</td>                             
                <td>{{$course->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{url('/course/edit/'.$course->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="{{url('/course/delete/'.$course->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection