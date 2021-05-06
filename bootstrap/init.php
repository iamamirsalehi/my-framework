<?php

use App\Core\Request;

define('BASE_PATH', __DIR__ . '/../');

include BASE_PATH .  'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$request = new Request();

include BASE_PATH . 'routes/web.php';

include BASE_PATH .  'helpers/helper.php';