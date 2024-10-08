<?php

use Core\Response;
use Core\Session;

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
function old($field, $default = '')
{
    return Session::get('old')[$field] ?? $default;
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
 * Manually autoload to avoid requiring every class path
 * Listens to dynamically require required classes
 *
 * E.g: Core/Database, Http/Forms|LoginForm, etc.
 *
 * Used as callback on spl_autoload_register()
 */
function autoload_core()
{
    return function ($class) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        require base_path("{$class}.php");
    };
}

function error($field)
{
    $errors = Session::get('errors');
    $message = $errors[$field] ?? false;

    if (!$message) return;

    return "<p class='mt-5 text-red-400 font-semibold'>{$message}</p>";

}

function hashPassword($value, $algo = PASSWORD_DEFAULT)
{
    return password_hash($value, $algo);
}

/**
 * Validate errors array, if it's empty, stop.
 * Otherwise, render the view with its corresponding errors
 */
function validateForm($props)
{
    return function ($errors) use ($props) {
        if (empty($errors)) return;

        return view($props['view'], [
            'heading' => $props['heading'],
            'errors' => $errors
        ]);
    };
}