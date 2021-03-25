<?php

use App\Core\Request;

include 'bootstrap/init.php';

$request = new Request();

dd($request->uri);