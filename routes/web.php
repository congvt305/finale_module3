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
    return view('welcome');
});
Route::prefix('admin1')->group(function () {
    Route::get('/', function () {
        return view('admin.layout');
    });
    Route::prefix('/contact')->group(function () {
        Route::get('/','ContactController@list' );
        Route::get('/list', 'ContactController@list')->name('contact.index');
        Route::get('/{id}/show', 'ContactController@show')->name('contact.show');
        Route::get('/create', 'ContactController@create')->name('contact.create');
        Route::post('/create', 'ContactController@store')->name('contact.store');
        Route::get('/{id}/destroy', 'ContactController@destroy')->name('contact.destroy');
        Route::get('/{keyword}/search', 'ContactController@search')->name('search');
    });
});
