<x-app-layout>
    <x-slot name="header">
        <h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User profile') }}
        </h2>
    </x-slot>

    <div
        class="mx-auto max-w-sm text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl">
        <div class="p-6 flex items-center justify-center gap-8">
            <div class="flex flex-col gap-2">
                @if ($user->avatar)
                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" class="w-16 h-16 rounded-full" />
                @else
                <img class="w-16 h-16 rounded-full"
                    src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                    alt="{{ $user->name . ' avatar' }}" />
                @endif
            </div>
            <div class="flex flex-col items-start gap-4">
                <h2 class="text-center text-lg">{{ $user->name }}</h2>
                <x-secondary-button class="flex gap-2 items-center">
                    <x-feathericon-send class="w-3 h-3" />
                    Send message
                </x-secondary-button>
            </div>
        </div>
    </div>
    <h2 class="mt-16 mb-8 font-semibold text-lg sm:text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Listed NFTs') }}
    </h2>

    <div class="w-full flex flex-wrap text-gray-600 dark:text-gray-400">
        @unless (count($user->nfts) == 0)
        @foreach ($user->nfts as $nft)
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:px-3 pb-6 relative">
            <div class="z-10 absolute top-0 right-0 sm:right-3 flex gap-2 p-4 rounded-xl">
                @auth
                <form method="POST"
                    action="{{ $nft->savedNfts->where('user_id', auth()->id())->count() > 0 ? route('nfts.unsave', $nft) : route('nfts.save', $nft) }}">
                    @csrf
                    @if($nft->savedNfts->where('user_id', auth()->id())->count() > 0)
                    @method('DELETE')
                    @endif

                    <button type="submit"
                        class="p-2 rounded-full {{ $nft->savedNfts->where('user_id', auth()->id())->count() > 0 ? 'bg-indigo-500 text-white' : 'bg-gray-100 dark:bg-gray-900' }}">
                        <x-feathericon-bookmark class="w-4 h-4" />
                    </button>
                </form>
                @endauth

                <x-menubar-link :active="false"
                    href="https://twitter.com/intent/tweet?url={{ config('app.url') }}/nft/{{ $nft->id }}&text=Check%20out%20the%20{{ urlencode($nft->name) }}%20on%20NFTaula.io&via=NFTaula&media={{ config('app.url') }}/storage/nft_images/{{ $nft->image }}"
                    target="_blank" rel="nofollow noopener" class="p-2 rounded-full bg-gray-100 dark:bg-gray-900">
                    <x-feathericon-share-2 class="w-4 h-4" />
                </x-menubar-link>
            </div>
            <a href={{ route('nft-detail', $nft) }}>
                <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl">
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $nft->name }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ $nft->collection_name }}</p>
                    <img src="{{ asset('storage/nft_images/' . $nft->image) }}"
                        class="w-full h-56 object-cover mt-4 rounded-lg" />
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
        @else
        <div class="flex gap-2 items-center justify-center w-full">
            <p>User hasn't uploaded any NFTs yet</p>
        </div>
        @endunless
    </div>

    <h2 class="my-8 font-semibold text-lg sm:text-center text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Listed Collections') }}
    </h2>

    <div class="w-full flex flex-wrap text-gray-600 dark:text-gray-400">
        @unless (count($user->collections) == 0)
        @foreach ($user->collections as $collection)
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 sm:px-3 pb-6 relative">
            <div class="z-10 absolute top-0 right-0 sm:right-3 flex gap-2 p-4 rounded-xl">
                @auth
                <form method="POST"
                    action="{{ $collection->savedCollections->where('user_id', auth()->id())->count() > 0 ? route('collections.unsave', $collection) : route('collections.save', $collection) }}">
                    @csrf
                    @if($collection->savedCollections->where('user_id', auth()->id())->count() > 0)
                    @method('DELETE')
                    @endif

                    <button type="submit"
                        class="p-2 rounded-full {{ $collection->savedCollections->where('user_id', auth()->id())->count() > 0 ? 'bg-indigo-500 text-white' : 'bg-gray-100 dark:bg-gray-900' }}">
                        <x-feathericon-bookmark class="w-4 h-4" />
                    </button>
                </form>
                @endauth

                <x-menubar-link :active="false"
                    href="https://twitter.com/intent/tweet?url={{ config('app.url') }}/collection/{{ $collection->id }}&text=Check%20out%20the%20{{ urlencode($collection->name) }}%20on%20NFTaula.io&via=NFTaula&media={{ config('app.url') }}/storage/nft_images/{{ $collection->image }}"
                    target="_blank" rel="nofollow noopener" class="p-2 rounded-full bg-gray-100 dark:bg-gray-900">
                    <x-feathericon-share-2 class="w-4 h-4" />
                </x-menubar-link>
            </div>
            <a href={{ route('collection-detail', $collection) }}>
                <div class="p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl">
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $collection->name }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">{{ $collection->category }}
                    </p>
                    <img src="{{ asset('storage/collection_images/' . $collection->image) }}"
                        class="w-full h-56 object-cover mt-4 rounded-lg" />
                    <div class="absolute bottom-10 left-2 sm:left-5 p-4 rounded-xl">
                        <span
                            class="text-sm font-medium text-gray-800 dark:text-gray-200 py-2 px-3 bg-gray-100/80 dark:bg-gray-900/80 rounded-full">{{
                            $collection->floor_price }}
                            <span class="uppercase">{{ $collection->currency }}</span>
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
        <div class="flex gap-2 items-center justify-center w-full">
            <p>User hasn't uploaded any collections yet</p>
        </div>
        @endunless
    </div>
</x-app-layout>