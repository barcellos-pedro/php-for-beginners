<?php

function routeToController($path, $routes)
{
    if (array_key_exists($path, $routes)) {
        require base_path($routes[$path]);
    } else {
        abort();
    }
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("views/errors/{$code}.view.php");
    die();
}

$routes = require base_path('routes.php');
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url['path'];

routeToController($path, $routes);