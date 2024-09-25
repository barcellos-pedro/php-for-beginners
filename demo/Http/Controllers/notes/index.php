<?php

use Core\App;

$db = App::db();

$notes = $db->query('SELECT * FROM notes WHERE user_id = 5')->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);