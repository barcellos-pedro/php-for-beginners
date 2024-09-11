<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <style>
        body {
            color: white;
            background-color: black;
            font-family: sans-serif;
        }

        hr {
            margin: 3em 0;
        }
    </style>
</head>
<body>

<p><?= $message ?></p>

<hr/>

<p>Arrays</p>

<p>Recommended Books</p>

<ul>
    <?php foreach ($books as $book) {
        echo "<li>$book</li>";
    } ?>

    <br/>

    <?php foreach ($books as $book) : ?>
        <li><?= $book ?></li>
    <?php endforeach; ?>
</ul>

<hr/>

<p>Associative Array</p>

<?php foreach ($books2 as $book) : ?>
    <a style="display: block" href="<?= $book['purchaseUrl'] ?>" target="_blank" title="Buy book!">
        <?= $book["name"] ?> - <?= $book["author"] ?> (<?= $book['releaseYear'] ?>)
    </a>
<?php endforeach; ?>

<hr/>

<p>Functions and Filters</p>

<?php foreach ($books2 as $book) : ?>
    <?php if ($book['author'] === 'Andy Weir') : ?>
        <a style="display: block" href="<?= $book['purchaseUrl'] ?>" target="_blank" title="Buy book!">
            <?= $book["name"] ?> - <?= $book["author"] ?> (<?= $book['releaseYear'] ?>)
        </a>
    <?php endif; ?>
<?php endforeach; ?>

<br/>

<?php foreach (filterByAuthor($books2, 'Philip K. Dick') as $book) : ?>
    <a style="display: block" href="<?= $book['purchaseUrl'] ?>" target="_blank" title="Buy book!">
        <?= $book["name"] ?> - <?= $book["author"] ?> (<?= $book['releaseYear'] ?>)
    </a>
<?php endforeach; ?>

<hr/>

<p>Lambda functions</p>

<?php foreach ($filteredBooks as $book) : ?>
    <a style="display: block" href="<?= $book['purchaseUrl'] ?>" target="_blank" title="Buy book!">
        <?= $book["name"] ?> - <?= $book["author"] ?> (<?= $book['releaseYear'] ?>)
    </a>
<?php endforeach; ?>
</body>
</html>