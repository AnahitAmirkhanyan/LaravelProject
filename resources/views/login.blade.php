@extends('layout')

@section('content')

    <div style="margin-top: 50px">
        <form method="POST" action="login">
            @csrf
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
            <div>
                <button class="button"> SUBMIT </button>
            </div>
        </form>
    </div>
@endsection
