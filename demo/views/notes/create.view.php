<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/notes">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-semibold leading-6 text-gray-900">
                            Body
                        </label>
                        <div class="mt-2">
                            <textarea
                                    rows="5"
                                    id="body"
                                    name="body"
                                    placeholder="Here's and idea for a note..."
                                    class="p-3 block w-full rounded-md border-0 py-1.5 text-gray-900"
                            ><?= old('body') ?></textarea>
                        </div>

                        <?php if ($errors['body'] ?? false) : ?>
                            <p class="mt-5 text-red-400 font-semibold">
                                <?= $errors['body'] ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/notes" class="text-sm font-semibold leading-6 text-gray-900">
                    Cancel
                </a>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </form>
    </main>

<?php require base_path('views/partials/footer.php'); ?>