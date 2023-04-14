@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>

<body class="bg-slate-200">
    <div class="bg-white p-6 rounded-md shadow-lg max-w-md mx-auto mt-24">
        <h2 class="text-2xl font-medium mb-6 text-center text-sky-600">Admin Login</h2>
        <form action="{{ route('admin.login')}}" method="post" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="email">Email</label>
                <input class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-gray-800" type="email" name="email" id="email" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2" for="email">Password</label>
                <input class="w-full px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:border-gray-800" type="email" name="email" id="email" required>
            </div>
            <div>
                <button class="w-full text-center bg-sky-600 rounded-md py-2 px-4 font-medium text-white hover:bg-sky-700">
                    Sign In
                </button>
            </div>
        </form>
    </div>
    </div>
</body>

</html>