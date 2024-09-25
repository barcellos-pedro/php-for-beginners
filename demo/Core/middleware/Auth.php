<?php

namespace Core\Middleware;

class Auth
{
    public function handle()
    {
        if (\Core\Auth::guest()) {
            redirect('/login');
        }
    }
}