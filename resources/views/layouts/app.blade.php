<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ config('app.name') }} - @yield('title')</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ mix('css/flatpickr.css') }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-gray-100">

  @include('layouts.nav')

  <main class="relative">
    @yield('content')
  </main>

  {{-- @include('layouts.footer') --}}

  <!-- Flash Messages -->
  <x-flash key="success" />
  <x-flash key="danger" />

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
