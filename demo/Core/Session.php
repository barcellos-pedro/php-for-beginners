<?php

namespace Core;

class Session
{
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function has($key)
    {
        return (bool)static::get($key);
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        // clear super global
        static::flush();

        // clear session file (cookie) on server
        session_destroy();

        // clear cookie on browser
        $params = session_get_cookie_params();
        $name = 'PHPSESSID';
        $value = '';
        $expires = time() - 3600; // past 1 hour
        setcookie($name, $value, $expires, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}