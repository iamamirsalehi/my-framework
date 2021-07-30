<?php

use App\Core\Routing\Route;
use App\Middlewares\BlockIEMiddleware;


Route::get('/posts', 'HomeController@index', [BlockIEMiddleware::class]);