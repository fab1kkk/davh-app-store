@extends('admin/panel/index')

@section('content')
{{$products->links()}}
<div class="flex flex-col">
    @foreach($products as $product)
    <div class="flex flex-row mb-4">
        <div class="basis-1/4 bg-lime-400 rounded-t-lg text-center">
            <div class="">
                <span class="font-semibold text-xs">{{$product->name}}</span>
            </div>
            <div class="p-1 rounded-lg">
                <a href="{{ route('product.showEach', $product) }}">
                    <img src="{{ asset('static/img/product/products/'.$product->image) }}" alt="{{$product->name}}">
                </a>
            </div>
        </div>
        <div class="grow md:mt-2 md:ml-2 bg-gray-200 mt-1 ml-1">
            <p class="p-4">eee</p>
        </div>
    </div>
    @endforeach
</div>
@endsection