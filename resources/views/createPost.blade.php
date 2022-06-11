@extends('layouts.backend')
@section('backend')
<div class="col-lg-12 col-12" style="margin-top: 11rem !important;">

    <h6 class="mb-15">ایجاد پست جدید</h6>

    <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mbn-15">
            <div class="col-12 mb-3">
                <input type="text" class="form-control" name="title" placeholder="عنوان">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" name="slug" placeholder="نامک">
                @error('slug')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" name="category" placeholder="دسته بندی">
                @error('category')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <input type="text" class="form-control" name="thumbnail" placeholder="تصویر">
                @error('thumbnail')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <textarea class="form-control" name="content" placeholder="محتوا"></textarea>
                @error('content')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <select class="form-control" name="author_id">
                    <option>نویسنده</option>
                    @foreach($Users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <input type="submit" class="btn btn-primary w-100" value="ایجاد">
            </div>
        </div>
    </form>

</div>
@endsection