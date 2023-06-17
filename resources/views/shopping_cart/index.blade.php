@extends('layout/base')
@section('title', $title)
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/cart/style.css') }}">
<div>
    <li>
        {{ $cart }}
    </li>
</div>
@endsection