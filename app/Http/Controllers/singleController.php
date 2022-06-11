<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class singleController extends Controller
{
    public function index($id)
    {
        $posts = DB::table('post')->where('id', $id)->get();
        $users = DB::table('users')->where('id', $id)->get();
        $all_posts = DB::table('post')->join('users', function ($join) {
            $join->on('post.author_id', '=', 'users.id');
        })->get(['post.*', 'users.name', 'users.email']);
        
        $pageTitle = 'post';
        return view('single', compact('pageTitle', 'posts', 'users', 'all_posts'));
    }
}
