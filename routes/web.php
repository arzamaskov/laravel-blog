<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'InstagramController@index');

Route::get('/search', 'InstagramController@search');