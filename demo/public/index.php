<?php

/** Project Root path */
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

/** Autoload to avoid requiring the class path */
spl_autoload_register(function ($class) {
    require base_path("core/{$class}.php");
});

require base_path('router.php');