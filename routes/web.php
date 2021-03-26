<?php

use App\Core\Routing\Route;

Route::get('/post/add', 'HomeController@index');
Route::post('/post/add', 'HomeController@index');
Route::put('/post/add', 'HomeController@index');