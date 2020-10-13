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
                
                <th>Semester Title</th>              
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($semesters as $semester)
            <tr>
                <th scope="row">{{$semester->id}}</th>
               
                <td>{{$semester->semTitle}}</td>                             
                <td>{{$semester->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{url('/semester/edit/'.$semester->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="{{url('/semester/delete/'.$semester->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection