<?php

$config = require('config.php');
$db = new Database($config['database']);

$currentUserId = 5;
$heading = "Note";

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require 'views/notes/show.view.php';