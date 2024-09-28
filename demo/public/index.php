<?php

use Core\Exceptions\ValidationException;
use Core\Router;
use Core\Session;

session_start();

/** Project Root path */
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

/** Autoload to avoid requiring the class path */
spl_autoload_register(autoload_core());

/** Initialize Service Container Bindings */
require base_path('bootstrap.php');

// Routing
require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Exception will bubble up from the corresponding route controller
// that way instead of handling the exception on every controller
// we handle the exception in a single place

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    redirect(Router::previousUrl());
}

// Clear session flash values after routing
Session::unflash();