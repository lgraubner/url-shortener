<?php

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

Route::get('/', function () {
    return redirect()->away('https://larsgraubner.com', 301);
});

Route::get('/{hash}+', 'DetailsController');

Route::get('/{hash}', 'RedirectController');