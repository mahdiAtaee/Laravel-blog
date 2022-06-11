@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card border-0 row no-gutters flex-column flex-md-row">
                            <div class="card-body d-flex align-items-center col-lg-5 p-md-5 p-3">
                                <div class="w-100">
                                    <img class="mb-lg-5 mb-4" src="assets/img/logo-dark.png" srcset="assets/img/logo-dark@2x.png 2x" alt="">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" placeholder="آدرس ایمیل" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="icon-field-right">
                                                <i class="fa fa-eye"></i>
                                                <input placeholder="رمز عبور" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember">مرا به خاطر بسپار</label>
                                                @if (Route::has('password.request'))
                                                <a class="text-dark float-right" href="{{ route('password.request') }}">
                                                    {{ __('رمز عبور خود را فراموش کرده اید?') }}
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-theme">ورود</button>
                                        </div>
                                        <div class="form-group mt-lg-5">
                                            <a href="{{route('register')}}" class="">ایجاد حساب جدید</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="flex-column col-lg-7">
                                <div class="position-relative">
                                    <img class="card-img-right flex-grow-1 " src="assets/img/cards/29a.jpg" alt="">
                                    <div class="login-content">
                                        <div class="h1 login-circle-logo font-weight-800 text-primary mb-4">ک</div>
                                        <h2 class="">آن را بهتر و سریعتر کنید</h2>
                                        <p>کلاب بهترین است از نگاه مشتریان تم فارست</p>
                                        <div class="row justify-content-center mt-lg-5">
                                            <div class="col-md-8">
                                                <ul class="list-group text-left">
                                                    <li class="list-group-item"><i class="fa fa-check pr-3 text-primary font-size-12"></i>برنامه ریزی ایده نوآوری و نسل</li>
                                                    <li class="list-group-item"><i class="fa fa-check pr-3 text-primary font-size-12"></i> بزرگ ارزش برند جهانی محصول است</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection