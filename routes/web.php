<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\singleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/posts', [PostsController::class, 'index'])->name('posts');
    Route::get('/dashboard/create', [PostsController::class, 'create'])->name('create');
    Route::post('/store', [PostsController::class, 'store'])->name('store');
    Route::put('/update/{post}', [PostsController::class, 'update'])->name('update');
    Route::get('/dashboard/edit/{post}', [PostsController::class, 'edit'])->name('edit');
    Route::get('/dashboard/delete/{post}', [PostsController::class, 'destroy'])->name('destroy');
    Route::get('/dashboard/users', [UsersController::class, 'index'])->name('users');
    Route::get('/dashboard/user/create', [UsersController::class, 'create'])->name('create.user');
    Route::post('/users/store', [UsersController::class, 'store'])->name('store.user');
    Route::put('/users/update/{user}', [UsersController::class, 'update'])->name('update.user');
    Route::get('/dashboard/user/edit/{user}', [UsersController::class, 'edit'])->name('edit.user');
    Route::get('/dashboard/user/delete/{post}', [UsersController::class, 'destroy'])->name('destroy.user');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/logout', [LogoutController::class, 'index'])->middleware('auth')->name('logout');
Route::get('/post/{id}', [singleController::class, 'index'])->name('post');


Route::get('/', function () {
    $posts = DB::table('post')->paginate(2);

    return view('welcome', compact('posts'));
});
Auth::routes();
