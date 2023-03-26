@extends('base')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    @section('content')
    @if(session('success_form'))
    <div class="alert alert-success">
        {{ session('success_form') }}
    </div>
    @endif
    <span>Home page :)</span>
    @endsection
</body>

</html>