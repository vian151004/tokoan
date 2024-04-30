<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href="{{ asset('Equation3/ltr/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('Equation3/ltr/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('Equation3/ltr/assets/css/users/login-2.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="login">

        @yield('content')   
        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('Equation3/ltr/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/assets/js/loader.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('Equation3/ltr/bootstrap/js/bootstrap.min.js') }}"></script>
        
        <!-- END GLOBAL MANDATORY SCRIPTS -->
    </body>
</html>
