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
//Rating
Route::post('/rating', "App\Http\Controllers\RatingController@show")->name('rating.show');
//NEWS
Route::get('/news', "App\Http\Controllers\PostController@news")->name('news');
Route::get('/news/{id}', "App\Http\Controllers\PostController@news_show")->name('news.show');
//EVENTS
Route::get('/events', "App\Http\Controllers\EventController@events")->name('events');
Route::get('/events/{id}', "App\Http\Controllers\EventController@events_show")->name('events.show');
//ELIGHTS
Route::get('/flights', "App\Http\Controllers\FlightController@flights")->name('flights');
Route::get('/flights/{id}', "App\Http\Controllers\FlightController@flights_show")->name('flights.show');
//BANKS
Route::get('/banks', "App\Http\Controllers\BankController@banks")->name('banks');
Route::get('/banks/{id}', "App\Http\Controllers\BankController@banks_show")->name('banks.show');
//TAXIS
Route::get('/taxis', "App\Http\Controllers\TaxiController@taxis")->name('taxis');
Route::get('/taxis/{id}', "App\Http\Controllers\TaxiController@taxis_show")->name('taxis.show');
//RANDOM
Route::get('/places', "App\Http\Controllers\PlaceController@places_show")->name('places.show');

Route::group( ["middleware" => ["auth", "verified"]], function() {

//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->middleware(['auth'])->name('dashboard');

    Route::redirect('/dashboard', '/users');

    Route::prefix('users')->group(function () {

        Route::get('/', "App\Http\Controllers\UserController@index")->name('users.index');
        Route::get('/all', "App\Http\Controllers\UserController@all")->name('users.all');

        Route::get('/menus', "App\Http\Controllers\MenuController@index")->name('users.menus.index');
        Route::post('/menus', "App\Http\Controllers\MenuController@store")->name('users.menus.store');
        Route::get('/menus/create', "App\Http\Controllers\MenuController@create")->name('users.menus.create');
        Route::get('/menus/{id}', "App\Http\Controllers\MenuController@show")->name('users.menus.show');
        Route::delete('/menus/{id}', "App\Http\Controllers\MenuController@destroy")->name('users.menus.destroy');
        Route::put('/menus/{id}', "App\Http\Controllers\MenuController@update")->name('users.menus.update');
        Route::get('/menus/{id}/edit', "App\Http\Controllers\MenuController@edit")->name('users.menus.edit');

        Route::get('/places', "App\Http\Controllers\PlaceController@index")->name('users.places.index');
        Route::post('/places', "App\Http\Controllers\PlaceController@store")->name('users.places.store');
        Route::get('/places/create', "App\Http\Controllers\PlaceController@create")->name('users.places.create');
        Route::get('/places/{id}', "App\Http\Controllers\PlaceController@show")->name('users.places.show');
        Route::delete('/places/{id}', "App\Http\Controllers\PlaceController@destroy")->name('users.places.destroy');
        Route::put('/places/{id}', "App\Http\Controllers\PlaceController@update")->name('users.places.update');
        Route::get('/places/{id}/edit', "App\Http\Controllers\PlaceController@edit")->name('users.places.edit');

        Route::get('/ads', "App\Http\Controllers\AdController@index")->name('users.ads.index');
        Route::post('/ads', "App\Http\Controllers\AdController@store")->name('users.ads.store');
        Route::get('/ads/create', "App\Http\Controllers\AdController@create")->name('users.ads.create');
        Route::get('/ads/{id}', "App\Http\Controllers\AdController@show")->name('users.ads.show');
        Route::delete('/ads/{id}', "App\Http\Controllers\AdController@destroy")->name('users.ads.destroy');
        Route::put('/ads/{id}', "App\Http\Controllers\AdController@update")->name('users.ads.update');
        Route::get('/ads/{id}/edit', "App\Http\Controllers\AdController@edit")->name('users.ads.edit');

        Route::get('/words', "App\Http\Controllers\WordController@index")->name('users.words.index');
        Route::post('/words', "App\Http\Controllers\WordController@store")->name('users.words.store');
        Route::get('/words/create', "App\Http\Controllers\WordController@create")->name('users.words.create');
        Route::get('/words/{id}', "App\Http\Controllers\WordController@show")->name('users.words.show');
        Route::delete('/words/{id}', "App\Http\Controllers\WordController@destroy")->name('users.words.destroy');
        Route::put('/words/{id}', "App\Http\Controllers\WordController@update")->name('users.words.update');
        Route::get('/words/{id}/edit', "App\Http\Controllers\WordController@edit")->name('users.words.edit');

        Route::get('/posts', "App\Http\Controllers\PostController@index")->name('users.posts.index');
        Route::post('/posts', "App\Http\Controllers\PostController@store")->name('users.posts.store');
        Route::get('/posts/create', "App\Http\Controllers\PostController@create")->name('users.posts.create');
        Route::get('/posts/{id}', "App\Http\Controllers\PostController@show")->name('users.posts.show');
        Route::delete('/posts/{id}', "App\Http\Controllers\PostController@destroy")->name('users.posts.destroy');
        Route::put('/posts/{id}', "App\Http\Controllers\PostController@update")->name('users.posts.update');
        Route::get('/posts/{id}/edit', "App\Http\Controllers\PostController@edit")->name('users.posts.edit');

        Route::get('/events', "App\Http\Controllers\EventController@index")->name('users.events.index');
        Route::post('/events', "App\Http\Controllers\EventController@store")->name('users.events.store');
        Route::get('/events/create', "App\Http\Controllers\EventController@create")->name('users.events.create');
        Route::get('/events/{id}', "App\Http\Controllers\EventController@show")->name('users.events.show');
        Route::delete('/events/{id}', "App\Http\Controllers\EventController@destroy")->name('users.events.destroy');
        Route::put('/events/{id}', "App\Http\Controllers\EventController@update")->name('users.events.update');
        Route::get('/events/{id}/edit', "App\Http\Controllers\EventController@edit")->name('users.events.edit');

        Route::get('/categories', "App\Http\Controllers\CategoryController@index")->name('users.categories.index');
        Route::post('/categories', "App\Http\Controllers\CategoryController@store")->name('users.categories.store');
        Route::get('/categories/create', "App\Http\Controllers\CategoryController@create")->name('users.categories.create');
        Route::get('/categories/{id}', "App\Http\Controllers\CategoryController@show")->name('users.categories.show');
        Route::delete('/categories/{id}', "App\Http\Controllers\CategoryController@destroy")->name('users.categories.destroy');
        Route::put('/categories/{id}', "App\Http\Controllers\CategoryController@update")->name('users.categories.update');
        Route::get('/categories/{id}/edit', "App\Http\Controllers\CategoryController@edit")->name('users.categories.edit');

        Route::get('/money', "App\Http\Controllers\MoneyController@index")->name('users.money.index');
        Route::post('/money', "App\Http\Controllers\MoneyController@store")->name('users.money.store');
        Route::get('/money/create', "App\Http\Controllers\MoneyController@create")->name('users.money.create');
        Route::delete('/money/{id}', "App\Http\Controllers\MoneyController@destroy")->name('users.money.destroy');
        Route::put('/money/{id}', "App\Http\Controllers\MoneyController@update")->name('users.money.update');
        Route::get('/money/{id}/edit', "App\Http\Controllers\MoneyController@edit")->name('users.money.edit');

        Route::get('/flights', "App\Http\Controllers\FlightController@index")->name('users.flights.index');
        Route::post('/flights', "App\Http\Controllers\FlightController@store")->name('users.flights.store');
        Route::get('/flights/create', "App\Http\Controllers\FlightController@create")->name('users.flights.create');
        Route::get('/flights/{id}', "App\Http\Controllers\FlightController@show")->name('users.flights.show');
        Route::delete('/flights/{id}', "App\Http\Controllers\FlightController@destroy")->name('users.flights.destroy');
        Route::put('/flights/{id}', "App\Http\Controllers\FlightController@update")->name('users.flights.update');
        Route::get('/flights/{id}/edit', "App\Http\Controllers\FlightController@edit")->name('users.flights.edit');

        Route::get('/banks', "App\Http\Controllers\BankController@index")->name('users.banks.index');
        Route::post('/banks', "App\Http\Controllers\BankController@store")->name('users.banks.store');
        Route::get('/banks/create', "App\Http\Controllers\BankController@create")->name('users.banks.create');
        Route::get('/banks/{id}', "App\Http\Controllers\BankController@show")->name('users.banks.show');
        Route::delete('/banks/{id}', "App\Http\Controllers\BankController@destroy")->name('users.banks.destroy');
        Route::put('/banks/{id}', "App\Http\Controllers\BankController@update")->name('users.banks.update');
        Route::get('/banks/{id}/edit', "App\Http\Controllers\BankController@edit")->name('users.banks.edit');

        Route::get('/taxis', "App\Http\Controllers\TaxiController@index")->name('users.taxis.index');
        Route::post('/taxis', "App\Http\Controllers\TaxiController@store")->name('users.taxis.store');
        Route::get('/taxis/create', "App\Http\Controllers\TaxiController@create")->name('users.taxis.create');
        Route::get('/taxis/{id}', "App\Http\Controllers\TaxiController@show")->name('users.taxis.show');
        Route::delete('/taxis/{id}', "App\Http\Controllers\TaxiController@destroy")->name('users.taxis.destroy');
        Route::put('/taxis/{id}', "App\Http\Controllers\TaxiController@update")->name('users.taxis.update');
        Route::get('/taxis/{id}/edit', "App\Http\Controllers\TaxiController@edit")->name('users.taxis.edit');

    });

});

require __DIR__.'/auth.php';
