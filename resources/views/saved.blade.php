<x-app-layout>
    <x-slot name="header">
        <h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Saved NFTs and collections') }}
        </h2>
    </x-slot>

    <div class="w-full flex flex-wrap text-gray-600 dark:text-gray-400">

        @if ($savedNfts->count() > 0 || $savedCollections->count() > 0)
        <div class="w-full flex flex-wrap text-gray-600 dark:text-gray-400">
            @foreach ($savedNfts as $savedNft)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:px-3 pb-6 relative">
                <div class="z-10 absolute top-0 right-0 sm:right-3 flex gap-2 p-4 rounded-xl">
                    <form method="POST"
                        action="{{ $savedNft->nft->savedNfts->where('user_id', auth()->id())->count() > 0 ? route('nfts.unsave', $savedNft->nft) : route('nfts.save', $savedNft->nft) }}">
                        @csrf
                        @if($savedNft->nft->savedNfts->where('user_id', auth()->id())->count() > 0)
                        @method('DELETE')
                        @endif

                        <button type="submit"
                            class="p-2 rounded-full {{ $savedNft->nft->savedNfts->where('user_id', auth()->id())->count() > 0 ? 'bg-indigo-500 text-white' : 'bg-gray-100 dark:bg-gray-900' }}">
                            <x-feathericon-bookmark class="w-4 h-4" />
                        </button>
                    </form>

                    <x-menubar-link :active="false" href="{{ route('logout') }}"
                        class="p-2 rounded-full bg-gray-100 dark:bg-gray-900">
                        <x-feathericon-share-2 class="w-4 h-4" />
                    </x-menubar-link>
                </div>
                <a href="{{ route('nfts.show', $savedNft->nft) }}">
                    <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl">
                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $savedNft->nft->name }}</p>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{
                            $savedNft->nft->collection_name }}</p>
                        <img src="{{ asset('storage/nft_images/' . $savedNft->nft->image) }}"
                            class="w-full h-56 object-cover mt-4 rounded-lg" />
                        <div class="absolute bottom-10 left-2 sm:left-5 p-4 rounded-xl">
                            <span
                                class="text-sm font-medium text-gray-800 dark:text-gray-200 py-2 px-3 bg-gray-100/80 dark:bg-gray-900/80 rounded-full">{{
                                $savedNft->nft->price }} <span class="uppercase">{{ $savedNft->nft->currency
                                    }}</span></span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            @foreach ($savedCollections as $savedCollection)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:px-3 pb-6 relative">
                <!-- Display saved Collection information here -->
            </div>
            @endforeach
        </div>
        @else
        <div class="pt-12 flex gap-2 items-center justify-center w-full">
            <p>No saved NFTs or collections found</p>
            <x-feathericon-frown class="w-5 h-5" />
        </div>
        @endif
    </div>

</x-app-layout>