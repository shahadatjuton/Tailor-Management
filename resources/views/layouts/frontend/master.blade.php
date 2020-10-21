<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Tailor Management">
    <meta name="keywords" content="Tailor Management, eCommerce, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Tailor Management') }}</title>


    <!-- Favicon -->
    <link href="{{asset('assets/frontend/')}}/img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.carousel.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/style.css"/>
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/animate.css"/>
    @stack('css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- Page Preloder -->
{{--<div id="preloder">--}}
{{--    <div class="loader"></div>--}}
{{--</div>--}}

<!-- Header section -->
@include('layouts.frontend.partial.header')
<!-- Header section end -->


<!-- Hero section -->
{{--@include('layouts.frontend.partial.slider')--}}
<!-- Hero section end -->

@yield('content')
<!-- Footer section -->
@include('layouts.frontend.partial.footer')
<!-- Footer section end -->


<!--====== Javascripts & Jquery ======-->
<script src="{{asset('assets/frontend/')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/mixitup.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/sly.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{asset('assets/frontend/')}}/js/main.js"></script>
{!! Toastr::message() !!}
@stack('js')
</body>
</html>
