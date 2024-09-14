<?php

$config = require('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];
$heading = "Note # {$id}";

$query = 'SELECT * FROM notes WHERE id = :id';
$note = $db->query($query, ['id' => $id])->fetch();

require 'views/note.view.php';