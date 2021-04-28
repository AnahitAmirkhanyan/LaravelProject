@extends('layout')

@section('content')

    <div style="margin-top: 50px">
        <div style="text-align: center;">
            <div style="display: inline-block; margin: 0 auto">
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
                <h1>This is the about page.</h1>
            </div>
        </div>
        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/10/2f/db/stuttgart.jpg?w=1100&h=600&s=1" alt="pretty" style="display: block;margin-left: auto;margin-right: auto">
    </div>
@endsection
