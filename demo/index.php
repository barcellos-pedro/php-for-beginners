<?php

$greeting = "Hello";
$greeting = "$greeting Everybody";
echo $greeting;

$name = "Dark Matter";
$read = true;
$message = "";

if ($read) {
    $message = "You have read $name";
} else {
    $message = "You have NOT read $name";
}

$books = [
    "Do Androids Dream of Eletric Sheep",
    "The Langoliers",
    "Hail Mary",
];

$books2 = [
    [
        "name" => "Do Androids Dream of Eletric Sheep",
        "author" => "Philip K. Dick",
        "purchaseUrl" => "https://example.com",
        "releaseYear" => 1968
    ],
    [
        "name" => "Project Hail Mary",
        "author" => "Andy Weir",
        "purchaseUrl" => "https://example.com",
        "releaseYear" => 2021
    ],
    [
        "name" => "The Martian",
        "author" => "Andy Weir",
        "purchaseUrl" => "https://example.com",
        "releaseYear" => 2011
    ],
];

function filterByAuthor($books, $author)
{
    $filteredBooks = [];

    foreach ($books as $book) {
        if ($book['author'] === $author) {
            $filteredBooks[] = $book;
        }
    }

    return $filteredBooks;
}

function filterBy($items, $key, $value)
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($item[$key] === $value) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
}

function filter($items, $fn)
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
}

//        $filteredBooks = filterBy($books2, 'releaseYear', 2000);

//        $filteredBooks = filter($books2, function ($book) {
//            return $book['releaseYear'] > 2000;
//        });


//$filteredBooks = array_filter($books2, fn($book) => $book['author'] !== 'Andy Weir');

$isAndyWeir = fn ($book) => $book['author'] === 'Andy Weir';
$filteredBooks = array_filter($books2, $isAndyWeir);

require 'index.view.php';