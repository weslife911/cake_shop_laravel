<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrt-token" content="{{ csrf_token() }}" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config("app.name", "Cake") }} | {{ $title }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="icon" href="{{ asset("img/logo.png") }}" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/flaticon.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/barfiller.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/magnific-popup.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/elegant-icons.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/nice-select.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/owl.carousel.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/slicknav.min.css") }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" type="text/css">
</head>

<body>

    <x-header/>

    {{ $slot }}

    <x-footer/>

    <x-header_search/>

    <script src="{{ asset("js/jquery-3.3.1.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/jquery.nice-select.min.js") }}"></script>
    <script src="{{ asset("js/jquery.barfiller.js") }}"></script>
    <script src="{{ asset("js/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset("js/jquery.slicknav.js") }}"></script>
    <script src="{{ asset("js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("js/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>

</body>

</html>