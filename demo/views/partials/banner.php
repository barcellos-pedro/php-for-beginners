<header class="bg-white shadow">
    <div class="flex justify-between mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            <?= $heading ?>
        </h1>

        <?php if (urlIs('/notes')) : ?>
            <a href="/notes/create"
               class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                Create Note
            </a>
        <?php endif; ?>
    </div>
</header>