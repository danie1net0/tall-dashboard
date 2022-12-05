<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
      <title>@yield('title') - {{ config('app.name') }}</title>
    @else
      <title>{{ config('app.name') }}</title>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @livewireScripts
  </head>

  <body class="h-full">
    <main>
      {{ $slot }}
    </main>
  </body>
</html>
