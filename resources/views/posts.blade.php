@extends('layouts.backend')
@section('backend')

<!-- Content Body Start -->
<div class="content-body">

    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-2">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-3">
            <div class="page-heading">
                <h3 class="title">خانه <span>/ دسته بندی</span></h3>
            </div>
        </div><!-- Page Heading End -->
        @if (session('success'))
        <div class="alert alert-success show-message" role="alert">
            {{session('success')}}
            <button class="close" data-dismiss="alert"><i class=" zmdi zmdi-close"></i></button>
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-danger show-message" role="alert">
            کد خطا : {{session('warning')}}
            <button class="close" data-dismiss="alert"><i class="zmdi zmdi-close"></i></button>
        </div>
        @endif
    </div><!-- Page Headings End -->

    <div class="col-lg-12 col-12 mb-4" dir='rtl'>
        <div class="box">
            <div class="box-head d-flex align-items-center justify-content-between">
                <h4 class="title">{{$pageTitle}}</h4>
                <a href="{{route('create')}}" class="btn btn-secondry">ایجاد دسته بندی جدید</a>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr style="text-align: center;">
                            <th style="width: 25px;">ID</th>
                            <th>نویسنده</th>
                            <th>عنوان</th>
                            <th>نامک</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Posts as $Post)
                        <tr style="text-align: center;">
                            <th style="width: 25px;">
                                <a href="{{route('post',$Post->id)}}">
                                    {{$Post->id}}
                                </a>
                            </th>
                            <td>{{$Post->name}}</td>
                            <td>
                                <a href="{{route('post',$Post->id)}}">
                                    {{$Post->title}}
                                </a>
                            </td>
                            <td>{{$Post->slug}}</td>
                            <td class="controll">
                                <a href="{{route('edit',$Post-> id)}}" class="btn btn-warning btn-sm">ویرایش</a>
                                <a href="{{route('destroy',$Post-> id)}}" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمِن هستید؟')">حذف</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><!-- Content Body End -->

@endsection