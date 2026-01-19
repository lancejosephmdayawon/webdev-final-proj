<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'ISKO-LIB')</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">

  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>

<body>
  @include('layouts.admin-header')
  @yield('content')

  @include('iskolib.modals.admin-accept-confirm')
  @stack('scripts')

  @include('iskolib.modals.admin-accept-success')
  @stack('scripts')

  @include('iskolib.modals.admin-decline-confirm')
  @stack('scripts')

  @include('iskolib.modals.admin-decline-success')
  @stack('scripts')

  @stack('scripts')
  <!-- @include('layouts.footer') -->
</body>

</html>