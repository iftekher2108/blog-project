<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ asset('back_assets/css/custom-boot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/scss/main.min.css') }}">

</head>

<body>



    <script src="{{ asset('back_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back_assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/main.js') }}"></script>

</body>
</html>
