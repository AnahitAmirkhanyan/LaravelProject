@extends('layout')

@section('content')
    <div style="margin-top: 50px">
        <p>Name is <span style="color: #1d755d"> {{$data['name']}} </span> </p>
        <p>Email is <span style="color: #1d755d"> {{$data['email']}}</span></p>
    </div>
@endsection
