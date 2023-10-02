<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Barkin' }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        {{ $slot }}
    </body>
</html>
