<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>GB PARTY LOG</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/post.css') }}" />
</head>

<body class="antialiased">
    <header>
        <h1>
            <a href="/">GB PARTY LOG</a>
        </h1>
        @if (Route::has('login'))
        <nav>
            @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
            <a href="{{ route('login') }}">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif @endauth
        </nav>
        @endif
    </header>
</body>

</html>
