@extends('layout/base')
@section('content')
<link rel="stylesheet" href="{{asset('css/product/index.css')}}">

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="{{ asset('static/img/product/categories/'.$product->image) }}" alt="image" class="card-img-top">
            <div class="card-body text-center">
                <a href="{{ route('product.showEach', ['product' => $product->name]) }}" class="btn products">{{ $product->name }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection