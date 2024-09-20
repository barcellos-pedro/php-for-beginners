<?php

use Core\Database;

$config = config('database');
$db = new Database($config);

$currentUserId = 5;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('DELETE FROM notes WHERE id = :id', ['id' => $_POST['id']]);
    redirect('/notes');
}

view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);