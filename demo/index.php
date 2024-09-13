<?php

require 'functions.php';
//require 'router.php';
require 'Database.php';

$db = new Database();
$posts = $db->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<p>{$post['id']} - {$post['title']}</p>";
}