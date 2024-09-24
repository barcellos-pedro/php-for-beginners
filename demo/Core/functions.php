<?php

use Core\Response;

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
 * Based on the error, set response status code
 * and render the error page
 */
function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("views/errors/{$code}.view.php");
    die();
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
 * Concatenate root folder path with function param
 */
function base_path($path)
{
    return BASE_PATH . $path;
}

/**
 * Concatenate root folder path with target view path
 */
function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/{$path}");
}

function config($attribute)
{
    $config = require base_path('config.php');
    return $config[$attribute] ?? false;
}

/**
 * Listen and dynamically require classes
 * Used as callback on spl_autoload_register
 */
function autoload_core()
{
    return function ($class) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        require base_path("{$class}.php");
    };
}

function error($errors, $field)
{
    if ($errors[$field] ?? false) {
        return "<p class='mt-5 text-red-400 font-semibold'>{$errors[$field]}</p>";
    }

    return '';
}

function hashPassword($value, $algo = PASSWORD_DEFAULT)
{
    return password_hash($value, $algo);
}