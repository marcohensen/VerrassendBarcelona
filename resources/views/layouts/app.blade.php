<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>

    <!-- Scripts -->


    <!-- Styles -->
    <link href="https://ams-01.diegor.nl/semantic/dist/semantic.min.css" rel="stylesheet">
    <script src="https://ams-01.diegor.nl/semantic/dist/semantic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <link href="{{ asset('css/VerassendBarcelona.css') }}" rel="stylesheet">;
</head>
<body style="background-color: #edec00;" class="Site">
<header>
    @include('includes.header')
</header>

<main class="Site-content">
    <br><br><br>
    @yield('content')
</main>

<footer>
    @include('includes.footer')
</footer>
</body>
</html>
