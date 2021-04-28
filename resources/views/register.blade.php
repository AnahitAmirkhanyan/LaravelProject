@extends('layout')

@section('content')

    <div style="margin-top: 50px">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

        @if(session('errors'))
            <div class="alert alert-danger" role="alert">
                There were some errors.
            </div>
        @endif
        <form method="POST" action="register" enctype="multipart/form-data">
            @csrf
            <div class="block">
                <input type="file" name="file">
            </div>
            <div class="block">
                <div class="blockErrors">
                    <input name="first_name" class="input-field" type="text" placeholder="First Name" value="{{ old('first_name') }}"/>
                    @error('first_name')
                    <div id="validation" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block">
                <div class="blockErrors">
                    <input name="last_name" class="input-field" type="text" placeholder="Last Name" value="{{ old('last_name') }}"/>
                    @error('last_name')
                    <div id="validation" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block">
                <div class="blockErrors">
                    <input name="email" class="input-field" type="email" placeholder="Email Address" value="{{ old('email') }}">
                    @error('email')
                    <div id="validation" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block">
                <div class="blockErrors">
                    <input name="password" class="input-field" type="password" placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                    <div id="validation" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="block">
                <div class="blockErrors">
                    <input name="password_confirmation" class="input-field" type="password" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                    <div id="validation" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <button class="button"> SUBMIT </button>
            </div>
        </form>
    </div>

@endsection
