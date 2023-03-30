<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <title>@yield('title', 'Online Store')</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-secondary py-4">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Products</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </div>
        </div>
        @if (auth()->check())
        <div class="container">
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="header-right">
                    <a href="#" class="header-profile-dropdown-toggle">
                        <img class="header-profile" src="{{ asset('static/img/profile.png') }}" alt="profile icon">
                    </a>
                    <button class="btn m-1 btn-sm" type="submit">Logout</button>
                </div>
        </div>
        </form>
        @else
        <div class="container">
            <form class="form-inline my-2 my-lg-0">
                <a class="btn m-1 btn-sm" href="{{ route('loginForm')}}" type="submit">Sign In</a>
                <a class="btn m-0 btn-sm" href="{{ route('registerForm')}}" type="submit">Sign Up</a>
            </form>
        </div>
        @endif
    </nav>

    <main class="container-fluid">
        <div class="container my-2">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark">
        <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
            <span class="foot-span">{{ config('app.name') }} project using PHP v<strong>{{ PHP_VERSION }}</strong> and Laravel v<strong>{{ Illuminate\Foundation\Application::VERSION}}. </strong></span>
            <a target="_blank" href="https://github.com/fab1kkk/davh-app-store">
                <img class="foot-git" src="{{ asset('static/img/github.png') }}" alt="github icon" style="margin-left: 10px" ;>
            </a>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"> </script>
</body>

</html>