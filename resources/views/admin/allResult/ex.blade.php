@extends('admin.master')


@section('mainContent')
<div id="page-wrapper">
    <div class="raw">
        <hr>
        <hr>
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach($datam as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->image}}</td>
                    <td>
                        <a href="{{route('/Edit',[$data->id])}}">Edit</a>
{{--                        <a href="{{route('/edit')}}">Update</a>--}}
{{--                        <a href="{{url('/delete/'.$data->id)}}">Delete</a>--}}
                        <a href="{{route('/Delete',[$data->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
