<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/owl.carousel.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/style.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/animate.css"/>
    @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">


    @include('layouts.frontend.partial.header')

    @include('layouts.frontend.partial.slider')


        @yield('content')

    @include('layouts.frontend.partial.footer')


<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


<!--====== Javascripts & Jquery ======-->
<script src="{{asset('assets/frontend/')}}js/jquery-3.2.1.min.js"></script>
<script src="{{asset('assets/frontend/')}}js/bootstrap.min.js"></script>
<script src="{{asset('assets/frontend/')}}js/owl.carousel.min.js"></script>
<script src="{{asset('assets/frontend/')}}js/mixitup.min.js"></script>
<script src="{{asset('assets/frontend/')}}js/sly.min.js"></script>
<script src="{{asset('assets/frontend/')}}js/jquery.nicescroll.min.js"></script>
<script src="{{asset('assets/frontend/')}}js/main.js"></script>
    {!! Toastr::message() !!}
@stack('js')
</body>
</html>
