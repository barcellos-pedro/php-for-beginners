<?php

namespace Core;

use Exception;

class BindingNotFound extends Exception
{
    public function __construct($key)
    {
        parent::__construct("No matching binding found for: {$key}");
    }
}