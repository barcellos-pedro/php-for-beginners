<?php

use Core\Auth;
use Core\Response;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password) && Auth::attempt($email, $password)) {
    redirect('/', Response::SEE_OTHER);
}

$form->error('email', 'Invalid credentials.');

Session::flash('errors', $form->errors());

redirect('/login');