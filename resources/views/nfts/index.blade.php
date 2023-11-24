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
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" placeholder="Name" class="mt-2 block w-full"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />

                    <x-input-label for="description" class="mt-4" :value="__('Description')" />
                    <textarea name="description" placeholder="{{ __('If you want, you can describe your NFT here') }}"
                        class="form-textarea mt-2 w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    <x-primary-button class="mt-4">{{ __('List') }}</x-primary-button>
                </form>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-xl divide-y divide-gray-100 dark:divide-gray-900">

            @foreach ($nfts as $nft)

            <div class="p-6 flex space-x-2">

                <x-feathericon-image />

                <div class="flex-1">

                    <div class="flex justify-between items-center">

                        <div>

                            <span class="text-gray-800 dark:text-gray-200">{{ $nft->user->name }}</span>

                            <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ $nft->created_at->format('j M Y, g:i a') }}
                            </small>

                            @unless ($nft->created_at->eq($nft->updated_at))

                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>

                            @endunless

                        </div>

                        @if ($nft->user->is(auth()->user()))

                        <x-dropdown>

                            <x-slot name="trigger">

                                <button>

                                    <x-feathericon-more-horizontal class="text-gray-600 dark:text-gray-400" />

                                </button>

                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link :href="route('nfts.edit', $nft)">

                                    {{ __('Edit') }}

                                </x-dropdown-link>

                                <form method="POST" action="{{ route('nfts.destroy', $nft) }}">

                                    @csrf

                                    @method('delete')

                                    <x-dropdown-link :href="route('nfts.destroy', $nft)"
                                        onclick="event.preventDefault(); this.closest('form').submit();">

                                        {{ __('Delete') }}

                                    </x-dropdown-link>

                                </form>
                            </x-slot>

                        </x-dropdown>

                        @endif

                    </div>

                    <p class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-100">{{ $nft->name }}</p>
                    <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $nft->description }}</p>

                </div>

            </div>

            @endforeach

        </div>
</x-app-layout>