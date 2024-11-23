<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>CRUD Operation</title>
        @include('libraries.login.styles')
    </head>
  <body>

        @yield('content')

        @include('libraries.login.scripts')
        @stack('scripts')
  </body>
</html>
