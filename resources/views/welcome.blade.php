<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <title>بلاگ استاندارد</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <!--basic styles-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/custom-icon/style.css" rel="stylesheet">
    <link href="assets/vendor/vl-nav/css/core-menu.css" rel="stylesheet">
    <link href="assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!--custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">

    <!--[if (gt IE 9) |!(IE)]><!-->
    <!--<link rel="stylesheet" href="assets/vendor/custom-nav/css/effects/fade-menu.css"/>-->
    <link rel="stylesheet" href="assets/vendor/vl-nav/css/effects/slide-menu.css" />
    <!--<![endif]-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136585988-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-136585988-1');
    </script>
</head>

<body class="bg-gray">


    <!--header start-->
    <header class="app-header transparent-header transparent-header-dark-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--<div class="branding-wrap">-->
                    <!--brand start-->
                    <div class="navbar-brand float-left">
                        <a class="" href="index-2.html">
                            <img class="logo-light" style="width: 60px;height: auto;" src="assets/img/LOGO_1.png" alt="Logo">
                            <img class="logo-dark" style="width: 60px;height: auto;" src="assets/img/LOGO_1.png" alt="Logo">
                        </a>
                    </div>
                    <!--brand end-->
                    <!--start responsive nav toggle button-->
                    <div class="nav-btn hamburger hamburger--slider js-hamburger ">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <!--end responsive nav toggle button-->
                    <!--</div>-->

                    <!--top mega menu start-->
                    <nav id="vl-menu">
                        <!--start nav-->
                        <ul class="vlmenu light-sub-menu slide-effect float-right">
                            @if (Route::has('login'))
                            <li class="hidden fixed top-0 right-0 px-6 sm:block">
                                @auth
                                <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">خانه</a>
                                @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                                @endauth
                            </li>
                            @endif
                        </ul>
                        <!--end nav-->
                    </nav>
                    <!--top mega menu end-->
                </div>
            </div>
        </div>
    </header>
    <!--header end-->

    <!--page title start-->
    <section class="section-gap section-top pb-0 bg-white text-center">
        <!--<div class="hero-img bg-overlay" data-overlay="1" style="background-image: url(assets/img/price-banner.jpg);"></div>-->
        <div class="container">
            <div class="row justify-content-md-center align-items-center">
                <div class="col-md-7">
                    <!-- heading -->
                    <h2 class="">
                        وبلاگ و مقاله
                    </h2>
                    <p class="lead text-muted">
                        وبلاگ ساده برای پروژه نهایی درس مبتنی بر وب
                    </p>
                </div>
                <div class="col-md-8">
                    <img src="assets/img/blog/blog-banner.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->

    <!--blog start-->
    <section class="section-gap">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-8">
                    @foreach ($posts as $post)
                    <div class="blog-post">
                        <a href="post/{{$post->id}}">
                            <img class="rounded mb-lg-5 mb-4" src="{{$post->thumbnail}}" alt="card image" />
                        </a>
                        <h3 class="">
                            <a href="post/{{$post->id}}">{{$post->title}}</a>
                        </h3>
                        <div class="meta font-lora my-4">
                            <a href="post/{{$post->id}}">{{$post->slug}}</a>
                            <span class="meta-separator"></span>
                            <a href="post/{{$post->id}}">{{$post->created_at}}</a>
                        </div>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                    </div>
                    @endforeach
                    <!--pagination-->
                    {{$posts->links("pagination::bootstrap-5")}}
                </div>
            </div>
        </div>
    </section>
    <!--blog end-->


    <!--footer start-->
    <footer class="app-footer bg-dark pb-0 border-0 text-md-left text-center">
        <div class="container">
            <div class="row align-items-center mb-md-5 mb-3">
                <div class="col-md-4">
                    <img class="pr-3 mb-md-0 mb-4" src="assets/img/LOGO_1.png" style="width: 120px;height: auto;" alt="logo">
                </div>
                <div class="col-md-8">
                    <span class="font-lora h5 font-weight-normal">-بلاگ با خصوصیات کامل</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-md-0 mb-4">
                    <p class="text-muted">بلاگ و کامل برای پروژه نهایی درس مبتنی بر وب</p>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">حرکت کن</h6>
                    <ul class="footer-link">
                        <li class="d-block"><a href="#">خانه</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">پلتفرم</h6>
                    <ul class="footer-link">
                        <li class="d-block"><a href="#">iOS مک و </a></li>
                        <li class="d-block"><a href="#">آندروید و جاوا</a></li>
                        <li class="d-block"><a href="#">ویندوز</a></li>
                        <li class="d-block"><a href="#">لینوکس</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">جامعه</h6>
                    <ul class="footer-link">
                        <li class="d-block"><a href="#">پایگاه دانش</a></li>
                        <li class="d-block"><a href="#">یک کارشناس استخدام کنید</a></li>
                        <li class="d-block"><a href="#">گفت و گو</a></li>
                        <li class="d-block"><a href="#">تماس</a></li>
                    </ul>
                </div>
                <div class="col-md-2 mb-md-0 mb-4">
                    <h6 class="mb-4">شرکت</h6>
                    <ul class="footer-link">
                        <li class="d-block"><a href="#">درباره شرکت</a></li>
                        <li class="d-block"><a href="#">تاریخ</a></li>
                        <li class="d-block"><a href="#">تیم</a></li>
                        <li class="d-block"><a href="#">سرمایه گذاری</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-secondary-footer mt-md-5 mt-3">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <span class="copyright">© 2022 مهدی عطایی. تمام حقوق محفوظ است.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

    <!--basic scripts-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/vl-nav/js/vl-menu.js"></script>
    <script src="assets/vendor/wow.min.js"></script>

    <!--basic scripts initialization-->
    <script src="assets/js/scripts.js"></script>

</body>

</html>