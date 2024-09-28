<?php

namespace Core\Exceptions;

use Exception;

class ValidationException extends Exception
{
    // readonly to assign once
    // and avoid getters, e.g: errors()
    public readonly array $errors;
    public readonly array $old;

    public static function throw($attributes)
    {
        $instance = new self;
        $instance->errors = $attributes['errors'];
        $instance->old = $attributes['old'];
        throw $instance;
    }
}