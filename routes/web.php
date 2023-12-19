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

    Route::get('/',
        'Front\IndexController@index')->name('index');

    Route::post('/property-contact/{property}',
        'Front\ContactController@property')->name('contact.property');

    Route::get('o-nas',
        'Front\AboutController@index')->name('about');

    Route::get('zakup-gruntow',
        'Front\LandController@index')->name('land');

    Route::get('/pl/kariera',
        'Front\CareerController@index')->name('career');



    Route::get('/pl/kontakt',
        'Front\ContactController@index')->name('contact.index');

    Route::post('kontakt',
        'Front\ContactController@send')->name('contact.send');

    // Developro
    Route::group(['namespace' => 'Front', 'prefix'=>'/i', 'as' => 'front.investment.'], function() {

        Route::get('/{slug}',
            'InvestmentController@index')->name('show');

        Route::get('/{slug}/plan',
            'InvestmentController@show')->name('plan');

        Route::get('/{slug}/pietro/{floor}',
            'InvestmentFloorController@index')->name('floor.index');

        Route::get('/{slug}/pietro/{floor}/m/{property}',
            'InvestmentPropertyController@index')->name('property.index');
    });

    // Articles
    Route::group(['namespace' => 'Front', 'prefix'=>'/aktualnosci/', 'as' => 'front.news.'], function() {
        Route::get('/',         'ArticleController@index')->name('index');
        Route::get('/{slug}',   'ArticleController@show')->name('show');
    });

});
