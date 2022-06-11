<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // dd($this->currUser);

        view()->composer('layouts.backend', function ($view) {
            $this->UserId = Auth::user()->id;
            $this->currUser = DB::table('users')->where('id', $this->UserId)->get();
            $view->with(['contents' => $this->currUser]);
        });
    }
}
