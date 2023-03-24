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
    @if(session('success_register'))
    <div class="alert alert-success">
        {{ session('success_register') }}
    </div>
    @endif
    <h4>DONE</h4>
    <ol>
        <li>Prepare base layout</li>
        <li>Style base layout</li>
        <li>Create HomePage that extends 'base'.</li>
    </ol>
    <h4>To-Do</h4>
    <ol>
        <li>Add 'Login' route</li>
        <li>Add 'Register' route</li>
    </ol>
    @endsection
</body>

</html>