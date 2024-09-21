<?php

/** Project Root path */

use Core\Router;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

/** Autoload to avoid requiring the class path */
spl_autoload_register(autoload_core());

// Routing
$router = new Router();
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
