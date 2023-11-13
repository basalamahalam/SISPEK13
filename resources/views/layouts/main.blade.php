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
    <a
      href="#home"
      class="h-14 w-14 bg-primary flex justify-center items-center rounded-full fixed z-index[9999] bottom-4 right-10 lg:right-4 p-4 hover:animate-pulse"
      id="to-top"
    >
      <span class="block w-5 h-5 rotate-45 border-t-2 border-l-2 mt-2"></span>
    </a>
</body>
<script src="../js/script.js"></script>
</html>