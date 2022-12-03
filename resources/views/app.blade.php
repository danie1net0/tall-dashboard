<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @isset($title)
      <title>{{ $title }} - {{ config('app.name') }}</title>
    @else
      <title>{{ config('app.name') }}</title>
    @endisset

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
  </head>

  <body>
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireScripts
  </body>
</html>
