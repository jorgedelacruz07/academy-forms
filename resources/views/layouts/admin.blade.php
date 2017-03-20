<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="csrf-param" content="_token">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', config('app.name'))</title>

  <!-- Styles -->
  <link rel="stylesheet" href="/uikit/css/uikit.min.css" />
  <link rel="stylesheet" href="/css/master.css" />

  <link rel="shortcut icon" href="/images/favicon.ico">

  <!-- Scripts -->
  <script src="/js/jquery.min.js"></script>
  <script src="/uikit/js/uikit.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ujs/1.2.2/rails.min.js"></script>

  <script>
  window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
  ]) !!};
  </script>
</head>
<body>
  @include('_header')
  <div class="uk-container uk-margin-top">
    @yield('content')
  </div>
  @include('_footer')
  <script src="/js/master.js"></script>
</body>
</html>
