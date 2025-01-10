<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.8/cdn.js"></script>
    <title>{{ config('app.name') }} - @yield('title') </title>

    @vite('resources/css/app.css')

</head>

<body>
    @yield('content')
</body>

</html>
