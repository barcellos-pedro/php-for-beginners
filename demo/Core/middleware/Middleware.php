<?php

namespace Core\Middleware;

use Core\Exceptions\MiddlewareNotFoundException;

class Middleware
{
    const middlewares = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function handle($route)
    {
        if (!$route['middleware']) return;

        $key = $route['middleware'];
        $middleware = static::middlewares[$key] ?? false;

        if (!$middleware) throw new MiddlewareNotFoundException($key);

        (new $middleware)->handle();
    }
}