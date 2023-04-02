@php
use App\Classes\CustomHelpers;
@endphp
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
                        <a class="nav-link" href="{{ route('products.showProducts') }}">Products</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        </div>

        @if (auth()->check())
        <div class="container">
            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('login.logout') }}">
                @csrf
                <div class="nav-auth">
                    <a href="#" class="header-profile-dropdown-toggle">
                        <img class="header-profile" src="{{ asset('static/img/profile.png') }}" alt="profile icon">
                    </a>
                    <button class="btn m-1 btn-sm" type="submit">Logout</button>
                </div>
            </form>
        </div>
        @else
        <div class="container">
            <div class="nav-not-auth">
                <a href="{{ route('login.showLoginForm')}}" type="submit">
                    <button class="btn m-1 btn-sm">Sign In</button>
                </a>
                <a href="{{ route('register.showRegistrationForm')}}" type="submit">
                    <button class="btn m-1 btn-sm">Sign Up</button>
                </a>
            </div>
        </div>
        @endif
    </nav>

    <main class="container-fluid">
        @if ($errors->any())
        <div id="error-messages" class="alert alert-danger text-center">
            @foreach ($errors->all() as $error)
            <div class="error">{{ $error }}</div>
            @endforeach
        </div>
        @endif

        <div class="container">
            @yield('content')
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-dark">
        <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
            <span class="foot-span">{{ CustomHelpers::getAppName() }} project using PHP v<strong>{{ PHP_VERSION }}</strong> and Laravel v<strong>{{ Illuminate\Foundation\Application::VERSION}}. </strong></span>
            <a target="_blank" href="https://github.com/fab1kkk/davh-app-store">
                <img class="foot-git" src="{{ asset('static/img/github.png') }}" alt="github icon" style="margin-left: 10px" ;>
            </a>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"> </script>
</body>

</html>