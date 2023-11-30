<x-app-layout>
    <x-slot name="header">
        <h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="sm:px-3">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>

        <h2 class="my-8 font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('What do you want to do?') }}
        </h2>

        <div class="flex gap-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl hover:scale-105 transition">
                <a href={{ route('nfts.create') }}
                    class="flex gap-2  items-center p-6 text-gray-900 dark:text-gray-100">
                    <x-feathericon-plus />
                    {{ __("List new NFT") }}
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl hover:scale-105 transition">
                <a href={{ route('collections.create') }}
                    class="flex gap-2 items-center p-6 text-gray-900 dark:text-gray-100">
                    <x-feathericon-plus />
                    {{ __("List new collection") }}
                </a>
            </div>
        </div>

        <h2 class="my-8 font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your NFTs') }}
        </h2>
    </div>

    <div class="w-full flex flex-wrap text-gray-600 dark:text-gray-400">

        @foreach ($nfts as $nft)

        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:px-3 pb-6 relative">
            <div class="z-10 absolute top-0 right-0 sm:right-3 flex gap-2 p-4 rounded-xl">
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
            <a href={{ route('nft-detail', $nft) }}>
                <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl">
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $nft->name }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ $nft->collection_name }}</p>
                    <img src="{{ asset('storage/nft_images/' . $nft->image) }}"
                        class="w-full h-40 object-cover mt-4 rounded-lg" />
                    <div class="absolute bottom-10 left-2 sm:left-5 p-4 rounded-xl">
                        <span
                            class="text-sm font-medium text-gray-800 dark:text-gray-200 py-2 px-3 bg-gray-100/80 dark:bg-gray-900/80 rounded-full">{{
                            $nft->price }}
                            <span class="uppercase">{{ $nft->currency }}</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>

        @endforeach
    </div>

    <div class="sm:px-3">

        <h2 class="my-8 font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Collections') }}
        </h2>
    </div>

    <div class="w-full flex flex-wrap text-gray-600 dark:text-gray-400">

        @foreach ($collections as $collection)

        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:px-3 pb-6 relative">
            <div class="z-10 absolute top-0 right-0 sm:right-3 flex gap-2 p-4 rounded-xl">
                @if ($collection->user->is(auth()->user()))
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <x-feathericon-more-horizontal class="text-gray-600 dark:text-gray-400" />
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('collections.edit', $collection)">
                            {{ __('Edit') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('collections.destroy', $collection) }}">
                            @csrf
                            @method('delete')
                            <x-dropdown-link :href="route('collections.destroy', $collection)"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Delete') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endif
            </div>
            <a href={{ route('collection-detail', $collection) }}>
                <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl">
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $collection->name }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400 capitalize">{{ $collection->category
                        }}</p>

                    <img src="{{ asset('storage/collection_images/' . $collection->image) }}"
                        class="w-full h-40 object-cover mt-4 rounded-lg" />
                    <div class="absolute bottom-10 left-2 sm:left-5 p-4 rounded-xl">
                        <span
                            class="text-sm font-medium text-gray-800 dark:text-gray-200 py-2 px-3 bg-gray-100/80 dark:bg-gray-900/80 rounded-full">FLOOR
                            {{
                            $collection->floor_price }}
                            <span class="uppercase">{{ $collection->currency }}</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>

        @endforeach
    </div>

</x-app-layout>