<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/notes" class="text-blue-500 hover:underline">
            Go back to Notes
        </a>

        <p class="mt-6">
            <?= sanitize($note['body']) ?>
        </p>

        <form method="POST" class="mt-8">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-600">
                Delete
            </button>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>