<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title', 'Online Store')</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mr-auto">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Products</a>
                </li>
            </ul>
            @if (auth()->check())
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="header-right">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <a href="#" class="header-profile-dropdown-toggle">
                        <img class="header-profile" src="{{ asset('static/img/profile.png') }}" alt="profile icon">
                    </a>
                    <button class="btn m-1 btn-sm" type="submit">Logout</button>
                </div>
            </form>
            @else
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control" type="search" aria-label="Search" placeholder="Search...">
                <a class="btn m-1 btn-sm" href="{{ route('loginForm')}}" type="submit">Sign In</a>
                <a class="btn m-0 btn-sm" href="{{ route('registerForm')}}" type="submit">Sign Up</a>
            </form>
            @endif
        </div>
    </nav>

    <main class="container-fluid">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-center">
        <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
            <span class="foot-span">{{ config('app.name') }} project using PHP v<strong>{{ PHP_VERSION }}</strong> and Laravel v<strong>{{ Illuminate\Foundation\Application::VERSION}}</strong></span>
            <a target="_blank" href="https://github.com/fab1kkk/davh-app-store">
                <img class="foot-git" src="{{ asset('static/img/githubpng.png') }}" alt="github icon">
            </a>
            <span> Developing for the purpose of studies.</span>
        </div>
    </footer>
</body>

</html>