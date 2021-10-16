<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMP Construction Corporation</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="{{ asset('/template/css/lineicons.css') }}"  rel="stylesheet"/>
        <link href="{{ asset('/template/css/odometer.min.css') }}"  rel="stylesheet"/>
        <link href="{{ asset('/template/css/fancybox.min.css') }}"  rel="stylesheet"/>
        <link href="{{ asset('/template/css/swiper.min.css') }}"  rel="stylesheet"/>
        <link href="{{ asset('/template/css/bootstrap.min.css') }}"  rel="stylesheet"/>
        <link href="{{ asset('/template/css/style.css') }}" rel="stylesheet">

        <link rel="shortcut icon" href="{{ asset('template/images/favlogo.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('template/images/favlogo.png') }}">            
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        
    </head>
    <body>
        <div id="app">
            <home-page></home-page>
        </div>
    </body>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/swiper.min.js') }}"></script>
    <script src="{{ asset('template/js/fancybox.min.js') }}"></script>
    <script src="{{ asset('template/js/odometer.min.js') }}"></script>
    <script src="{{ asset('template/js/isotope.min.js') }}"></script>
    <script src="{{ asset('template/js/scripts.js') }}"></script>


</html>
