<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'ISKO-LIB')</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('images/PUPLogo.png') }}">
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

  @include('modals.admin-overdue-confirm')
  @stack('scripts')

  @include('modals.admin-overdue-success')
  @stack('scripts')

  @stack('scripts')
  <!-- @include('layouts.footer') -->
</body>

</html>