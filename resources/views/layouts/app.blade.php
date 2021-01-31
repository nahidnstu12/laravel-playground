<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-Playground</title>
    {{-- CSS Files --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet"> --}}
    {{-- vendor css --}}
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendors/css/plugins/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendors/css/plugins/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendors/css/plugins/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendors/css/plugins/photoswipe.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('vendors/css/plugins/default-skin.css')}}">

    {{-- bootstrap css --}}
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/components.min.css')}}">

    {{-- core css --}}
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/core/login-register.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/core/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/core/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/core/gallery.min.css')}}">

   {{-- plugin css --}}
   <link rel="stylesheet" type="text/css" href="{{URL::asset('css/plugins/form-validation.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{URL::asset('css/plugins/daterange.min.css')}}">
   <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
   
   
   
</head>
<body>
    @yield('section')

    {{-- JS Body --}}
    {{-- vendor js --}}
    <script src="{{URL::asset('vendors/js/vendors.min.js')}}"></script>
    
    <script src="{{URL::asset('vendors/js/plugins/jqBootstrapValidation.js')}}"></script>
    <script src="{{URL::asset('vendors/js/plugins/select2.full.min.js')}}"></script>
    <script src="{{URL::asset('vendors/js/plugins/picker.js')}}"></script>
    <script src="{{URL::asset('vendors/js/plugins/picker.date.js')}}"></script>
    <script src="{{URL::asset('vendors/js/plugins/switchery.min.js')}}"></script>
    {{-- <script src="{{URL::asset('vendors/js/plugins/photoswipe.min.js')}}"></script> --}}
    {{-- <script src="{{URL::asset('vendors/js/plugins/photoswipe-ui-default.min.js')}}"></script> --}}

    {{-- core js --}}
    <script src="{{URL::asset('js/core/app.min.js')}}"></script>
    <script src="{{URL::asset('js/core/app-menu.min.js')}}"></script>

    {{-- scripts --}}
    <script src="{{URL::asset('js/scripts/form-login-register.min.js')}}"></script>
    <script src="{{URL::asset('js/scripts/account-setting.min.js')}}"></script>
    {{-- <script src="{{URL::asset('js/scripts/photoswipe-script.js')}}"></script> --}}

    {{-- toastr js --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script> --}}
   
    <script src="{{ asset('js/app.js') }}"></script>
   
</body>
</html>