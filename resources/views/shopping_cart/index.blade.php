@extends('layout/base')
@section('title', $title)
<link rel="stylesheet" type="text/css" href="{{ asset('css/cart/style.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500&display=swap" rel="stylesheet">


@section('content')
<div class="grid-container">
    <p>Koszyk ({{ count($products) }})</p>
    <div class="header-wrapper">
        <div class="header header-product">Produkt</div>
        <div class="header header-subtotal">Kwota</div>
    </div>
    <div class="wrap-scrollbar">
        @foreach($products as $product)
        <div class="content-wrapper">
            <a href="{{ route('product.showEach', $product->slug) }}" class="content content-img">
                <img src="{{ asset('static/img/product/products/'.$product->image) }}" alt="{{$product->image}}">
            </a>
            <div class="content content-des">
                <div class="content-des-item1">{{$product->name}}</div>
                <div class="content-des-item2">{{$product->getPrice()}}</div>
                <div class="content-des-item3">
                    <a href="#">usuń z koszyka</a>
                </div>
            </div>
            <div class="content content-price">{{$product->getPrice()}}</div>
        </div>
        @endforeach
    </div>
    <div class="totals-wrapper">
        <hr>
        <div class="total-prize">
            <p>Łącznie do zapłaty</p>
            <p>{{ $cartValue }} pln</p>
        </div>
        <button type="submit">Przejdź do podsumowania</button>
    </div>
</div>
@endsection