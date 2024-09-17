<?php

/**
 * Die and Dump information about variable
 */
function dd($value, ...$values)
{
    echo "<pre>";
    var_dump($value, $values);
    echo "</pre>";

    die();
}

/**
 * Check pattern against Server Request URI
 */
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

/**
 * If condition is Falsy, abort()
 */
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

/**
 * Output value using htmlspecialchars()
 */
function sanitize($value)
{
    return htmlspecialchars($value);
}

/**
 * Get POST recent submitted field value
 */
function old($field)
{
    return $_POST[$field] ?? '';
}

function redirect($location, $status = Response::OK)
{
    http_response_code($status);
    header("Location: {$location}");
    exit();
}

/**
 * Require partial file
 * TODO: Fix missing variables from partial when requiring
 */
function partial($file)
{
    require "views/partials/{$file}.php";
}