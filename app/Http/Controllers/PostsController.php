<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts = DB::table('post')->join('users', function ($join) {
            $join->on('post.author_id', '=', 'users.id');
        })->get(['post.*', 'users.name']);

        $pageTitle = "پست ها";
        return view('posts', compact('Posts', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Users = DB::table('users')
            ->get();
        $pageTitle = 'ایجاد پست';
        return view('createPost', compact('pageTitle', 'Users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'عنوان نمی تواند خالی باشد',
            'title.max' => 'تعداد حروف مجاز 25 کاراکتر می باشد!',
            'slug.unique' => 'نامک تکراری است',
            'slug.required' => 'نامک نمی تواند خالی باشد',
            'content.required' => 'محتوا نمی تواند خالی باشد',
            'category.required' => 'دسته بندی نمی تواند خالی باشد',
            'thumbnail.required' => 'تصویر شاخص نمی تواند خالی باشد',
        ];

        $validateData = $request->validate([
            'title' => 'required|max:25',
            'slug' => 'required',
            'content' => 'required',
            'category' => 'required',
            'thumbnail' => 'required',
        ], $messages);

        $posts = new Posts([
            'author_id' => $request->get('author_id'),
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'thumbnail' => $request->get('thumbnail'),
        ]);

        try {
            $posts->save();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case '23000':
                    $msg = 'عنوان تکراری است';
                    break;
            }
            return redirect(route('posts'))->with('warning', $msg);
        }

        $msg = "ایجاد پست جدید موفقیت آمیز بود";
        return redirect(route('posts'))->with('success', $msg);

        // $request->validate([
        //     'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // $imageName = time() . '.' . $request->thumbnail->extension();
        // $request->thumbail->move(public_path('images'), $imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts, $id)
    {
        $post = Posts::where('id', $id)->firstOrFail();
        $users = DB::table('users')->get();
        $pageTitle = "ویرایش اطلاعات پست";
        return view('editPost', compact('pageTitle', 'post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostsRequest  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts, $id)
    {
        $messages = [
            'title.required' => 'عنوان نمی تواند خالی باشد',
            'title.max' => 'تعداد حروف مجاز 25 کاراکتر می باشد!',
            'slug.unique' => 'نامک تکراری است',
            'slug.required' => 'نامک نمی تواند خالی باشد',
            'content.required' => 'محتوا نمی تواند خالی باشد',
            'category.required' => 'دسته بندی نمی تواند خالی باشد',
            'thumbnail.required' => 'تصویر شاخص نمی تواند خالی باشد',
        ];

        $validateData = $request->validate([
            'title' => 'required|max:25',
            'slug' => 'required',
            'content' => 'required',
            'category' => 'required',
            'thumbnail' => 'required',
        ], $messages);

        $posts = Posts::find($id);
        $posts->author_id = $request->author_id;
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->content = $request->content;
        $posts->thumbnail = $request->thumbnail;
        $posts->category = $request->category;
        try {
            $posts->update();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case '23000':
                    $msg = 'عنوان تکراری است';
                    break;
            }
            return redirect(route('posts'))->with('warning', $msg);
        }
        $msg = "ویرایش موفقیت آمیز بود";
        return redirect(route('posts'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts, $id)
    {
        $posts = Posts::find($id);
        $posts->delete();
        $msg = "حذف پست موفقیت آمیز بود";
        return redirect(route('posts'))->with('success', $msg);
    }
}
