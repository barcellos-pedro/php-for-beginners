<?php

$heading = 'Create Note';

$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($submitted) {
    dd($_POST);
}

require 'views/note-create.view.php';
