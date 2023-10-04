<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-neutral-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
          <div class="sm:fixed sm:top-0 sm:left-0 p-6 text-right z-20 inline-block">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </div>

          
          
          <div class="w-screen h-screen flex flex-col space-y-8 items-center justify-center">
            <h1 class="text-5xl font-black dark:text-white">Barkin</h1>
            <x-animation-title>
              Deixa sua portaria&nbsp;
            </x-animation-title>
          </div>
          <div class="w-screen h-screen flex flex-col space-y-8 justify-center items-center">
            <h3 class="text-2xl font-black dark:text-white">Segurança sem esquentar a cabeça</h3>
            <p class="dark:text-white px-24">
              Não comprometa a segurança da sua casa ou empresa. Junte-se a nós e experimente a tranquilidade de estar sempre no controle.
            </p>

            <h4 class="pt-12 text-xl font-medium dark:text-white">Invista no futuro da segurança com a Barkin</h4>
            <x-primary-button>
              <a href="{{ route('register') }}">Comece agora</a>
            </x-primary-button>
          </div>
        </div>
    </body>
</html>
