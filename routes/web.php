<?php

use App\Http\Controllers\InstagramController;
use Illuminate\Support\Facades\Route;


Route::get('/', 'InstagramController@index');

Route::get('/search', 'InstagramController@search');


// 1. Маршрут для добавления избранных

// 2. Маршрут для удаления избранных

// 3. Маршрут для показа избранных
Route::get('/favorites', 'InstagramController@favorite');
Route::post('/add', 'InstagramController@add');
Route::post('/delete', 'InstagramController@delete');
