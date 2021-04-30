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
//HOME
Route::get('/', "App\Http\Controllers\HomeController@index")->name('index');
Route::get('/menu', "App\Http\Controllers\HomeController@menu")->name('menu');
//Rating
Route::post('/rating', "App\Http\Controllers\RatingController@show")->name('rating.show');
//NEWS
Route::get('/news', "App\Http\Controllers\PostController@news")->name('news');
Route::get('/news/{id}', "App\Http\Controllers\PostController@news_show")->name('news.show');
//EVENTS
Route::get('/events', "App\Http\Controllers\EventController@events")->name('events');
Route::get('/events/{id}', "App\Http\Controllers\EventController@events_show")->name('events.show');
//BANKS
Route::get('/banks', "App\Http\Controllers\BankController@banks")->name('banks');
Route::get('/banks/{id}', "App\Http\Controllers\BankController@banks_show")->name('banks.show');
//SERVICES
Route::get('/services', "App\Http\Controllers\ServiceController@services")->name('services');
Route::get('/services/{id}', "App\Http\Controllers\ServiceController@services_show")->name('services.show');
//TRANSPORTS
Route::get('/transports', "App\Http\Controllers\TransportController@transports")->name('transports');
Route::get('/transports/{id}', "App\Http\Controllers\TransportController@transports_show")->name('transports.show');
//MASISJAN
Route::get('/masisjan', function () { return view('all.masisjan.masisjan');})->name('masisjan');
Route::get('/masisjan/contact', function () { return view('all.masisjan.contact');})->name('masisjan.contact');
Route::get('/masisjan/help', function () { return view('all.masisjan.help');})->name('masisjan.help');
//RANDOM
Route::get('/places', "App\Http\Controllers\PlaceController@places_show")->name('places.show');
//EMAIL
Route::get('/email', 'App\Http\Controllers\MailController@create');
Route::post('/email/tablichka', 'App\Http\Controllers\MailController@tablichkaEmail')->name('tablichka.email');
//QR RETURN
//Route::redirect('/qaghaqayin-gradaran.html', '/users');

