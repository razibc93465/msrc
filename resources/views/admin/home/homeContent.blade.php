@extends('admin.master')

@section('title')
Home
@endsection

@section('mainContent')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        @foreach($notifications as $notification)
        <div class="col-lg-3 col-md-6">
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-1">
                            <i class="fa fa-comments fa-2x"></i>
                        </div>
                        <div class="col-xs-1 text-right">
                            <div class="huge">{{$notification->notificationTitle}}</div>
                            <div> {{$notification->deptName}}</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/notification/edit/'.$notification->id)}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
             
        </div>
        @endforeach


    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">

            <!-- /.panel -->

            <!-- /.panel -->
           
            
            <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>                              
                <th>Notification Title</th>
                <th>Notification Description</th>
                <th>Notification Image</th>                
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($notifications as $notification)
            <tr>
                <th scope="row">{{$notification->id}}</th>
                <td>{{$notification->deptName}}</td>
                <td>{{$notification->notificationTitle}}</td>
                <td>{{$notification->notificationDescription}}</td>                               
                <th><img src="{{asset($notification->nImage) }}" alt="{{$notification->id}}" height="400" width="400"></th>               
               
               
            </tr>
            @endforeach
        </tbody>
    </table>
            
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->

        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>

@endsection
