<?php
use Illuminate\Support\Facades\Route;

// Inbox
Route::group([
    'namespace' => 'Admin\Inbox',
    'prefix' => '/admin/inbox',
    'as' => 'admin.inbox.',
    'middleware' => 'auth'], function () {

        Route::get(
            '/',
            'IndexController@index'
        )->name('index');

        Route::get(
            '/admin/inbox/message/{id}',
            'IndexController@show'
        )->name('show');
    });

// kCMS
Route::group([
    'namespace' => 'Admin',
    'prefix'=>'/admin',
    'as' => 'admin.',
    'middleware' => 'auth'], function () {

        Route::get('/', function () {
            return redirect('admin/developro');
        });

    // Slider
        Route::post('slider/set', 'Slider\IndexController@sort')->name('slider.sort');
        Route::post('gallery/set', 'Gallery\IndexController@sort')->name('gallery.sort');
        Route::post('image/set', 'Gallery\ImageController@sort')->name('image.sort');
        Route::post('box/set', 'Box\IndexController@sort')->name('box.sort');
        Route::post('section/set', 'Section\IndexController@sort')->name('section.sort');

    // Gallery
        Route::get('ajaxGetGalleries', 'Gallery\IndexController@ajaxGetGalleries')->name('ajaxGetGalleries');

        Route::resources([
        'page' => 'Page\IndexController',
        'url' => 'Url\IndexController',
        'article' => 'Article\IndexController',
        'slider' => 'Slider\IndexController',
        'box' => 'Box\IndexController',
        'section' => 'Section\IndexController',
        'user' => 'User\IndexController',
        'role' => 'Role\IndexController',
        'logs' => 'Log\IndexController',
        'greylist' => 'Greylist\IndexController',
        'gallery' => 'Gallery\IndexController',
        'image' => 'Gallery\ImageController',
        'map' => 'Map\IndexController'
        ]);

    // RODO
        Route::group(['prefix' => '/rodo', 'as' => 'rodo.'], function () {

            Route::resources([
            'rules' => 'Rodo\RulesController',
            'settings' => 'Rodo\SettingsController',
            'clients' => 'Rodo\ClientController'
            ]);
        });

    // Dashboard
        Route::group(['prefix'=>'/dashboard', 'as' => 'dashboard.'], function () {

            Route::resources([
                'seo' => 'Dashboard\SeoController',
                'social' => 'Dashboard\SocialController',
                'popup' => 'Dashboard\PopupController'
            ]);
        });
    });

// DeveloPro
Route::group([
    'namespace' => 'Admin\Developro',
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => 'auth'], function () {

    // Inwestycje

        Route::resource('developro', 'IndexController')->except('show');

    // Plan inwestycji

        Route::group(['prefix'=>'/plan', 'as' => 'developro.plan.'], function () {

            Route::get(
                '{investment}',
                'PlanController@index'
            )->name('index');

            Route::post(
                '{investment}/update',
                'PlanController@update'
            )->name('update');
        });

        Route::group(['as' => 'developro.'], function () {
            Route::resources([
            // Inwestycja budynkowa
            'investment.floor' => 'FloorController',
            'investment.floor.property' => 'PropertyController',

            // Inwestycja osiedlowa
            'investment.building' => 'BuildingController',
            'investment.building.floor' => 'BuildingFloorController',
            'investment.building.floor.property' => 'BuildingPropertyController',

            // Inwestycja domkowa
            'investment.house' => 'HouseController',

            // Dziennik inwestycji
            'investment.article' => 'ArticleController'
            ]);

            Route::get('{investment}/floor/{floor}/copy', 'FloorController@copy')->name('floor.copy');
            Route::get('{investment}/building/{building}/floor/{floor}/copy', 'BuildingFloorController@copy')->name('building.floor.copy');
        });
    });

Route::get('{uri}', 'Front\MenuController@index')->where('uri', '([A-Za-z0-9\-\/]+)');
