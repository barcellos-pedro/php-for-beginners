<?php

use Core\Session;

view('login/create.view.php', [
    'heading' => 'Log In',
    'errors' => Session::get('errors')
]);