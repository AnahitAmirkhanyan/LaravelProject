@extends('layout')

@section('content')
    <div style="margin-top: 50px">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif


        <h2>This is the home page.</h2>
{{--            <img src="{{$data['image']}}"  alt="pretty" style="display: block;margin-left: auto;margin-right: auto">--}}
{{--            <img src="{{ url('storage/'.auth()->user()->image) }}">--}}
{{--        <img src="{{asset('7yW1ZGW70O8fmZ4Jies8348SNMumkSqz9vLQqxyx.jpg')}}">--}}
    </div>
@endsection
