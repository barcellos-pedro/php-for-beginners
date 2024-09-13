<?php

require 'functions.php';
//require 'router.php';

// connect to our MySQL Database
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4;user=root;password=admin";
$pdo = new PDO($dsn);

$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<p>{$post['id']} - {$post['title']}</p>";
}