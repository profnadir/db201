<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
       

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            @if (session('success'))
                <div style="color:green">{{session('success')}}</div>
            @endif

            <a href="{{route('formateurs.create')}}">New</a>
            <table border="1">
                <tr>
                    <th>#</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>AGE</th>
                    <th>ACTION</th>
                </tr>
                @foreach ($formateurs as $formateur)
                    <tr>
                        <td>{{ $formateur->id }}</td>
                        <td>{{ $formateur->nom }}</td>
                        <td>{{ $formateur->prenom }}</td>
                        <td>{{ $formateur->age }}</td> 
                        <td>
                            <a href="{{route('formateurs.edit',$formateur->id)}}">Update</a>
                            <form action="{{route('formateurs.destroy',$formateur->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('voulez vous vraiment supprimer ce formateur')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <p>la moyenne des ages des formateurs : {{ $age_moy}}</p>
        </div>
    </body>
</html>
