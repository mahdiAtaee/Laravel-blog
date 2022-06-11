@extends('layouts.backend')
@section('backend')
<!-- Page Headings Start -->
<div class="row justify-content-center align-items-center mt-5" style="margin-top: 7rem !important;">

    <!-- Page Heading Start -->
    <div class="col-12 col-lg-10 my-5">
        <div class="page-heading">
            <div class="row mbn-30">

                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 my-3">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>تعداد کاربران</h4>
                            <a href="/admin/users" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <span style="font-size: 2rem;">{{$CountUsers}}</span>
                        </div>
                    </div>
                </div><!-- Top Report End -->

                <!-- Top Report Start -->
                <div class="col-12 col-md-6 col-lg-6 my-3">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>تعداد مطالب</h4>
                            <a href="/admin/posts" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <span style="font-size: 2rem;">{{$CountPosts}}</span>
                        </div>
                    </div>
                </div><!-- Top Report End -->
            </div>
        </div>
    </div><!-- Page Heading End -->

</div><!-- Page Headings End -->

<div class="container">

    <div class="row">
        <div class="col-lg-5 col-12 mb-20">

            <h6 class="mb-15" style="font-size: 1.2rem; margin-bottom: 2rem !important;">پیش نویس سریع</h6>

            <form action="{{route('store')}}" method="post">
                @csrf
                <div class="row my-2">
                    <div class="col-12 my-2">
                        <input type="text" class="form-control" placeholder="عنوان مطلب" name="title">
                    </div>
                    <div class="col-12 my-2">
                        <textarea class="form-control" placeholder="محتوای مطلب" name="content"></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <select class="form-control" name="author_id">
                            <option>نویسنده</option>
                            @foreach($Users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="button button-primary mr-3">
                        <span>ذخیره سازی</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection