<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    @include('partials.navbar')
        @yield('container')
    @include('partials.footer')
</body>
<script src="../js/script.js"></script>
</html>