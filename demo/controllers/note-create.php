<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = $_POST['body'];
    $errors = [];

    if (!Validator::string(value: $body, max: 1000)) {
        $errors['body'] = 'The body is required and can not be more than 1,000 characters';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
            'body' => $body,
            'user_id' => 5
        ]);
    }
}

require 'views/note-create.view.php';
