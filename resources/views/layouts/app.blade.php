
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Basic page needs
    ============================================ -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
   
    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/frontend/assets/ico/favicon-16x16.png')}}"/>
  
   
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('assets/frontend/assets/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/js/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/themecss/lib.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/js/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/js/minicolors/miniColors.css')}}" rel="stylesheet">
    
    <!-- Theme CSS
    ============================================ -->
    <link href="{{ asset('assets/frontend/assets/css/themecss/so_searchpro.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/themecss/so_megamenu.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/themecss/so-categories.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/themecss/so-listing-tabs.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/themecss/so-category-slider.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/themecss/so-newletter-popup.css')}}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/assets/css/footer/footer1.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/header/header1.css')}}" rel="stylesheet">
    <link id="color_scheme" href="{{ asset('assets/frontend/assets/css/theme.css')}}" rel="stylesheet"> 
    <link href="{{ asset('assets/frontend/assets/css/responsive.css')}}" rel="stylesheet">

     <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>     
    <style type="text/css">
         body{font-family:'Poppins', sans-serif;}
    </style>
    <link rel="stylesheet" href="{{ asset('assets/frontend/style/css/custom.css')}}">
    <link href="{{ asset('assets/frontend/style/css/toastr.css')}}" rel="stylesheet" type="text/css">
    @yield('ecommerce_css')

</head>

<body class="common-home res layout-1">
    
    <div id="wrapper" class="wrapper-fluid banners-effect-3">
    

    <!-- Header Container  -->
   @include('front.files.header')
    <!-- //Header Container  -->
    
   
<!-- Main Container  -->
    @section('main')
    @show
<!-- //Main Container -->
   
    @include('front.files.footer')

   

    </div>
   

<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/owl-carousel/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/slick-slider/slick.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/themejs/libs.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/unveil/jquery.unveil.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/datetimepicker/moment.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/modernizr/modernizr-2.6.2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/minicolors/jquery.miniColors.min.js')}}"></script>

<!-- Theme files
============================================ -->

<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/themejs/application.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/themejs/homepage.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/themejs/toppanel.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/themejs/so_megamenu.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/assets/js/themejs/addtocart.js')}}"></script> 
 {{-- my script --}}
<script src="{{ asset('assets/frontend/style/js/toastr.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/cart.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/wishlist.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/comparelist.js')}}"></script>
<script src="{{ asset('assets/frontend/style/js/common.js')}}"></script> 
   <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
</script>
  <script>
      @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('message') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
               break;
        }
      @endif
</script>

@yield('ecommerce_js')



</body>
</html>