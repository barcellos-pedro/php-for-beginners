<?php

use Core\Database;

$config = config('database');
$db = new Database($config);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 5')->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);