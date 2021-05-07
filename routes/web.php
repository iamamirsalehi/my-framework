<?php

use App\Core\Routing\Route;

Route::get('/post/add', function (){
    echo 'moooz';
});

Route::get('/posts', 'HomeController@index');