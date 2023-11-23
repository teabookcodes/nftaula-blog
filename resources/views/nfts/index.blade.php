<x-app-layout>
    <x-slot name="header">
        <h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New NFT') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-xl">
            <div class="max-w-xl">
                <form method="POST" action="{{ route('nfts.store') }}">
                    @csrf
                    <textarea
                        name="message"
                        placeholder="{{ __('What\'s on your mind?') }}"
                        class="form-textarea w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    >{{ old('message') }}</textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    <x-primary-button class="mt-4">{{ __('List') }}</x-primary-button>
                </form>
            </div>
        </div>
</x-app-layout>