<?php

use Core\App;
use Core\Container;
use Core\Database;

App::setContainer(new Container());

App::bind(Database::class, function () {
    $config = config('database');
    return new Database($config);
});