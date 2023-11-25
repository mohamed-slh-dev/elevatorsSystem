<!DOCTYPE html>
<html lang="en" dir="rtl">
    


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Elevators system">
        <meta name="keywords" content="Elevators, system">
        <meta name="author" content="pixelstrap">
        <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
        <title>نظام إدارة المصاعد</title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">
        <!-- Themify icon-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify.css')}}">
        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">
        <!-- Feather icon-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather-icon.css')}}">
        <!-- Plugins css start-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">
        <!-- Plugins css Ends-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.css')}}">

        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
        <link id="color" rel="stylesheet" href="{{asset('assets/css/color-1.css')}}" media="screen">
        <!-- Responsive css-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">


        {{-- uthmanTaha font (ar) / Roboto (en) --}}
        <link rel="stylesheet" href="{{asset('assets/fonts/NotoSans/styles.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/Roboto/styles.css')}}">



        {{-- Customized style  --}}
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/customized-style.css')}}">

        {{-- login style --}}
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/login.css')}}">

    </head>



    <body class="rtl">

        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">    
                <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->
        


        {{-- ========================================================= --}}



        @yield('content')
        

       


        {{-- ========================================================= --}}




        {{-- ========================================================= --}}



        <!-- latest jquery-->
        <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
        <!-- feather icon js-->
        <script src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
        <!-- Sidebar jquery-->
        <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
        <script src="{{asset('assets/js/config.js')}}"></script>
        <!-- Bootstrap js-->
        <script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>

        <!-- Theme js-->
        <script src="{{asset('assets/js/script.js')}}"></script>
        <!-- Plugin used-->


        @yield('scripts')
    
  </body>
</html>