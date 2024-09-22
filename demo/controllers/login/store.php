<?php

use Core\App;
use Core\Validator;

$errors = [];
$email = $_POST['email'];
$password = $_POST['password'];

// Validate Form
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

if (!empty($errors)) {
    return view('login/create.view.php', [
        'heading' => 'Log In',
        'errors' => $errors
    ]);
}

// check if account already exists
$db = App::db();

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if (!$user || !password_verify($password, $user['password'])) {
    $errors['email'] = 'Invalid account credentials.';

    return view('login/create.view.php', [
        'heading' => 'Log In',
        'errors' => $errors
    ]);
}

$_SESSION['user'] = [
    'email' => $email
];

redirect('/');