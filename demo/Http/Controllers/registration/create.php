<?php

use Core\Session;

view('registration/create.view.php', [
    'heading' => 'Register',
    'errors' => Session::get('errors')
]);