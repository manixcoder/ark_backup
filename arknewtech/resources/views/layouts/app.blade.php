<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Arknewtech - Login</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('public/assets/fonts/fonts.css') }}" rel="stylesheet">
</head>

<body>
  <div class="arklogin-sec text-center">
    @yield('content') </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
</body>

</html>