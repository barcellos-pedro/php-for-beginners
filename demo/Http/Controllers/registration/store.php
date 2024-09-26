<?php

use Core\{App, Auth, Session};
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    Session::flash('errors', $form->errors());
    Session::flash('old', ['email' => $email]);
    redirect('/register');
}

// check if account already exists
$db = App::db();

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    redirect('/login');
}

$db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
    'email' => $email,
    'password' => hashPassword($password)
]);

Auth::login(['email' => $email]);

redirect('/');