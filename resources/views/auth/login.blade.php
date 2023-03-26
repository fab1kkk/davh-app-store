@extends('base')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    @section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('login.submit')}}" method="post">
        @csrf
        <div class="login-form text-center">
            <div>
                <label for="email">Email:</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div>
                <button class="btn m-2 btn-sm" type="submit"> Log In </button>
            </div>
        </div>
    </form>
    @endsection
</body>

</html>