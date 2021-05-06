<?php

use App\Core\Request;
use App\Core\Routing\Router;

include 'bootstrap/init.php';

$router = new Router();


dd($router->findCurrentRoute($request));