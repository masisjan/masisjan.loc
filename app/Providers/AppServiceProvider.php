<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Money;
use App\Models\Post;
use App\Models\Word;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share('words', Word::all());
        View::share('money', Money::latest()->first());
        View::share('posts', Post::where('publish', 'yes')->latest()->take(6)->get());
        View::share('ads', Ad::inRandomOrder()->first());
    }
}
