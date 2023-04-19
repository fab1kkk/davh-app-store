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
    <!-- sidebar -->
    <div class="fixed h-full w-52 bg-gray-800">
        <ul class="py-52">
            <li class="p-1 mb-1 flex hover:bg-green-700 {{ Route::is('admin.dashboard.index') ? 'bg-green-700' : ''}}">
                <a href="{{route('admin.dashboard.index')}}" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-400">Home </a>
            </li>
            <li class="p-1 mb-1 flex hover:bg-green-700{{ Route::is('admin.dashboard.products') ? 'bg-green-700' : ''}}">
                <a href="{{ route('admin.dashboard.products') }}" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-400">Products</a>
            </li>
            <li class="p-1 flex hover:bg-green-700">
                <a href="#" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-400">Users</a>
            </li>
            <li class="p-1 flex hover:bg-green-700">
                <a href="#" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-400">Orders</a>
            </li>
            <li class="p-1 flex hover:bg-green-700">
                <a href="#" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-400">Account</a>
            </li>
            <li class="p-1 flex hover:bg-green-700">
                <a href="{{ route('home.index') }}" class="text-white font-semibold text-xl w-full h-full flex items-center justify-center p-1 m-2 hover:border-l-4 border-l-lime-400">Store</a>
            </li>
        </ul>
    </div>
    <!-- topbar -->
    <div class="flex h-40 ml-52 bg-green-700 shadow-lg text-white md:text-2xl sm:text-xl">
        <div class="flex items-end pb-10 basis-1/4">
            <p class="ml-8">Hello, {{ $currentUser }}</p>
        </div>
        <div class="flex items-end pb-10 basis-1/6">
            <p class="ml-8">Registered users: {{$totalUsers}}</p>
        </div>
        <div class="flex items-end pb-10 mr-10 justify-center w-64">
            <p class="ml-8">Total Products: {{$totalProducts}}</p>
        </div>
        <div class="flex flex-col items-start justify-center ml-24 md:text-xl sm:text-sm">
            <p class="mb-3">Beds: {{$totalBeds}}</p>
            <p class="mb-3">Mattresses: {{$totalMattresses}}</p>
            <p class="mb-3">Sofas: {{$totalSofas}}</p>
            <p class="mb-3">Armchairs: {{$totalArmChairs}}</p>
        </div>
    </div>
    <!-- Content goes here -->
    <div class="ml-52 p-4">
        @yield('content')
    </div>
    <!-- Content -->
</body>

</html>