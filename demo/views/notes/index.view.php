<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul class="list-disc">
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= sanitize($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

<?php require base_path('views/partials/footer.php'); ?>