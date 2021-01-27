<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-Playground</title>
    {{-- CSS Files --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendors/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/core/login-register.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/core/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/core/vertical-menu.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    @yield('section')

    {{-- JS Body --}}
    <script src="{{URL::asset('vendors/vendors.min.js')}}"></script>
    <script src="{{URL::asset('vendors/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{URL::asset('js/core/app.min.js')}}"></script>
    <script src="{{URL::asset('js/core/app-menu.min.js')}}"></script>
    <script src="{{URL::asset('js/scripts/form-login-register.min.js')}}"></script>
    <script src="https://use.fontawesome.com/0850741b49.js"></script>
</body>
</html>