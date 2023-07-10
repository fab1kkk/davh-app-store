@extends('layout/base')
@section('title', $title)
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/cart/style.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">

@if(Auth::check())
<div class="grid-container">
    <p>Koszyk ({{$items->count()}})</p>
    <div class="header-wrapper">
        <div class="header header-product">Produkt</div>
        <div class="header header-subtotal">Kwota</div>
    </div>
    <div class="wrap-scrollbar">
        @foreach($items as $item)
        <div class="content-wrapper">
            <div class="content content-img">
                <img src="{{ asset('static/img/product/products/'.$item->product->image) }}" alt="{{$item->product->image}}">
            </div>
            <div class="content content-des">
                <div class="content-des-item1">{{$item->product->name}}</div>
                <div class="content-des-item2">{{$item->product->getPrice()}}</div>
                <div class="content-des-item3">
                    <a href="#">usuń z koszyka</a>
                </div>
            </div>
            <div class="content content-price">{{$item->product->getPrice()}}</div>
        </div>
        @endforeach
    </div>
    <div class="totals-wrapper">
        <hr>
        <div class="total-prize">
            <p>Łącznie do zapłaty</p>
            <p>{{ $totalAmount }} pln</p>
        </div>
        <button type="submit">Przejdź do podsumowania</button>
    </div>
</div>
@endif

<!-- @if(Auth::check())
<p>{{ $items->count() }} products</p>
@foreach($items as $item)
<li>
    {{ $item->product->name }} ---
    {{ $item->product->getPrice() }} ----
    {{ $item->product->id }}
</li>
@endforeach
@else

<p>{{ count($items) }} products</p>
@foreach($items as $productId)
@php
$product = App\Models\Product::find($productId)
@endphp
@if($product)
<li>
    {{ $product->name }} ---
    {{ $product->getPrice() }} ---
    {{ $product->id }}
</li>
@endif
@endforeach
@endif
</div>
@endsection -->