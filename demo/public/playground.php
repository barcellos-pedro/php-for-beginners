<?php

// Testing a Composer Package

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

if ($numbers->contains(10)) {
    var_dump('it contains ten');
    echo PHP_EOL;
}

$lessThanOrEqualToFive = $numbers->filter(fn($number) => $number <= 5);

die(var_dump($lessThanOrEqualToFive));