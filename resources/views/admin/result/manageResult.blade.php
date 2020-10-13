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
                <th>Roll</th>
                <th>Name</th>
                <th>Department</th>
                <th>Semester</th>                
                <th>Subject</th>
                <th>Attendance</th>
                <th>Tutorial</th>
                <th>Midterm</th>
                <th>Final</th>
                <th>Total</th>
                <th>Grade</th>              
                <th>Status</th>              
                <th>Action</th>              
            </tr>
        </thead>
        <tbody>          
            @foreach($results as $result)
            <tr>               
                <th scope="row">{{$result->id}}</th>
                <td>{{$result->sExamRoll}}</td>
                <td>{{$result->sName}}</td>
                <td>{{$result->deptName}}</td>
                <td>{{$result->semTitle}}</td>               
                <td>{{$result->courseTitle}}</td>
                <td>{{$result->attendance}}</td>              
                <td>{{$result->tutorial}}</td>
                <td>{{$result->midterm}}</td>
                <td>{{$result->final}}</td>                
                <td>{{$total=$result->attendance+$result->tutorial+$result->midterm+$result->final}}</td>
                <td>
                    @if($total > 79)
                        {{'A+'}}  
                    @elseif($total > 74)
                        {{'A'}}  
                    @elseif($total > 69)
                        {{'A-'}}  
                    @elseif($total > 64)
                        {{'B+'}}  
                    @elseif($total > 59)
                        {{'B'}}  
                    @elseif($total > 54)
                        {{'B-'}}  
                    @elseif($total > 49)
                        {{'C+'}}  
                    @elseif($total > 44)
                        {{'C'}}  
                    @elseif($total > 39)
                        {{'D'}}  
                    @else
                        {{'F'}}
                    @endif
                </td>               
                <td>{{$result->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{url('/result/edit/'.$result->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="{{url('/result/delete/'.$result->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>               
            </tr>
            @endforeach
        </tbody>
    </table>
    
    
</div>



@endsection