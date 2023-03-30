@extends('layout/base')
<!DOCTYPE html>

@section('title', $title)

@section('content')

@if(session('success_form'))
<div id="login-success" class="alert alert-success">
    {{ session('success_form') }}
</div>
@endif


@auth
<p>you're logged in as {{ Auth::user()->name }}</p>
@endauth

@endsection