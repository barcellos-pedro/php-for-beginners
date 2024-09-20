<?php

/** Project Root path */
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

/** Autoload to avoid requiring the class path */
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('Core/router.php');