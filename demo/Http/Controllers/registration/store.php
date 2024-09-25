<?php

use Core\App;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view('registration/create.view.php', [
        'heading' => 'Register',
        'errors' => $form->errors()
    ]);
}

// check if account already exists
$db = App::db();

$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

// if yes, redirect to login page
if ($user) {
    return redirect('/login');
}

// if not, save to database, log in, and redirect.
$db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
    'email' => $email,
    'password' => hashPassword($password)
]);

login(['email' => $email]);

redirect('/');