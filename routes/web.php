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

    Route::get('o-nas',
        'AboutController@index')->name('about');

    Route::get('kariera',
        'CareerController@index')->name('career');

    Route::get('kontakt',
        'ContactController@index')->name('contact.index');
    Route::post('/kontakt', 'ContactController@contact')->name('contact.form');

    Route::post('/i/{slug}/{property}/kontakt', 'ContactController@property')->name('contact.property');

    Route::get('zakup-gruntu', 'LandController@index')->name('land');
    Route::post('zakup-gruntu', 'LandController@form')->name('land.form');

    Route::get('rabaty',
        'PromotionController@index')->name('promotion');

    Route::get('obiekty-komercyjne',
        'Commercial\IndexController@index')->name('commercial');

    Route::get('jak-kupic-mieszkanie',
        'Static\IndexController@howbuy')->name('static.howbuy');

    Route::get('zrealizowane-inwestycje',
        'Developro\Completed\IndexController@index')->name('developro.completed');

    Route::get('aktualne-inwestycje',
        'Developro\Current\IndexController@index')->name('developro.current');

    Route::get('planowane-inwestycje',
        'Developro\Planned\IndexController@index')->name('developro.planned');

    Route::get('inwestycje-juz-wkrotce',
        'Developro\Soon\IndexController@index')->name('developro.soon');

    Route::post('/clipboard', 'Clipboard\IndexController@store')->name('clipboard.store');
    Route::post('/clipboard/send', 'Clipboard\IndexController@send')->name('clipboard.send');
    Route::get('/clipboard', 'Clipboard\IndexController@index')->name('clipboard.index');
    Route::delete('/clipboard', 'Clipboard\IndexController@destroy')->name('clipboard.destroy');

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

    // Articles
    Route::group(['prefix' => 'aktualnosci', 'as' => 'front.articles.'], function() {
        Route::get('/',         'NewsController@index')->name('index');
        Route::get('/{slug}',   'NewsController@show')->name('show');
    });

    // Lokalizacja
    Route::get('/lokalizacja/{slug}', 'Map\IndexController@index')->name('map');

    // DeveloPro
    Route::group(['namespace' => 'Developro', 'prefix' => '/i', 'as' => 'developro.'], function () {
        Route::get('/{slug}', 'InvestmentController@index')->name('investment.index');
        Route::get('/{slug}/kontakt', 'Contact\IndexController@index')->name('investment.contact');

        Route::get('/{slug}/mieszkania', 'Plan\IndexController@index')->name('investment.plan');

        Route::get('/{slug}/aktualnosci', 'Article\IndexController@index')->name('investment.news');
        Route::get('/{slug}/aktualnosci/{article}', 'Article\IndexController@show')->name('investment.news.show');

        Route::get('/{slug}/pietro/{floor},{floorSlug}', 'InvestmentBuildingFloorController@index')->name('floor');
        Route::get('/{slug}/{property},{propertySlug},{propertyFloor},{propertyRooms},{propertyArea}', 'InvestmentPropertyController@index')->name('property');

        Route::get('/osiedle-tempo/lokalizacja', 'Page\IndexController@temp')->name('investment.temp');
        Route::get('/osiedle-synergia/lokalizacja', 'Page\IndexController@temp2')->name('investment.temp2');

        Route::get('/{slug}/{page}', 'Page\IndexController@index')->name('investment.page');



    });

    Route::get('{uri}', 'MenuController@index')->where('uri', '([A-Za-z0-9\-\/]+)');
});