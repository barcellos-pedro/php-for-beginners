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
        Session::destroy();
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