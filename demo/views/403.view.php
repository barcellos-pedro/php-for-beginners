<?php $heading = 'Not Found'; ?>
<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>

    <main class="flex flex-col justify-center items-center gap-3 h-screen">
        <p class="text-4xl font-semibold">You are not authorized to view this page.</p>
        <a href="/" class="text-2xl font-bold text-blue-500 hover:underline">
            Go back home
        </a>
    </main>

<?php require('partials/footer.php'); ?>