<?php

use Core\App;
use Core\Validator;

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare Form Validator
$validate = validateForm([
    'view' => 'login/create.view.php',
    'heading' => 'Log In'
]);

// Validate Form
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

$validate($errors);

// check if account already exists
$db = App::db();

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user && password_verify($password, $user['password'])) {
    login(['email' => $email]);
    redirect('/');
}

$errors['email'] = 'Invalid credentials.';
$validate($errors);