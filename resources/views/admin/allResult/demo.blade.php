@extends('admin.master')
@section('title')
    Demo
@endsection

@section('mainContent')
    <div id="page-wrapper">
        <div class="raw">
            <hr/>
            <div class="col-lg-12">
                <div class="well">
                    <a href="{{route('/dataShow')}}">Data</a>
                    <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                    {{Form::open(['route'=>'/saveData','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="Enter your name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image"  accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="btn" class="btn btn-success btn-block">Save Data</button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>



{{--    <div id="page-wrapper">--}}
{{--        <h1>Hello from demo page</h1>--}}

{{--        <div class="raw">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="well">--}}
{{--                    <h3 class="text-center text-success">{{Session::get('message')}} </h3>--}}
{{--                    {!! Form::open(['route'=>'/saveData','method'=>'POST','class'=>'form-horizontal'])!!}--}}
{{--                    <form method="post" action="{{route('/saveData')}}" class="form-horizontal">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="inputEmail3" class="col-sm-2 control-label">Name </label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <input type="text" name="name" class="form-control" placeholder="Enter your name">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="col-sm-offset-2 col-sm-10">--}}
{{--                                <button type="submit" name="btn" class="btn btn-success btn-block">Submit</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    {{form::close()}}--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
