<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="mahdi ataee">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>{{$pageTitle}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <!--basic styles-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/vendor/custom-icon/style.css" rel="stylesheet">
    <link href="../assets/vendor/vl-nav/css/core-menu.css" rel="stylesheet">
    <link href="../assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!--custom styles-->
    <link href="../assets/css/main.css" rel="stylesheet">

    <!--[if (gt IE 9) |!(IE)]><!-->
    <!--<link rel="stylesheet" href="../assets/vendor/custom-nav/css/effects/fade-menu.css"/>-->
    <link rel="stylesheet" href="../assets/vendor/vl-nav/css/effects/slide-menu.css" />
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
                            <img class="logo-light" style="width: 60px;height: auto;" src="../assets/img/LOGO_1.png" alt="Logo">
                            <img class="logo-dark" style="width: 60px;height: auto;" src="../assets/img/LOGO_1.png" alt="Logo">
                        </a>
                    </div>
                    <!--brand end-->
                    <!--start responsive nav toggle button-->
                    <div class="nav-btn hamburger hamburger--slider js-hamburger mt-4">
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
    <section class="section-gap pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <section class="section-gap px-lg-5">
                        @foreach ($posts as $post)
                        <div class="hero-img bg-overlay rounded overflow-hidden" data-overlay="2" style="background-image: url({{$post->thumbnail}});"></div>
                        @endforeach
                        <div class="container">
                            <div class="row align-items-center text-white">
                                <div class="col-md-8">
                                    @foreach ($posts as $post)
                                    <h3 class="">{{$post->title}}</h3>
                                    <div class="meta font-lora my-4 text-white">
                                        دسته بندی : <a href="#">{{$post->category}}</a><br>
                                        <span class="meta-separator"></span>
                                        <a href="#">{{$post->created_at}}</a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--page title end-->

    <!--blog start-->
    <section class="section-gap pb-0">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-8">
                    <div class="blog-post border-0 blog-single">
                        @foreach ($posts as $post)
                        <p>{{$post->content}}</p>
                        <h6 class="mb-0">برچسب ها:
                            <a href="#" class="badge badge-pill badge-dark">{{$post->slug}}</a>
                        </h6>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <div class="component-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($users as $user)
                        <div class="col-md-3 text-md-center">
                            <img class="avatar-lg rounded-circle mb-3 d-inline-block" src="{{ gravatar('$user->email') }}" alt="{{$user->name}}">
                        </div>
                        <div class="col-md-9">
                            <h5 class="font-lora font-weight-normal mb-4">{{$user->user_description}}</h5>
                            <div class="border-left mb-3"> &nbsp;</div>
                            <strong class="text-primary">{{$user->name}}</strong>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-gap bg-gray">
        <div class="container">
            <div class="row mb-lg-5 mb-4">
                <div class="col-md-8">
                    <h5>پست های اخیر</h5>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($all_posts as $post)
                <div class="col-md-4">
                    <div class="card border-0 mb-md-0 mb-3 box-hover">
                        <a href="{{route('post',$post->id)}}">
                            <img class="card-img-top" src="{{$post->thumbnail}}" alt="{{$post->title}}">
                        </a>
                        <div class="card-body py-4">
                            <a href="{{route('post',$post->id)}}" class="mb-2 d-block">{{$post->category}}</a>
                            <h5 class="mb-4"><a href="{{route('post',$post->id)}}">{{$post->title}}</a></h5>
                            <div class="mb-4">
                                <p>{{ \Illuminate\Support\Str::limit($post->content, 100, $end='...') }}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <img class="avatar-sm rounded-circle mr-3" src="{{ gravatar('$post->email') }}" alt="avatar">
                                <span>{{$post->name}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--blog end-->


    <!--footer start-->
    <footer class="app-footer bg-dark pb-0 border-0 text-md-left text-center">
        <div class="container">
            <div class="row align-items-center mb-md-5 mb-3">
                <div class="col-md-4">
                    <img class="pr-3 mb-md-0 mb-4" src="../assets/img/LOGO_1.png" style="width: 120px;height: auto;" alt="logo">
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
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/vl-nav/js/vl-menu.js"></script>
    <script src="../assets/vendor/wow.min.js"></script>

    <!--basic scripts initialization-->
    <script src="../assets/js/scripts.js"></script>

</body>

</html>