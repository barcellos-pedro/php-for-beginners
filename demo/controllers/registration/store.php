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
    return view('registration/create.view.php', [
        'heading' => 'Register',
        'errors' => $errors
    ]);
}

// check if account already exists
$db = App::db();

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

// if yes, redirect to login page
if ($user) {
    return redirect('/login');
}

// if not, save to database, log in, and redirect.
$db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
    'email' => $email,
    'password' => hashPassword($password)
]);

$_SESSION['user'] = [
    'email' => $email
];

redirect('/');