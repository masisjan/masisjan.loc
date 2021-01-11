<?php

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

Route::get('/', "App\Http\Controllers\HomeController@index")->name('index');
Route::get('/news', "App\Http\Controllers\PostController@news")->name('news');
Route::get('/news/{id}', "App\Http\Controllers\PostController@news_show")->name('news.show');

Route::group( ["middleware" => ["auth", "verified"]], function() {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::redirect('/dashboard', '/admins');

    Route::prefix('admins')->group(function () {

        Route::get('/', "App\Http\Controllers\AdminController@index")->name('admins.index');
        Route::get('/all', "App\Http\Controllers\AdminController@all")->name('admins.all');

        Route::get('/menus', "App\Http\Controllers\MenuController@index")->name('admins.menus.index');
        Route::post('/menus', "App\Http\Controllers\MenuController@store")->name('admins.menus.store');
        Route::get('/menus/create', "App\Http\Controllers\MenuController@create")->name('admins.menus.create');
        Route::get('/menus/{id}', "App\Http\Controllers\MenuController@show")->name('admins.menus.show');
        Route::delete('/menus/{id}', "App\Http\Controllers\MenuController@destroy")->name('admins.menus.destroy');
        Route::put('/menus/{id}', "App\Http\Controllers\MenuController@update")->name('admins.menus.update');
        Route::get('/menus/{id}/edit', "App\Http\Controllers\MenuController@edit")->name('admins.menus.edit');

        Route::get('/words', "App\Http\Controllers\WordController@index")->name('admins.words.index');
        Route::post('/words', "App\Http\Controllers\WordController@store")->name('admins.words.store');
        Route::get('/words/create', "App\Http\Controllers\WordController@create")->name('admins.words.create');
        Route::get('/words/{id}', "App\Http\Controllers\WordController@show")->name('admins.words.show');
        Route::delete('/words/{id}', "App\Http\Controllers\WordController@destroy")->name('admins.words.destroy');
        Route::put('/words/{id}', "App\Http\Controllers\WordController@update")->name('admins.words.update');
        Route::get('/words/{id}/edit', "App\Http\Controllers\WordController@edit")->name('admins.words.edit');

        Route::get('/posts', "App\Http\Controllers\PostController@index")->name('admins.posts.index');
        Route::post('/posts', "App\Http\Controllers\PostController@store")->name('admins.posts.store');
        Route::get('/posts/create', "App\Http\Controllers\PostController@create")->name('admins.posts.create');
        Route::get('/posts/{id}', "App\Http\Controllers\PostController@show")->name('admins.posts.show');
        Route::delete('/posts/{id}', "App\Http\Controllers\PostController@destroy")->name('admins.posts.destroy');
        Route::put('/posts/{id}', "App\Http\Controllers\PostController@update")->name('admins.posts.update');
        Route::get('/posts/{id}/edit', "App\Http\Controllers\PostController@edit")->name('admins.posts.edit');

        Route::get('/categories', "App\Http\Controllers\CategoryController@index")->name('admins.categories.index');
        Route::post('/categories', "App\Http\Controllers\CategoryController@store")->name('admins.categories.store');
        Route::get('/categories/create', "App\Http\Controllers\CategoryController@create")->name('admins.categories.create');
        Route::get('/categories/{id}', "App\Http\Controllers\CategoryController@show")->name('admins.categories.show');
        Route::delete('/categories/{id}', "App\Http\Controllers\CategoryController@destroy")->name('admins.categories.destroy');
        Route::put('/categories/{id}', "App\Http\Controllers\CategoryController@update")->name('admins.categories.update');
        Route::get('/categories/{id}/edit', "App\Http\Controllers\CategoryController@edit")->name('admins.categories.edit');

        Route::get('/money', "App\Http\Controllers\MoneyController@index")->name('admins.money.index');
        Route::post('/money', "App\Http\Controllers\MoneyController@store")->name('admins.money.store');
        Route::get('/money/create', "App\Http\Controllers\MoneyController@create")->name('admins.money.create');
        Route::delete('/money/{id}', "App\Http\Controllers\MoneyController@destroy")->name('admins.money.destroy');
        Route::put('/money/{id}', "App\Http\Controllers\MoneyController@update")->name('admins.money.update');
        Route::get('/money/{id}/edit', "App\Http\Controllers\MoneyController@edit")->name('admins.money.edit');

    });

});

require __DIR__.'/auth.php';
