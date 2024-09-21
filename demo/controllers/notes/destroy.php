<?php

use Core\Database;

$config = config('database');
$db = new Database($config);

$currentUserId = 1;

$id = $_POST['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $id
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $id
]);

redirect('/notes');