@extends('layout/base')

<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/auth.css') }}">
@section('title', $title)

@section('content')
<div class="login">
    <form class="login-form" action="{{ route('login.login')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email"required>
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