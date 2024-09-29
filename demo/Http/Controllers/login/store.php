<?php

use Core\{Auth, Response};
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$loggedIn = Auth::attempt($attributes['email'], $attributes['password']);

if (!$loggedIn) {
    $form->error('email', 'Invalid credentials.')->throw();
}

redirect('/', Response::SEE_OTHER);