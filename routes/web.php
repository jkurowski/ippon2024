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
Route::middleware(['restrictIp'])->group(function () {
    Auth::routes();

    Route::get('routes', function() {
        \Artisan::call('route:list');
        return '<pre>' . \Artisan::output() . '</pre>';
    });
});

Route::group(['namespace' => 'Front', 'prefix' => '{locale?}', 'where' => ['locale' => '(?!admin)*[a-z]{2}'],], function() {
    Route::get('/', 'IndexController@index')->name('index');

    Route::get('kariera',
        'CareerController@index')->name('career');

    Route::get('kontakt',
        'ContactController@index')->name('contact.index');

    Route::get('zakup-gruntow',
        'LandController@index')->name('land');

    Route::get('rabaty',
        'PromotionController@index')->name('promotion');

    Route::get('obiekty-komercyjne',
        'Commercial\IndexController@index')->name('commercial');

    Route::get('wynajem',
        'Rent\IndexController@index')->name('rent');
    Route::get('wynajem/{slug},{id}', 'Rent\IndexController@show')->name('rent.index.show');

    // Inline
    Route::group(['prefix'=>'/inline', 'as' => 'front.inline.'], function() {
        Route::get('/', 'InlineController@index')->name('index');
        Route::get('/loadinline/{inline}', 'InlineController@show')->name('show');
        Route::post('/update/{inline}', 'InlineController@update')->name('update');
    });

    // Articles
    Route::group(['prefix' => 'blog', 'as' => 'front.news.'], function() {
        Route::get('/',         'ArticleController@index')->name('index');
        Route::get('/{slug}',   'ArticleController@show')->name('show');
    });

    Route::get('{uri}', 'MenuController@index')->where('uri', '([A-Za-z0-9\-\/]+)');
});