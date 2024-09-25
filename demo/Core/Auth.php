<?php

namespace Core;

class Auth
{
    public static function attempt($email, $password)
    {
        $user = App::db()->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user && password_verify($password, $user['password'])) {
            static::login(['email' => $email]);
            return true;
        }

        return false;
    }


    public static function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(delete_old_session: true);
    }

    public static function logout()
    {
        // clear super global
        $_SESSION = [];

        // clear session file (cookie) on server
        session_destroy();

        // clear cookie on browser
        $params = session_get_cookie_params();
        $name = 'PHPSESSID';
        $value = '';
        $expires = time() - 3600; // past 1 hour
        setcookie($name, $value, $expires, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    public static function user()
    {
        return $_SESSION['user'] ?? false;
    }

    public static function guest()
    {
        return !static::user();
    }
}