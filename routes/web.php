<?php

use App\Http\Controllers\InstagramController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'InstagramController@index');
Route::get('/search', 'InstagramController@search');
Route::get('/favorites', 'InstagramController@favorite');
Route::post('/add', 'InstagramController@add');
Route::post('/delete', 'InstagramController@delete');
