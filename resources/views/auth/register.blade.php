@extends ('base')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <div class="register-form text-center">
        <form action="{{ route('register.submit') }}" method="post">
            @csrf
            <div>
                <label for="name">Name:</label>

                <div>
                    <input id="name" type="text" name="name" required>
                </div>
            </div>
            <div>
                <label for="email">E-Mail:</label>

                <div>
                    <input id="email" type="email" name="email" required>
                </div>
            </div>
            <div>
                <label for="password">Password:</label>

                <div>
                    <input id="password" type="password" name="password" required>
                </div>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password:</label>

                <div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
            </div>
            <div>
                <button class="btn m-2 btn-sm" style="font-size:13px" type="submit">Register</button>
            </div>
    </div>

    </form>

    @endsection
</body>

</html>