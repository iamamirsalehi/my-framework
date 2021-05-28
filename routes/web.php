<?php

use App\Core\Routing\Route;
use App\Middlewares\BlockIEMiddleware;

Route::get('/post/add', function (){
    echo 'moooz';
});

Route::get('/posts', 'HomeController@index', [BlockIEMiddleware::class]);