<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Football Data App</title>
    <!-- css -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link 
    href="{{ asset('css/bootstrap.min.css') }}" 
    rel="stylesheet">    
  </head>
  <body>
    @include('partials.navbar')
    @yield('content')
    <!-- scripts -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/vue/app.js') }}"></script>
    @yield('extra-js')
  </body>
</html>