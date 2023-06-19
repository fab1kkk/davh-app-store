@extends('layout/base')
@section('title', $title)
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/cart/style.css') }}">
<div>
    @if(Auth::check())
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
@endsection