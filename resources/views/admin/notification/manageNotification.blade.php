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
                <th>Notification Title</th>
                <th>Notification Description</th>
                <th>Notification Image</th>                
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
            <tr>
                <th scope="row">{{$notification->id}}</th>
                <td>{{$notification->deptName}}</td>
                <td>{{$notification->notificationTitle}}</td>
                <td>{{$notification->notificationDescription}}</td>                               
                <th><img src="{{asset($notification->nImage) }}" alt="{{$notification->id}}" height="100" width="100"></th>               
                <td>{{$notification->publicationStatus == 1 ? 'Published' : 'Unpublished'}}</td>
                <td>
                    <a href="{{url('/notification/edit/'.$notification->id)}}" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="{{url('/notification/delete/'.$notification->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this');">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection