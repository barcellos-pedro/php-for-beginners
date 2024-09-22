<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

App::setContainer($container);

App::bind(Database::class, function () {
    $config = config('database');
    return new Database($config);
});