<!DOCTYPE html>
@vite('resources/css/app.css')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>

<body class>
    <div class="flex h-screen">
        <!-- sidebar -->
        <div class="flex flex-col h-screen w-1/6 bg-lime-700">
            <div class="p-28 flex items-center justify-center">
                <img src="{{ asset('static/img/profile.png') }}" alt="Logo" class="h-16 mb-4">
            </div>
            <ul class="mb-4">
                <li class="mb-6 flex hover:bg-slate-600">
                    <a href="#" class="text-white font-semibold text-xl hover:text-gray-300 w-full h-full flex items-center justify-center m-3">Home</a>
                </li>
                <li class="mb-6 flex hover:bg-slate-600">
                    <a href="#" class="text-white font-semibold text-xl hover:text-gray-300 w-full h-full flex items-center justify-center m-3">Products</a>
                </li>
                <li class="mb-6 flex hover:bg-slate-600">
                    <a href="#" class="text-white font-semibold text-xl hover:text-gray-300 w-full h-full flex items-center justify-center m-3">Users</a>
                </li>
                <li class="mb-6 flex hover:bg-slate-600">
                    <a href="#" class="text-white font-semibold text-xl hover:text-gray-300 w-full h-full flex items-center justify-center m-3">Orders</a>
                </li>
                <li class="mb-6 flex hover:bg-slate-600">
                    <a href="#" class="text-white font-semibold text-xl hover:text-gray-300 w-full h-full flex items-center justify-center m-3">Account</a>
                </li>
                <li class="mb-6 flex hover:bg-slate-600">
                    <a href="{{ route('home.index') }}" class="text-white font-semibold text-xl hover:text-gray-300 w-full h-full flex items-center justify-center m-3">Store</a>
                </li>


            </ul>
        </div>

        <!-- topbar -->
        <div class="flex-1 flex-row h-1/6 w-screen bg-orange-500 flex items-center">
            <p class="font-serif text-3xl font-semibold ml-8 mt-12">Hello, {{ $currentUser }}</p>
        </div>
    </div>
</body>

</html>