<?php require 'views/partials/head.php'; ?>
<?php partial('nav'); ?>
<?php require 'views/partials/banner.php'; ?>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-500 hover:underline">
            Go back to Notes
        </a>

        <p class="mt-6">
            <?= sanitize($note['body']) ?>
        </p>
    </main>

<?php partial('footer'); ?>