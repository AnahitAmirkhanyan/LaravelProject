@extends('layout')

@section('content')
    <div style="margin-top: 50px">
        <form method="POST" action="contact">
            @csrf
            <input name="name" type="text" placeholder="Name" class="input-field"/>
            <input name="email" type="email" placeholder="Email" class="input-field"/>
            <input name="password" type="password" placeholder="Password" class="input-field">
            <div>
                <button class="button"> SUBMIT </button>
            </div>
        </form>
    </div>
@endsection
