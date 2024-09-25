<?php

use Core\Auth;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password) && Auth::attempt($email, $password)) {
    redirect('/');
}

$form->error('email', 'Invalid credentials.');

view('login/create.view.php', [
    'heading' => 'Log In',
    'errors' => $form->errors()
]);