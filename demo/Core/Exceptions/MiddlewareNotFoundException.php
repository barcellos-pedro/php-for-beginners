<?php

namespace Core\Exceptions;

use Exception;

class MiddlewareNotFoundException extends Exception
{
    public function __construct($key)
    {
        parent::__construct("No matching middleware found for: {$key}");
    }
}