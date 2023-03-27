@extends('base')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/auth/login.css') }}">
    <title>Login</title>
</head>

<body>
    @section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="login">
        <form class="login-form" action="{{ route('login')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <button class="btn" type="submit">Log In</button>
            </div>
        </form>
    </div>
    @endsection
</body>

</html>