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

  </head>
  <body class="rtl">
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->

    <div class="page-wrapper login--form-bg" id="pageWrapper" style="background: url('{{asset('assets/images/background/ordinary-2.svg')}}'); background-size:cover; background-position:top; background-attachment: fixed; background-repeat: no-repeat">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper w-100">
                <a href="#">
                    <h4 class='mb-0 text-center'>
                      <img src="{{asset('assets/images/logo/main-logo.png')}}" alt="" class='logo--app'>
                    </h4>
                </a>
            </div>
            <div class="dark-logo-wrapper">
                <a href="#">
                    {{-- <h4 class='mb-0'>نظام إدارة المصاعد.</h4> --}}
                    <img src="{{asset('assets/images/logo/main-logo.png')}}" alt="" class='logo--app'>
                </a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
          </div>
          {{-- <div class="left-menu-header col">
            <ul>
              <li>
                <form class="form-inline search-form">
                  <div class="search-bg"><i class="fa fa-search"></i>
                    <input class="form-control-plaintext" placeholder="Search here.....">
                  </div>
                </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
              </li>
            </ul>
          </div> --}}
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              {{-- <li class="onhover-dropdown">
                <div class="bookmark-box"><i data-feather="star"></i></div>
                <div class="bookmark-dropdown onhover-show-div">
                  <div class="form-group mb-0">
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div>
                      <input class="form-control" type="text" placeholder="Search for bookmark...">
                    </div>
                  </div>
                  <ul class="m-t-5">
                    <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="inbox"></i>Email<span class="pull-right"><i data-feather="star"></i></span></li>
                    <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="message-square"></i>Chat<span class="pull-right"><i data-feather="star"></i></span></li>
                    <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="command"></i>Feather Icon<span class="pull-right"><i data-feather="star"></i></span></li>
                    <li class="add-to-bookmark"><i class="bookmark-icon" data-feather="airplay"></i>Widgets<span class="pull-right"><i data-feather="star">   </i></span></li>
                  </ul>
                </div>
              </li> --}}
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
                <ul class="notification-dropdown onhover-show-div">
                  <li>
                    <p class="f-w-700 mb-0"> التنبيهات <span class="pull-right badge badge-primary badge-pill">0</span></p>
                  </li>
                 
                </ul>
              </li>
              <li class='d-none'>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              {{-- <li class="onhover-dropdown"><i data-feather="message-square"></i>
                <ul class="chat-dropdown onhover-show-div">
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/4.jpg" alt="">
                      <div class="media-body"><span>Ain Chavez</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12">32 mins ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/1.jpg" alt="">
                      <div class="media-body"><span>Erica Hughes</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12">58 mins ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/2.jpg" alt="">
                      <div class="media-body"><span>Kori Thomas</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12">1 hr ago</p>
                    </div>
                  </li>
                  <li class="text-center"> <a class="f-w-700" href="javascript:void(0)">See All     </a></li>
                </ul>
              </li> --}}
              <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button"><a href="{{route('logout')}}"><i data-feather="log-out"></i>تسجيل خروج</a></button>
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
      <!-- Page Header Ends -->
      <!-- Page Body Start -->
      <div class="page-body-wrapper horizontal-menu">


        <!-- Page Sidebar Start-->
        <header class="main-nav">

          {{-- profile image --}}
          <div class="sidebar-user text-center pt-5 pb-3">
            <img class="rounded-circle of-cover" style="height: 80px; width: 80px; border-color: #0f9a74" src="{{asset('storage/users/'.session('user_img'))}}" alt="">
            <div class="badge-bottom"></div>
          </div>



          {{-- navbar --}}
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">           
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title d-none">
                    <div>
                      <h6>الصفحات</h6>
                    </div>
                  </li>

                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('dashboard')}}">
                      <i data-feather="monitor"></i><span>الرئيسية</span>
                    </a>
                  </li>

                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('employees')}}">
                      <i data-feather="users"></i><span>الموظفين </span>
                    </a>
                  </li>

                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('parts')}}">
                      <i data-feather="package"></i><span>الأجزاء </span>
                    </a>
                  </li>


                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('elevators')}}">
                      <i data-feather="sliders"></i><span>المصاعد </span>
                    </a>
                  </li>



                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('customers')}}">
                      <i data-feather="user-plus"></i><span>العملاء </span>
                    </a>
                  </li>

                  
                  
                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('suppliers')}}">
                      <i data-feather="link"></i><span>الموردين</span>
                    </a>
                  </li>



                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('installationsQuotations')}}">
                      <i data-feather="settings"></i><span>أعمال التركيب </span>
                    </a>
                  </li>

                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('maintenance')}}">
                      <i data-feather="shield"></i><span>أعمال الصيانة </span>
                    </a>
                  </li>

                  
                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('financials')}}">
                      <i data-feather="dollar-sign"></i><span>الإجراءات المالية</span>
                    </a>
                  </li>

                   

                  <li class="dropdown">
                    <a class="nav-link menu-title link-nav" href="{{route('users')}}">
                      <i data-feather="users"></i><span>مستخدمين النظام</span>
                    </a>
                  </li>
     

                
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->


        {{-- ========================================================= --}}


        
        {{-- page body --}}
        <div class="page-body home--form-bg">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row mt-4">

                
                {{-- page alerts --}}
                @include('alerts.alerts')


                {{-- page title --}}
                <div class="col-sm-6 mb-5">
                  <h3 class="form--subheading d-inline-block pb-2">@yield('title')</h3>

                  @hasSection('subtitle')
                  <span class='app--subtitle d-inline-block ms-1'>@yield('subtitle')</span>
                  @endif

                </div>


                {{-- page content --}}
                @yield('content')

              </div>
            </div>
          </div>
        </div>
        {{-- end page body --}}



        {{-- ========================================================= --}}


        <!-- footer-->
        <footer class="footer d-none">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Developed by M&A</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted </p>
              </div>
            </div>
          </div>
        </footer>


        {{-- ========================================================= --}}


      </div>
    </div>
    {{-- end body --}}



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
    <!-- Plugins JS start-->
    <script src="{{asset('assets/js/chart/apex-chart/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>


    <script src="{{asset('assets/js/prism/prism.min.js')}}"></script>
    <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('assets/js/custom-card/custom-card.js')}}"></script>
    <script src="{{asset('assets/js/tooltip-init.js')}}"></script>

    <script src="{{asset('assets/js/chart-widget.js')}}"></script>
    
    <script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/select2/select2-init.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    
    <script src="{{asset('assets/js/clipboard/clipboard.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>

    <script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/theme-customizer/customizer.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->

    @yield('scripts')
    
  </body>
</html>