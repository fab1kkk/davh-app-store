@extends('layout/base')
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/auth.css') }}">
@section('title', $title)
@section('content')
@if(session('success_form'))
<div class="alert alert-success text-center">
    {{session('success_form')}}
</div>
@endif
<div class="login">
    <form class="login-form" action="{{ route('login.login')}}" method="post">
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
        <a href="{{ route('register.index') }}" class="reg-link"><span class="reg-span">Don't have an account yet?</span></a>
    </form>
</div>
@endsection