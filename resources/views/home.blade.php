<x-app-layout>
    <x-slot name="header">
        <x-search-bar />
    </x-slot>

    <div class="w-full flex flex-wrap">
        @unless (count($nfts) == 0)
        @foreach ($nfts as $nft)
        <div class="flex 2xl:w-1/5 lg:w-1/4 md:w-1/3 sm:w-1/2 sm:px-3 pb-6 w-full">
            <div class="p-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl">

                <div class="p-6 flex space-x-2">

                    <x-feathericon-image />

                    <div class="flex-1">

                        <div class="flex justify-between items-center">

                            <div>

                                <span class="text-gray-800 dark:text-gray-200">{{ $nft->user->name }}</span>

                                <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{
                                    $nft->created_at->format('j
                                    M Y, g:i
                                    a') }}</small>

                            </div>

                        </div>

                        <p class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-100">{{ $nft->name }}</p>
                        <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $nft->description }}</p>

                    </div>

                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="p-4 w-full">
            <p>No NFTs or collections found</p>
        </div>
        @endunless
    </div>
</x-app-layout>