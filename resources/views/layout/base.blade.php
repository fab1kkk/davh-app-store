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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>@yield('title', CustomHelpers::setPageTitle() )</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-secondary fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">Oferta</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <form id="myForm" action="{{ route('search.index') }}" method="get">
                <input id="search-bar" class="form-control" name="q" value="{{request('q')}}" type="text" placeholder="Search">
            </form>

        </div>

        <div class="container">
            <div class="nav-auth">
                <div class="cart">
                    <span class="dot">
                        <span class="dot-number">{{ Auth::check() ? count(Auth::user()->shoppingCart->cartItems) : count(unserialize(Cookie::get('product_ids'))) }}</span>
                    </span>
                    <a href="{{ route('cart.index') }}" class="header-profile-dropdown-toggle">
                        <img class="header-profile" src="{{ asset('static/img/navbar/cart.png') }}" alt="profile icon">
                    </a>
                </div>
                @if (Auth::check())
                <div class="nav-auth">
                    <a href="{{ auth()->user()->admin ? route('admin.dashboard.index') : '#' }}" class="header-profile-dropdown-toggle">
                        <img class="header-profile" src="{{ asset('static/img/navbar/profile.png') }}" alt="profile icon">
                    </a>
                    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('login.logout') }}">
                        @csrf
                        <button class="nav-btn" type="submit">Logout</button>
                </div>
                </form>
            </div>
            @else
            <div class="container">
                <a href="{{ route('login.index')}}">
                    <button class="nav-btn" id="login-btn">Sign In</button>
                </a>
            </div>
            @endif
    </nav>
    <div class="wrapper">
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger text-center">
                @foreach ($errors->all() as $error)
                <span id="error">{{ $error }}</span>
                @endforeach
            </div>
            @endif

            <!-- CONTENT GOES HERE -->
            @yield('content')
            <!-- END CONTENT -->
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="bg-dark">
        <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2);">
            <span class="foot-span">{{ CustomHelpers::setPageTitle() }} project using PHP v<strong>{{ PHP_VERSION }}</strong> and Laravel v<strong>{{ Illuminate\Foundation\Application::VERSION}}. </strong></span>
            <a target="_blank" href="https://github.com/fab1kkk/davh-app-store">
                <img class="foot-git" src="{{ asset('static/img/github.png') }}" alt="github icon" style="margin-left: 10px" ;>
            </a>
        </div>
    </footer>

    <script>
        $(function() {
            var path = window.location.href;
            $('#navbarSupportedContent a').each(function() {
                if (this.href === path) {
                    $(this).addClass('active');
                }
            });
        });
        $(document).ready(function() {
            var path = window.location.href;
            if ($('#login-btn').parent().attr('href') === path) {
                $('#login-btn').addClass('active');
            }
        });

        const form = document.getElementById('myForm');
        form.addEventListener('submit', function(event) {
            const searchBar = document.getElementById('search-bar');
            if (searchBar.value === '') {
                event.preventDefault();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"> </script>


</body>

</html>