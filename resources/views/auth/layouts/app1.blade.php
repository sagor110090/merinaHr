<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
    {{-- <link rel="stylesheet" href="{{ asset('mdb/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/matrix-login.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

</head>
<body>
    <div class="page-wrapper chiller-theme toggled mt-5">    
        <div class="container">
            @yield('content')
        </div>      
    </div>
    {{-- <script src="js/jquery.min.js"></script>  
    <script src="js/matrix.login.js"></script>  --}}
</body>
</html>
