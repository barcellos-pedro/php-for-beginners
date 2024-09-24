<?php

namespace Core\Exceptions;

use Exception;

class BindingNotFoundException extends Exception
{
    public function __construct($key)
    {
        parent::__construct("No matching binding found for: {$key}");
    }
}