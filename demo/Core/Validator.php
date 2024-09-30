<?php

namespace Core;

class Validator
{
    public static function string(string $value, $min = 1, $max = INF): bool
    {
        $length = strlen(trim($value));
        return $length >= $min && $length <= $max;
    }

    public static function email(string $value): bool
    {
        return (bool)filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int|float $value, int|float $greaterThan): bool
    {
        return $value > $greaterThan;
    }
}