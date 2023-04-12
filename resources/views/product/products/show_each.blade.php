@extends('layout/base')
@section('content')
@section('title', $title)
<link rel="stylesheet" href="{{asset('css/product/show.css')}}">
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('static/img/product/products/'.$product['image']) }}" alt="{{$product['image']}}" class="img-fluid rounded-start">
        </div>
        <div class="product-details col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{$product['name']}} ({{$product['price']}} zł)
                </h5>
                <p class="card-text">{{$product['description']}}</p>
                <button type="submit" class="btn cart w-auto">Add to cart</button>
            </div>
        </div>
    </div>
</div>
@endsection