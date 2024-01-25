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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', 'AlbumController@index')->name('dashboard');

Route::group(['prefix' => 'album'], function(){
    Route::get('/create', 'AlbumController@create')->name('album.create');
    Route::post('/store', 'AlbumController@store')->name('album.store');
    Route::post('/delete/{id}', 'AlbumController@destroy')->name('album.delete');
});

Route::group(['prefix' => 'gambar'], function(){
    Route::get('/{id}', 'GambarController@index')->name('gambar.index');
    Route::get('/create/{id}', 'GambarController@create')->name('gambar.create');
    Route::post('/store', 'GambarController@store')->name('gambar.store');
    Route::post('/delete/{id}', 'GambarController@destroy')->name('gambar.delete');
});

Route::get('/view', 'AlbumController@view')->name('view');


