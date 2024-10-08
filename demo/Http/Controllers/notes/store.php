<?php

use Core\{App, Database, Validator, Response};

$db = App::resolve(Database::class);

$errors = [];
$body = $_POST['body'];

if (!Validator::string(value: $body, max: 1000)) {
    $errors['body'] = 'The body is required and can not be more than 1,000 characters';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
    'body' => $body,
    'user_id' => 5
]);

redirect('/notes', Response::SEE_OTHER);
