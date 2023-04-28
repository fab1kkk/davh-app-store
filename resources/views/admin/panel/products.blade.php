@extends('admin/panel/layout')

@section('content')
{{$products->links()}}
<div class="flex flex-col">
    <a href="#">
        <span class="inline-block w-full bg-yellow-400 text-center pl-2 pr-2 rounded-md font-semibold pt-1 pb-1 mt-2 ">Dodaj nowy produkt
        </span>
        <span class="inline-block w-full text-center border border-gray-700"></span>

    </a>
    @foreach($products as $product)
    <div class="flex flex-row mb-4 mt-3">
        <div class="hidden lg:basis-1/4 md:block bg-gray-100 rounded-t-lg text-center p-2">
            <a href="{{ route('product.showEach', $product) }}">
                <img src="{{ asset('static/img/product/products/'.$product->image) }}" alt="{{$product->name}}" class="rounded-t-md hover:transition">
            </a>
        </div>
        <div class="flex ml-2 bg-gray-100 rounded-t-lg p-2">
            <ul class="flex flex-col">
                <li class="mb-2">
                    <a href="#">
                        <span class="inline-block w-24 bg-indigo-400 hover:bg-lime-400 text-center pl-2 pr-2 rounded-md font-semibold pt-1 pb-1">edit</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="inline-block w-24 bg-red-500 hover:bg-red-600 text-center pl-2 pr-2 rounded-md font-semibold pt-1 pb-1">delete</span>
                    </a>
                </li>
                </li>
            </ul>
        </div>
        <div class="flex grow bg-gray-100 ml-2 rounded-t-lg p-2 w-min">

            <div class="flex flex-col">
                <span class="border-b-2 border-gray-200 shadow-sm hover:transition-all pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Produkt: {{$product->name}}</span>
                <span class="border-b-2 border-gray-200 shadow-sm pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Cena: {{$product->price}} zł</span>
                <span class="border-b-2 border-gray-200 shadow-sm pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Opis: {{$product->description}}</span>
                <span class="h-full border-b-2 border-gray-200 shadow-sm pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Zdjęcie: {{$product->image}}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection