@extends('admin/panel/layout')

<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_panel/products.css') }}">

@section('content')
<main class="flex flex-col flex-wrap">
    {{$products->links()}}
    @if(session('formFinalizationMessage') or (session('formFinalizationErrorMessage')))
    <div class="flex basis-1/4 mt-2">
        <div class="font-semibold {{ session('formFinalizationMethod') === 'store' ? 'bg-green-400' : (session('formFinalizationMethod') === 'delete' ? 'bg-red-500' : 'bg-yellow-400') }} text-black border-none rounded-md p-3 text-center">
            {{ session('formFinalizationMessage')}}
            {{ session('formFinalizationErrorMessage')}}
        </div>
    </div>
    @endif
    <div class="flex flex-col">
        <button onclick="openForm('store')" class="inline-block bg-gray-800 text-white text-center rounded-md font-semibold pt-2 pb-2 mt-2">
            Dodaj nowy produkt
        </button>
        <div id="create-popup" class="popup hidden">
            <div class="popup-content md:h-4/6 md:w-1/3 min-w-max ">
                <form action="{{ route('admin.dashboard.products.store') }}" method="post">
                    @csrf
                    <div class="flex flex-col h-full gap-1">
                        <label class="text-base font-normal" for="name">Name:</label>
                        <div class="flex">
                            <input class="w-full bg-slate-200 text-start" type="text" name="name" required>
                        </div>
                        <label class="text-base font-normal" for="description">Description:</label>
                        <div class="flex h-full">
                            <textarea name="description" class="w-full bg-slate-200"></textarea>
                        </div>
                        <label class="text-base font-normal" for="image">Image:</label>
                        <div class="flex">
                            <input class="w-full bg-slate-200" type="text" name="image" required>
                        </div>
                        <label class="text-base font-normal " for="price">Price:</label>
                        <div class="flex">
                            <input class="w-full bg-slate-200" type="number" step="0.01" name="price" required>
                        </div>
                        <label class="text-base font-normal " for="product_categories_id">Category: </label>
                        <div class="flex">
                            <select class="w-full bg-slate-200" name="product_categories_id">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ Str::title($category->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex mt-4">
                            <button class="mr-4" type="submit">Create</button>
                            <button type="button" onclick="closeForm()">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
                            <button onclick="openForm('edit', {{ $product->id }})" class="inline-block w-24 bg-gray-800 text-white text-center pl-2 pr-2 rounded-md font-medium pt-1 pb-1">
                                edit
                            </button>
                            <div id="edit-popup-{{$product->id}}" class="popup hidden">
                                <div class="popup-content md:h-4/6 md:w-1/3 min-w-max ">
                                    <form action="{{ route('admin.dashboard.products.edit', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="flex flex-col h-full gap-1">
                                            <label class="text-base font-normal" for="name">Name:</label>
                                            <div class="flex">
                                                <input class="w-full bg-slate-200 text-start" type="text" name="name" value="{{$product->name}}" required>
                                            </div>
                                            <label class="text-base font-normal" for="description">Description:</label>
                                            <div class="flex h-full">
                                                <textarea name="description" required class="w-full bg-slate-200">{{ $product->description }}</textarea>
                                            </div>
                                            <label class="text-base font-normal" for="image">Image:</label>
                                            <div class="flex">
                                                <input class="w-full bg-slate-200" type="text" name="image" value="{{ $product->image }}" required>
                                            </div>
                                            <label class="text-base font-normal " for="price">Price:</label>
                                            <div class="flex">
                                                <input class="w-full bg-slate-200" type="number" step="0.01" name="price" value="{{ $product->price}}" required>
                                            </div>
                                            <label class="text-base font-normal" for="product_categories_id">Category: </label>
                                            <div class="flex">
                                                <select class="w-full bg-slate-200" name="product_categories_id">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id === $product->product_categories_id ? 'selected' : '' }}>
                                                        {{ Str::title($category->name) }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex mt-4">
                                                <button class="mr-4" type="submit">Update</button>
                                                <button type="button" onclick="closeForm({{$product->id}})">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="mb-2">
                            <form action="{{ route('admin.dashboard.products.delete', $product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="inline-block w-24 bg-gray-800 text-white text-center pl-2 pr-2 rounded-md font-medium pt-1 pb-1">delete</button>
                            </form>
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
    <script>
        function openForm(mode, productId) {
            var popup;

            if (mode === 'store') {
                popup = document.getElementById('create-popup');
                var form = popup.querySelector('form');
                form.action = "{{ route('admin.dashboard.products.store') }}";
            } else if (mode === 'edit') {
                popup = document.getElementById('edit-popup-' + productId);
                var form = popup.querySelector('form');
            }
            popup.style.display = 'flex';
        }

        function closeForm(productId) {
            var popupStore = document.getElementById('create-popup');
            popupStore.style.display = 'none';

            var popupEdit = document.getElementById('edit-popup-' + productId);
            popupEdit.style.display = 'none';
        }
    </script>
</main>
@endsection