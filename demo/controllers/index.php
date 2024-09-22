<?php

$_SESSION['name'] = 'Pedro';

$name = $_SESSION['name'] ?? 'Guest';

view('index.view.php', [
    'heading' => "Hello, {$name}",
]);