Route::group( ["middleware" => ["auth", "verified"]], function() {

    Route::redirect('/dashboard', '/users');

    Route::prefix('users')->group(function () {
        Route::get('/', "App\Http\Controllers\UserController@index")->name('users.index');
        Route::get('/all', "App\Http\Controllers\UserController@all")->name('users.all');
        Route::get('/setting', "App\Http\Controllers\UserController@setting")->name('users.setting');
        Route::get('/profile', "App\Http\Controllers\UserController@profile")->name('users.profile');
        Route::get('/profile/password', "App\Http\Controllers\UserController@password")->name('users.password');
        Route::get('/profile/email', "App\Http\Controllers\UserController@email")->name('users.email');
        Route::put('/profile/{id}', "App\Http\Controllers\UserController@updateProfile")->name('users.profile.update');
        Route::put('/profile/password/{id}', "App\Http\Controllers\UserController@updatePassword")->name('users.password.update');
        Route::put('/profile/email/{id}', "App\Http\Controllers\UserController@updateEmail")->name('users.email.update');
        Route::get('/profile/email/verify', "App\Http\Controllers\UserController@verifyEmail")->name('users.email.verify');
        Route::delete('/profile/{id}', "App\Http\Controllers\UserController@destroy")->name('users.profile.destroy');

        Route::get('/banks', "App\Http\Controllers\BankController@index")->name('users.banks.index');
        Route::post('/banks', "App\Http\Controllers\BankController@store")->name('users.banks.store');
        Route::get('/banks/create', "App\Http\Controllers\BankController@create")->name('users.banks.create');
        Route::get('/banks/{id}', "App\Http\Controllers\BankController@show")->name('users.banks.show');
        Route::delete('/banks/{id}', "App\Http\Controllers\BankController@destroy")->name('users.banks.destroy');
        Route::put('/banks/{id}', "App\Http\Controllers\BankController@update")->name('users.banks.update');
        Route::get('/banks/{id}/edit', "App\Http\Controllers\BankController@edit")->name('users.banks.edit');

        Route::get('/services', "App\Http\Controllers\ServiceController@index")->name('users.services.index');
        Route::post('/services', "App\Http\Controllers\ServiceController@store")->name('users.services.store');
        Route::get('/services/create', "App\Http\Controllers\ServiceController@create")->name('users.services.create');
        Route::get('/services/{id}', "App\Http\Controllers\ServiceController@show")->name('users.services.show');
        Route::delete('/services/{id}', "App\Http\Controllers\ServiceController@destroy")->name('users.services.destroy');
        Route::put('/services/{id}', "App\Http\Controllers\ServiceController@update")->name('users.services.update');
        Route::get('/services/{id}/edit', "App\Http\Controllers\ServiceController@edit")->name('users.services.edit');

        Route::group( ["middleware" => ["admin"]], function() {
            Route::get('/transports', "App\Http\Controllers\TransportController@index")->name('users.transports.index');
            Route::post('/transports', "App\Http\Controllers\TransportController@store")->name('users.transports.store');
            Route::get('/transports/create', "App\Http\Controllers\TransportController@create")->name('users.transports.create');
            Route::get('/transports/{id}', "App\Http\Controllers\TransportController@show")->name('users.transports.show');
            Route::delete('/transports/{id}', "App\Http\Controllers\TransportController@destroy")->name('users.transports.destroy');
            Route::put('/transports/{id}', "App\Http\Controllers\TransportController@update")->name('users.transports.update');
            Route::get('/transports/{id}/edit', "App\Http\Controllers\TransportController@edit")->name('users.transports.edit');
            Route::get('/stops', "App\Http\Controllers\TransportController@stopindex")->name('users.stops.index');
            Route::post('/stops', "App\Http\Controllers\TransportController@stopstore")->name('users.stops.store');
            Route::get('/stops/create', "App\Http\Controllers\TransportController@stopcreate")->name('users.stops.create');
            Route::get('/stops/{id}', "App\Http\Controllers\TransportController@stopshow")->name('users.stops.show');
            Route::delete('/stops/{id}', "App\Http\Controllers\TransportController@stopdestroy")->name('users.stops.destroy');
            Route::put('/stops/{id}', "App\Http\Controllers\TransportController@stopupdate")->name('users.stops.update');
            Route::get('/stops/{id}/edit', "App\Http\Controllers\TransportController@stopedit")->name('users.stops.edit');
            Route::get('/times', "App\Http\Controllers\TransportController@timeindex")->name('users.times.index');
            Route::post('/times', "App\Http\Controllers\TransportController@timestore")->name('users.times.store');
            Route::get('/times/create', "App\Http\Controllers\TransportController@timecreate")->name('users.times.create');
            Route::delete('/times/{id}', "App\Http\Controllers\TransportController@timedestroy")->name('users.times.destroy');
            Route::put('/times/{id}', "App\Http\Controllers\TransportController@timeupdate")->name('users.times.update');
            Route::get('/times/{id}/edit', "App\Http\Controllers\TransportController@timeedit")->name('users.times.edit');
            Route::post('/tajax', "App\Http\Controllers\ApiController@show")->name('tajax.show');

            Route::get('/menus', "App\Http\Controllers\MenuController@index")->name('users.menus.index');
            Route::post('/menus', "App\Http\Controllers\MenuController@store")->name('users.menus.store');
            Route::get('/menus/create', "App\Http\Controllers\MenuController@create")->name('users.menus.create');
            Route::get('/menus/{id}', "App\Http\Controllers\MenuController@show")->name('users.menus.show');
            Route::delete('/menus/{id}', "App\Http\Controllers\MenuController@destroy")->name('users.menus.destroy');
            Route::put('/menus/{id}', "App\Http\Controllers\MenuController@update")->name('users.menus.update');
            Route::get('/menus/{id}/edit', "App\Http\Controllers\MenuController@edit")->name('users.menus.edit');

            Route::get('/words', "App\Http\Controllers\WordController@index")->name('users.words.index');
            Route::post('/words', "App\Http\Controllers\WordController@store")->name('users.words.store');
            Route::get('/words/create', "App\Http\Controllers\WordController@create")->name('users.words.create');
            Route::get('/words/{id}', "App\Http\Controllers\WordController@show")->name('users.words.show');
            Route::delete('/words/{id}', "App\Http\Controllers\WordController@destroy")->name('users.words.destroy');
            Route::put('/words/{id}', "App\Http\Controllers\WordController@update")->name('users.words.update');
            Route::get('/words/{id}/edit', "App\Http\Controllers\WordController@edit")->name('users.words.edit');

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

            Route::get('/places', "App\Http\Controllers\PlaceController@index")->name('users.places.index');
            Route::post('/places', "App\Http\Controllers\PlaceController@store")->name('users.places.store');
            Route::get('/places/create', "App\Http\Controllers\PlaceController@create")->name('users.places.create');
            Route::get('/places/{id}', "App\Http\Controllers\PlaceController@show")->name('users.places.show');
            Route::delete('/places/{id}', "App\Http\Controllers\PlaceController@destroy")->name('users.places.destroy');
            Route::put('/places/{id}', "App\Http\Controllers\PlaceController@update")->name('users.places.update');
            Route::get('/places/{id}/edit', "App\Http\Controllers\PlaceController@edit")->name('users.places.edit');

            Route::get('/users', "App\Http\Controllers\UserController@users")->name('users.users.index');
            Route::post('/users', "App\Http\Controllers\UserController@store")->name('users.users.store');
            Route::get('/users/{id}', "App\Http\Controllers\UserController@show")->name('users.users.show');
            Route::put('/users/{id}', "App\Http\Controllers\UserController@update")->name('users.users.update');
            Route::get('/users/{id}/edit', "App\Http\Controllers\UserController@edit")->name('users.users.edit');
        });
        Route::group( ["middleware" => ["userPlus"]], function() {
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
        });
        Route::group( ["middleware" => ['partner']], function() {
            Route::get('/ads', "App\Http\Controllers\AdController@index")->name('users.ads.index');
            Route::post('/ads', "App\Http\Controllers\AdController@store")->name('users.ads.store');
            Route::get('/ads/create', "App\Http\Controllers\AdController@create")->name('users.ads.create');
            Route::get('/ads/{id}', "App\Http\Controllers\AdController@show")->name('users.ads.show');
            Route::delete('/ads/{id}', "App\Http\Controllers\AdController@destroy")->name('users.ads.destroy');
            Route::put('/ads/{id}', "App\Http\Controllers\AdController@update")->name('users.ads.update');
            Route::get('/ads/{id}/edit', "App\Http\Controllers\AdController@edit")->name('users.ads.edit');
        });
    });
});

require __DIR__.'/auth.php';
