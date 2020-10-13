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
<!--                <th>Dept.ID</th>-->
                <th>Department Name</th>
                <th>Student's Roll</th>
                <th>Student's Reg No</th>
                <th>Student's Name</th>
                <th>Student's Add.</th>
                <th>Student's Image</th>
                <th>Student's Email</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
<!--                <td>{{$student->deptId}}</td>-->
                <td>{{$student->deptName}}</td>
                <td>{{$student->sExamRoll}}</td>
                <td>{{$student->sRegNo}}</td>
                <td>{{$student->sName}}</td>
                <td>{{$student->sAddress}}</td>
                <th><img src="{{asset($student->sImage) }}" alt="{{$student->id}}" height="100" width="100"></th>
                <td>{{$student->sEmail}}</td>
                <td>{{$student->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{url('/student/edit/'.$student->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="{{url('/student/delete/'.$student->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection