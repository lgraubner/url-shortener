<?php

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

Route::prefix('v1')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('links', 'LinkController')->only([
            'index', 'show', 'store', 'destroy', 'update'
        ]);

        Route::get('/links/{id}/clicks', 'MetricsController@clicks');

        Route::get('/links/{id}/referrers', 'MetricsController@referrers');

        Route::post('logout', 'AuthController@logout');
        Route::get('me', 'AuthController@me');
    });
});


Route::get('health', 'HealthController');