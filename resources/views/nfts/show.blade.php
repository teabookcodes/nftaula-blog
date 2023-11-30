<x-app-layout>
    <section class="text-gray-600 dark:text-gray-400 dark:bg-gray-900 body-font overflow-hidden">
        <div class="container px-5 py-6 md:py-24 mx-auto">
            <div class="mx-auto flex flex-wrap">
                <img alt="{{ $nft->name }}"
                    class="lg:w-1/2 w-full h-80 lg:h-auto lg:max-h-[520px] object-cover object-center border-2 border-gray-50 dark:border-gray-800 rounded-lg"
                    src="/storage/nft_images/{{ $nft->image }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <span class="text-sm title-font text-gray-500 tracking-widest uppercase">
                        {{$nft->collection_name }}</span>
                    <h1 class="text-gray-900 dark:text-white text-3xl title-font font-medium mb-1">{{ $nft->name }}</h1>
                    <div class="flex mb-4">
                        <a href="{{ route('user-profile', $nft->user->id) }}"
                            class="flex items-center text-gray-600 dark:text-gray-500 hover:text-indigo-500">{{
                            $nft->user->name }}</a>
                        <span class="flex ml-3 pl-3 my-2 border-l-2 border-gray-200 dark:border-gray-800 space-x-2s">
                            <a class="text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5">
                                    <path
                                        d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 00-1.032-.211 50.89 50.89 0 00-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 002.433 3.984L7.28 21.53A.75.75 0 016 21v-4.03a48.527 48.527 0 01-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979z" />
                                    <path
                                        d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 001.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0015.75 7.5z" />
                                </svg>
                            </a>
                        </span>
                    </div>
                    <p class="leading-relaxed mb-4">
                        @if($nft->description)
                        {{ $nft->description }}
                        @else
                        No description
                        @endif
                    </p>
                    <div class="flex border-t border-gray-200 dark:border-gray-800 py-2">
                        <span class="text-gray-500">Category</span>
                        <span class="ml-auto text-gray-900 dark:text-white">{{ $nft->category }}</span>
                    </div>
                    <div class="flex border-t border-gray-200 dark:border-gray-800 py-2">
                        <span class="text-gray-500">Blockchain</span>
                        <span class="ml-auto text-gray-900 dark:text-white">{{ $nft->blockchain
                            }}</span>
                    </div>
                    <div class="flex border-t border-b mb-6 border-gray-200 dark:border-gray-800 py-2">
                        <span class="text-gray-500">AI usage</span>
                        <span class="ml-auto text-gray-900 dark:text-white">{{
                            $nft->created_using_ai ? 'Yes' : 'No' }}</span>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between md:items-center">
                        <span class="title-font font-medium text-2xl text-gray-900 dark:text-white">{{ $nft->price . " "
                            . $nft->currency }}</span>
                        <div class="flex mt-4 md:mt-0">
                            <a href="{{ $nft->marketplace_link }}"
                                class="flex flex-grow md:ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Buy
                                on {{ $nft->marketplace }}</a>


                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M15.75 4.5a3 3 0 11.825 2.066l-8.421 4.679a3.002 3.002 0 010 1.51l8.421 4.679a3 3 0 11-.729 1.31l-8.421-4.678a3 3 0 110-4.132l8.421-4.679a3 3 0 01-.096-.755z"
                                    clip-rule="evenodd" />
                            </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>