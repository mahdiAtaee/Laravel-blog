<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pageTitle}}</title>
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="../assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/vendor/cryptocurrency-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../assets/css/plugins/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body dir="rtl" style="text-align: right;">
    <div class="main-wrapper">
        <!-- Header Section Start -->
        <div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="index.html">
                            <img src="../assets/img/LOGO_1.png" alt="" style="width: 100px;">
                            <img src="../assets/img/LOGO_1.png" class="logo-light" alt="" style="width: 100px;">
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">

                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                                    <!--Header Search-->
                                    <div class="col-auto">

                                        <div class="header-search">

                                            <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>

                                            <div class="header-search-form">
                                                <form action="#">
                                                    <input type="text" placeholder="جستجو کنید">
                                                    <button><i class="zmdi zmdi-search"></i></button>
                                                </form>
                                                <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">

                                    <!--User-->
                                    @foreach ($contents as $data)
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                                <span class="avatar">
                                                    <img src="{{ gravatar()->image('$data->email') }}" alt="">
                                                    <span class="status"></span>
                                                </span>
                                                <span class="name mr-2">{{$data->name}}</span>
                                            </span>
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user" style="right: unset;left:0 !important;">
                                            <div class="head">
                                                <h5 class="name"><a href="#">{{$data->name}}</a></h5>
                                                <a class="mail" href="#">{{$data->email}}</a>
                                            </div>
                                            <div class="body">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-settings"></i>تنظیمات</a></li>
                                                    <li>
                                                        <a href="{{route('logout')}}">
                                                            <i class="zmdi zmdi-lock-open"></i>
                                                            خروج
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>
                                    @endforeach


                                </ul>

                            </div><!-- Header Notifications Area End -->

                        </div>
                    </div><!-- Header Right End -->

                </div>
            </div>
        </div><!-- Header Section End -->
        <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <li>
                            <a href="{{route('dashboard')}}">
                                <i class="ti-home"></i>
                                <span class="mr-2">داشبورد</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('posts')}}">
                                <i class="ti-palette"></i>
                                <span class="mr-2">پست ها</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('users')}}">
                                <i class="ti-stamp"></i>
                                <span class="mr-2">کاربران</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->


        @yield('backend')


        <!-- Footer Section Start -->
        <div class="footer-section">
            <div class="container-fluid">

                <div class="footer-copyright text-center">
                    <p class="text-body-light">1401 © مهدی عطایی
                    <p>
                </div>

            </div>
        </div><!-- Footer Section End -->
    </div>
    <!-- Global Vendor, plugins & Activation JS -->
    <script src="../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/tippy4.min.js.js"></script>
    <script src="../assets/js/plugins/dropify/dropify.min.js"></script>
    <script src="../assets/js/plugins/dropify/dropify.active.js"></script>
    <!--Main JS-->
    <script src="../assets/js/main.js"></script>
</body>

</html>