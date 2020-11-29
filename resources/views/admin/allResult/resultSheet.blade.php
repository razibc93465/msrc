@extends('admin.master');

@section('title')
    All Result
@endsection

@section('mainContent')
    <div id="page-wrapper">
        <hr/>
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
        <a href="{{route('/demoForm')}}">Form</a>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Roll</th>
                @foreach($results as $result)
                <th>{{$result->courseTitle}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{$result->sExamRoll}}</td>
{{--                    @foreach($results as $result)--}}
                    <td>{{$total=$result->attendance+$result->tutorial+$result->midterm+$result->final}}</td>
{{--                    @endforeach--}}
{{--                    <td>--}}
{{--                        @if($total > 79)--}}
{{--                            {{'A+'}}--}}
{{--                        @elseif($total > 74)--}}
{{--                            {{'A'}}--}}
{{--                        @elseif($total > 69)--}}
{{--                            {{'A-'}}--}}
{{--                        @elseif($total > 64)--}}
{{--                            {{'B+'}}--}}
{{--                        @elseif($total > 59)--}}
{{--                            {{'B'}}--}}
{{--                        @elseif($total > 54)--}}
{{--                            {{'B-'}}--}}
{{--                        @elseif($total > 49)--}}
{{--                            {{'C+'}}--}}
{{--                        @elseif($total > 44)--}}
{{--                            {{'C'}}--}}
{{--                        @elseif($total > 39)--}}
{{--                            {{'D'}}--}}
{{--                        @else--}}
{{--                            {{'F'}}--}}
{{--                        @endif--}}
{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>


@endsection
