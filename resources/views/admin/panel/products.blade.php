@extends('admin/panel/layout')

<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_panel/products.css') }}">

@section('content')
<main class="flex flex-col flex-wrap">
    {{$products->links()}}
    @if(session('success'))
    <div class="flex basis-1/4 mt-2">
        <div class="font-semibold bg-green-300 text-black border-none rounded-md p-3 text-center">
            {{ session('success')}}
        </div>
    </div>
    @endif
    <div class="flex flex-col">
        <a href="#" onclick="openForm()" class="inline-block bg-yellow-300 text-center rounded-md font-semibold pt-2 pb-2 mt-2">
            Dodaj nowy produkt
        </a>
        <div id="popup" class="popup hidden">
            <div class="popup-content md:h-4/6 md:w-1/3 min-w-max">
                <form action="{{ route ('admin.dashboard.products.store')}}" method="post">
                    @csrf
                    <div class="form-name">
                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="enter name">
                    </div>
                    <div class="form-description">
                        <label for="description">Description:</label>
                        <input type="text" name="description" placeholder="enter description">
                    </div>
                    <div class="form-image">
                        <label for="image">Image:</label>
                        <input type="text" name="image" placeholder="enter image">
                    </div>
                    <div class="form-price">
                        <label for="price">Price:</label>
                        <input type="number" step="0.01" name="price" placeholder="enter price">
                    </div>
                    <div class="form-category">
                        <label for="product_categories_id">Category: </label>
                        <select name="product_categories_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ Str::title($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-buttons">
                        <button type="submit">Submit</button>
                        <a href="{{route('admin.dashboard.products')}}">
                            <button type="cance">Cancel</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function openForm() {
                var popup = document.getElementById('popup');
                popup.style.display = 'flex';
            }
        </script>

        <hr class="border-2 border-gray-200 rounded mt-4">
        <div class="main-wrapper" id="background">
            @foreach($products as $product)
            <div class="flex flex-row mb-4 mt-3">
                <div class="hidden md:block basis-1/3 lg:basis-1/2 bg-gray-100 rounded-t-lg p-2 transition-all ease-in-out">
                    <a href="{{ route('product.showEach', $product) }}">
                        <img src="{{ asset('static/img/product/products/'.$product->image) }}" alt="{{$product->name}}" class="rounded-t-md ">
                    </a>
                </div>
                <div class="flex ml-2 bg-gray-100 rounded-t-lg p-2">
                    <ul class="flex flex-col">
                        <li class="mb-2">
                            <a href="#">
                                <span class="inline-block w-24 bg-blue-400  text-center pl-2 pr-2 rounded-md font-semibold pt-1 pb-1">edit</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#">
                                <span class="inline-block w-24 bg-red-500 text-center pl-2 pr-2 rounded-md font-semibold pt-1 pb-1">delete</span>
                            </a>
                        </li>
                        </li>
                    </ul>
                </div>
                <div class="flex grow bg-gray-100 ml-2 rounded-t-lg p-2 w-min">
                    <div class="flex flex-col grow">
                        <span class="border-b-2 border-gray-200 shadow-sm hover:transition-all pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Produkt: {{$product->name}}</span>
                        <span class="border-b-2 border-gray-200 shadow-sm pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Cena: {{$product->getPrice('PLN')}}</span>
                        <span class="border-b-2 border-gray-200 shadow-sm pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Zdjęcie: {{$product->image}}</span>
                        <span class="h-full border-b-2 border-gray-200 shadow-sm pl-2 pr-2 rounded-md font-normal pt-1 pb-1 mb-2">Opis: {{$product->description}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection