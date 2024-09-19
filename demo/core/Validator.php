<?php

class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $length = strlen(trim($value));
        return $length >= $min && $length <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}