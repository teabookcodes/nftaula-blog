<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" enctype="multipart/form-data" action="{{ route('articles.update', $article) }}"
            class="flex flex-col gap-4">
            @csrf
            @method('patch')
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <input id="title" name="title" type="text" placeholder="Title"
                    class="form-input border-none rounded-xl shadow-sm
                bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500
                focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-2 block w-full" value="{{ old('title', $article->title) }}" required
                    autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="image" class="mt-4" :value="__('Cover Image')" />
                <input id="image" name="image" type="file"
                    class="form-input border-none rounded-xl shadow-sm
                bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500
                focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-2 block w-full" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="content" :value="__('Content')" />
                <textarea name="content" placeholder="{{ __('What\'s on your mind?') }}"
                    class="form-textarea mt-2 w-full border-none rounded-xl shadow-sm bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    required>{{ old('content', $article->content) }}</textarea>
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <div class="flex justify-end gap-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('home') }}"
                    class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">{{
                    __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>