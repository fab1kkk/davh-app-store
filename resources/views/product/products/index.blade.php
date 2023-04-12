@extends('layout/base')
@section('title', $title)
@section('content')
<link rel="stylesheet" href="{{asset('css/product/index.css')}}">

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('static/img/product/products/'.$product['image']) }}" alt="image" class="card-img-top">
            <div class="card-body text-center">
                <a href="{{ route('product.show', ['id'=> $product['id']]) }}" class="btn products">{{ $product['name'] }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection