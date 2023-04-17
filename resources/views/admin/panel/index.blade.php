<!DOCTYPE html>
@vite('resources/css/app.css')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $title)</title>
</head>

<body>
    <div class="flex h-screen">
        <!-- sidebar -->
        <div class="flex flex-col h-screen w-52 bg-gradient-to-br from-green-400 to-lime-400">
            <div class="p-28 flex items-center justify-center">
                <img src="{{ asset('static/img/profile.png') }}" alt="Logo" class="h-16 mb-4">
            </div>
            <ul>
                <li class="p-1 mb-1 flex hover:bg-lime-600 {{ Route::is('admin.dashboard.index') ? 'bg-lime-600' : ''}}">
                    <a href="{{route('admin.dashboard.index')}}" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-700">Home </a>
                </li>
                <li class="p-1 mb-1 flex hover:bg-lime-600 {{ Route::is('admin.dashboard.products') ? 'bg-lime-600' : ''}}">
                    <a href="{{ route('admin.dashboard.products') }}" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-700">Products</a>
                </li>
                <li class="p-1 flex hover:bg-lime-600">
                    <a href="#" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-700">Users</a>
                </li>
                <li class="p-1 flex hover:bg-lime-600">
                    <a href="#" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-700">Orders</a>
                </li>
                <li class="p-1 flex hover:bg-lime-600">
                    <a href="#" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-700">Account</a>
                </li>
                <li class="p-1 flex hover:bg-lime-600">
                    <a href="{{ route('home.index') }}" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-700">Store</a>
                </li>
            </ul>
        </div>

        <!-- topbar -->
        <div class="flex flex-1 flex-col h-56">
            <div class="flex-row h-56 min-h-full bg-gray-50 flex items-center">
                <p class="font-serif text-3xl font-semibold ml-8 mt-20">Hello, {{ $currentUser }}</p>
            </div>

            <!-- Content goes here -->
            @yield('content')

        </div>
    </div>
</body>

</html>