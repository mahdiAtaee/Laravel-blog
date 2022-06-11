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
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="../../assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/vendor/cryptocurrency-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/vendor/bootstrap.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../../assets/css/plugins/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">

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
                            <img src="../../assets/img/LOGO_1.png" alt="" style="width: 100px;">
                            <img src="../../assets/img/LOGO_1.png" class="logo-light" alt="" style="width: 100px;">
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
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                                <span class="avatar">
                                                    <img src="../../assets/images/avatar/avatar-1.jpg" alt="">
                                                    <span class="status"></span>
                                                </span>
                                                <span class="name">طاهر نصیری</span>
                                            </span>
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><a href="#">طاهر نصیری</a></h5>
                                                <a class="mail" href="#">mailnam@mail.com</a>
                                            </div>
                                            <div class="body">
                                                <ul>
                                                    <li><a href="#"><i class="zmdi zmdi-settings"></i>تنظیمات</a></li>
                                                    <li><a href="#"><i class="zmdi zmdi-lock-open"></i>خروج</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </li>

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
                            <a href="#"><i class="ti-home"></i> <span class="mr-2">داشبورد</span></a>
                        </li>
                        <li>
                            <a href="widgets.html"><i class="ti-palette"></i> <span class="mr-2">ابزارک ها</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-stamp"></i> <span class="mr-2">آیکن ها</span></a>
                        </li>

                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->


        <div class="col-lg-12 col-12" style="margin-top: 11rem !important;">

            <h6 class="mb-15">ویرایش پست</h6>

            <form action="{{route('update',$post->id)}}" method="post">
                @method('put')
                @csrf
                <div class="row mbn-15">
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="title" placeholder="عنوان" value="{{$post->title}}">
                        @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="slug" placeholder="نامک" value="{{$post->slug}}">
                        @error('slug')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="category" placeholder="دسته بندی" value="{{$post->category}}">
                        @error('category')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <input type="text" class="form-control" name="thumbnail" placeholder="تصویر" value="{{$post->category}}">
                        @error('thumbnail')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <textarea class="form-control" name="content" placeholder="محتوا">{{$post->content}}</textarea>
                        @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <select class="form-control" name="author_id">
                            <option>نویسنده</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" <?php if ($user->id == $post->author_id) { {
                                                                    echo "selected='true'";
                                                                }
                                                            } ?>>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="submit" class="btn btn-primary w-100" value="ایجاد">
                    </div>
                </div>
            </form>

        </div>
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
    <script src="../../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/tippy4.min.js.js"></script>
    <script src="../../assets/js/plugins/dropify/dropify.min.js"></script>
    <script src="../../assets/js/plugins/dropify/dropify.active.js"></script>
    <!--Main JS-->
    <script src="../../assets/js/main.js"></script>
</body>

</html>