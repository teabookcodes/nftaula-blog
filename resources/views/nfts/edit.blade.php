<x-app-layout>
    <x-slot name="header">
        <h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update NFT') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-xl">
            <div class="max-w-xl">
                <form method="POST" action="{{ route('nfts.update', $nft) }}">
                    @csrf
                    @method('patch')
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" placeholder="Name" class="mt-2 block w-full"
                        :value="old('name', $nft->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />

                    <x-input-label for="description" class="mt-4" :value="__('Description')" />
                    <textarea name="description" placeholder="{{ __('If you want, you can describe your NFT here') }}"
                        class="form-textarea mt-2 w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ old('description', $nft->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    <div class="mt-4 space-x-2">
                        <x-primary-button class="mt-4">{{ __('Update') }}</x-primary-button>
                        <a href="{{ route('nfts.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>