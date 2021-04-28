<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1 style="color: #144f3f"> </h1>

    <div style="margin: 0 auto;text-align: center; background: #dcf5ee">

    <div class="topnav">
        @if(auth()->check())
            <a href={{route('logout')}}>Log Out</a>
            <a href="">Welcome {{auth()->user()->first_name}}!</a>
            <a>
                @if(auth()->user()->image)
                    <img height=35px src="{{ url('storage/'.auth()->user()->image) }}">
                @endif
            </a>
        @else
            <a href={{route('register')}}>Register</a>
            <a href={{route('login')}}>Login</a>
        @endif

    </div>
    </div>
    <div class="sidenav">
        <a class="{{Request::is('home') ? 'active' : ''}}" href={{route('home')}}>Home</a>
        @if(auth()->check())
            <a class="{{Request::is('companies') ? 'active' : ''}}" href={{route('companies')}}>Companies</a>
            <a class="{{Request::is('employees') ? 'active' : ''}}" href={{route('employees')}}>Employees</a>
            <a class="{{Request::is('details') ? 'active' : ''}}" href={{route('details')}}>Details</a>
        @endif
        <a class="{{Request::is('about') ? 'active' : ''}}" href={{route('about')}}>About</a>
{{--        <a class="{{Request::is('contact') ? 'active' : ''}}" href={{route('contact')}}>Contact</a>--}}
    </div>

{{--    </div>--}}

<div class="main">
    @yield('content')
</div>
</body>
</html>
