<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
</head>

<body>
    @extends('base')
    <main>
        @section('main-content')
        <header>
            <h5>Done</h5>
        </header>
        <ol>
            <li>
                <p><s>Create base layout that other pages will inherit from (navbar, footer)</s></p>
            </li>
            <li>
                <p><s>Style base layout</s></p>
            </li>
            <li>
                <p><s>Create HomePage</s></p>
            </li>

        </ol>
    </main>
    @endsection
    <div>
        @section('additional-content')
        <header>
            <h5>TBD</h5>
        </header>
        <ol>
            <li>
                <p>Create Login route, registration</p>
            </li>
        </ol>
        @endsection
    </div>
</body>

</html>