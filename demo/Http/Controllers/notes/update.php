<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 5;

$id = $_POST['id'];
$body = $_POST['body'];

// find corresponding note
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $id
])->findOrFail();

// authorize
authorize($note['user_id'] === $currentUserId);

// validate form
$errors = [];

if (!Validator::string(value: $body, max: 1000)) {
    $errors['body'] = 'The body is required and can not be more than 1,000 characters';
}

// if no validation errors, update the record in the notes database table
if (!empty($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Create Note',
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'id' => $id,
    'body' => $body
]);

redirect('/notes');