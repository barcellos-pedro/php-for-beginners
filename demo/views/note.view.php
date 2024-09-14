<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/" class="text-blue-500 hover:underline">
            Go back to Notes
        </a>

        <p class="mt-6">
            <?= $note['body'] ?>
        </p>
    </main>

<?php require('partials/footer.php'); ?>