<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-semibold leading-6 text-gray-900">
                            Body
                        </label>
                        <div class="mt-2">
                                <textarea id="body" name="body" rows="5" required
                                          placeholder="Here's and idea for a note..."
                                          class="p-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400">
                                </textarea>
                        </div>
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

<?php require('partials/footer.php'); ?>