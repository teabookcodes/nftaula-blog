<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" enctype="multipart/form-data" action="{{ route('articles.store') }}"
            class="flex flex-col gap-4">
            @csrf
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <input id="title" name="title" type="text" placeholder="Title"
                    class="form-input border-none rounded-xl shadow-sm
                bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500
                focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-2 block w-full" :value="old('title')" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="image" class="mt-4" :value="__('Cover Image')" />
                <input id="image" name="image" type="file"
                    class="form-input border-none rounded-xl shadow-sm
                bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500
                focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mt-2 block w-full" required />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="editor" :value="__('Content')" />
                <textarea name="content" placeholder="{{ __('What\'s on your mind?') }}"
                    class="form-textarea mt-2 w-full border-none rounded-xl shadow-sm bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    required>{{ old('content') }}</textarea>
                {{-- <div id="content" name="content" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div> --}}
                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <x-primary-button class="self-end">{{ __('Publish') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>