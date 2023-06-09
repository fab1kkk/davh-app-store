@extends('admin.panel.layout')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin_panel/users.css') }}">

<body>
    @section('content')
    <main>
        
        <div class="justify-center text-center align-items-center">
            <table class="w-full text-center">
                <tr>
                    @foreach($columns as $column)
                    <th>{{ $column }}</th>
                    @endforeach
                </tr>
                @foreach($users as $user)
                <tr class="hover:bg-slate-400">
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->created_at}}</td>
                    <td>{{ $user->admin}}</td>
                </tr>
                @endforeach
            </table>

    </main>
    @endsection
</body>