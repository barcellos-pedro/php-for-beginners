<?php

use Core\{Database, Validator, Response};

$config = config('database');
$db = new Database($config);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];

    if (!Validator::string(value: $body, max: 1000)) {
        $errors['body'] = 'The body is required and can not be more than 1,000 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $body,
            'user_id' => 1
        ]);

        redirect('/notes', Response::SEE_OTHER);
    }
}

view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
]);