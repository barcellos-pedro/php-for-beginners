<?php

namespace Core\Middleware;

class Guest
{
    public function handle()
    {
        if (\Core\Auth::user()) {
            redirect('/');
        }
    }
}