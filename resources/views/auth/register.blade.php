@extends('layout/base')
<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/auth.css') }}">
@section('title', 'Join Dav-App')
@section('content')
@if ($errors->any())
<div id="error-messages" class="alert alert-danger text-center">
    @foreach ($errors->all() as $error)
    <div class="error">{{ $error }}</div>
    @endforeach
</div>
@endif
<div class="login">
    <div class="register-form">
        <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <button class="btn" style="font-size:13px" type="submit">Register</button>
            </div>
        </form>
    </div>
    @endsection