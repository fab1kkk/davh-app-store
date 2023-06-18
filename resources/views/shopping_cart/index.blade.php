@extends('layout/base')
@section('title', $title)
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/cart/style.css') }}">
<div>
    <p>{{ $items->count() }} products</p>
    @foreach($items as $item)
    <li>
        {{ $item->product->name }} --- 
        {{ $item->product->getPrice() }} ----
        {{ $item->product->id }}
    </li>
    @endforeach
</div>
@endsection