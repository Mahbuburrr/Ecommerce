<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- style -->
  
   

    
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
    
   <!-- google fonts link -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- front-awesome cdn-link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
      a{

        text-decoration:none !important;
      }
    </style>
    
</head>
<body>
  


@include('layouts.inc.frontnavbar')
  
          <div class="content">

            @yield('content')
          </div>

        
    <!-- Scripts -->
    <!-- caurosel jquery link -->
    <script src="{{asset('frontend/js/jquery-3.6.4.min.js')}}" defer></script>
    <!-- bootsstrap js link -->
    <script src="{{asset('frontend/js/bootstrap5.bundle.min.js')}}" defer></script>
    <!-- caurosel js link -->
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}" defer></script>
    <!-- Custom Js Script Link -->
    <script src="{{asset('frontend/js/custom.js')}}" defer></script>
    <!-- checkout.js -->
    <script src="{{asset('frontend/js/checkout.js')}}" defer></script>

    <!-- Jquery cdn script -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    

    <!-- js for sweet alert -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>

      swal("{{session('status')}}")
    </script>
    @endif
    @yield('scripts')
</body>
</html>
