<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
</head>

<body>
    @include('navbar')
    <main>
        <article>
            <p><strong>{{ config('app.name') }}</strong> project using PHP v<strong>{{ PHP_VERSION }}</strong> and Laravel v<strong>{{ Illuminate\Foundation\Application::VERSION}}</strong></p>
        </article>
        {{ $project_name }}
    </main>

    <h1>JUST ADDED SOMETHING NEW!!!!!!</h1>
</body>

</html>