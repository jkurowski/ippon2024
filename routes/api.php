<?php

use App\Http\Controllers\Api\History\IndexController as DatasetController;
use App\Http\Controllers\Api\Sync\IndexController as SyncController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/api'], function () {
    Route::get('/xml/create', [DatasetController::class, 'createXml']);
    Route::get('/xml/update', [DatasetController::class, 'updateXml']);
    Route::get('/xml/showAsTable/{investment}', [DatasetController::class, 'showAsTable']);
    Route::get('/xml/generate-md5', [DatasetController::class, 'generateMD5']);

    // Mini API tylko do odczytu, klucz w naglowku X-Sync-Key (.env SYNC_API_KEY) - opis w kontrolerze
    Route::middleware('throttle:30,1')->group(function () {
        Route::get('/sync', [SyncController::class, 'index']);
        Route::get('/sync/{table}', [SyncController::class, 'show'])->where('table', '[a-z_]+');
    });
});
