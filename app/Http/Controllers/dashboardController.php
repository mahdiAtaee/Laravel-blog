<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index()
    {
        $CountUsers = DB::table('users')->count();
        $CountPosts = DB::table('post')->count();
        $Users = DB::table('users')->get();

        $pageTitle = "پنل ادمین";
        return view('dashboard', compact('pageTitle', 'CountPosts', 'CountUsers', 'Users'));
    }
}
