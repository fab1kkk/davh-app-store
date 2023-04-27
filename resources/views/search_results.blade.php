@extends('layout/base')
@section('title', $title)
@section('content')
<style>
    .result-message {
        display:flex;
        flex-direction: row;
        align-items: center;
    }
    .result-message .q {
        margin-right: 8px;
        color: black;
        font-weight: bold;
    }
    .result-message .r {
        margin-right: 8px;
        color: gray;
    }
</style>
<div class="result-message">
        <p class="q">"{{request('q')}}"</p>
        <p class="r"> {{$resultsMessage}}</p>
</div>
@foreach($products as $product)
<p>{{$product->name}}</p>
<a href="{{ route('product.showEach', $product->slug)}}">
    <img src="{{ asset('static/img/product/products/'.$product->image) }}" alt="" style="width:25%">
</a>
<p>{{$product->description}}</p>
<p>=================================</p>
@endforeach
@endsection