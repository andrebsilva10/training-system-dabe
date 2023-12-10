<?php

use Core\Routes\Route;

session_start();

define('ROOT_PATH', dirname(__DIR__));

require_once ROOT_PATH . '/core/Errors/ErrorHandler.php';

require_once ROOT_PATH . '/core/Env/env.php';

require_once ROOT_PATH . '/vendor/autoload.php';

require_once ROOT_PATH . '/config/routes.php';

Route::load();
