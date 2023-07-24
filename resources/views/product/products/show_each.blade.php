@extends('layout/base')
@section('content')
@section('title', $title)
<style>
    .col-md-4 {
        display: flex;
        align-items: center;
    }

    .col-md-4 img {
        display: flex;
        max-width: 100%;
        max-height: 100%;
        border-radius: 20px;
    }
</style>
<link rel="stylesheet" href="{{asset('css/product/show.css')}}">
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('static/img/product/products/'.$product['image']) }}" alt="{{$product['image']}}">
        </div>
        <div class="product-details col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{$product->name}} ({{$product->getPrice()}})
                </h5>
                <p class="card-text">{{$product['description']}}
                </p>
                <form action="{{ route('cart.addToCart', $product->id ) }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <button type="submit" class="btn cart w-auto">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection