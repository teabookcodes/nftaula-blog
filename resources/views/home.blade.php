@php
$categories = [
'Art',
'Celebrities',
'Collectibles',
'Domain Names',
'Gaming',
'Memberships',
'Memes',
'Music',
'PFPs',
'Photography',
'Sport',
'Trading Cards',
'Utilities',
'Videos',
'Virtual Worlds',
'Other',
];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Featured') }}
        </h2>
    </x-slot>

    <div>


        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute flex w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">

                        <img src="{{ '/images/pattern.svg' }}" alt="...">
                        <img src="https://dummyimage.com/800x600/E0E0F1/ffffff&text=Collection+1" alt="...">
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute flex w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">

                        <img src="{{ '/images/pattern.svg' }}" alt="...">
                        <img src="https://dummyimage.com/800x600/818CF8/ffffff&text=Collection+2" alt="...">
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute flex w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">

                        <img src="{{ '/images/pattern.svg' }}" alt="...">
                        <img src="https://dummyimage.com/800x600/6366F1/ffffff&text=Collection+3" alt="...">
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="absolute flex w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">

                        <img src="{{ '/images/pattern.svg' }}" alt="...">
                        <img src="https://dummyimage.com/800x600/3730A3/ffffff&text=Collection+4" alt="...">
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <div class="p-12 flex items-center justify-center gap-4">
        <a href="{{ route('browse-nfts') }}" class="inline-flex items-center px-4 py-2 bg-indigo-500 border
        border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest
        hover:bg-indigo-600 dark:hover:bg-indigo-400 focus:bg-indigo-600 dark:focus:bg-indigo-400 active:bg-indigo-700
        dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            Browse NFTs
        </a>
        <a href="{{ route('browse-collections') }}"
            class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-xl font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
            Browse collections
        </a>
    </div>

    <h2 class="my-8 flex gap-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <x-feathericon-image />
        {{ __('Explore NFTs by categories') }}
    </h2>

    <section class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-8 gap-4">
        @foreach ($categories as $category)
        <div
            class="bg-white dark:bg-gray-800 shadow-sm rounded-2xl hover:bg-indigo-500 dark:hover:bg-indigo-500 hover:scale-105 overflow-hidden transition">
            <a href="{{ route('browse-nfts') . '?category=' . Str::slug($category) }}"
                class=" block h-20 p-4 text-gray-900 dark:text-gray-100 hover:text-white">
                {{ $category }}
            </a>
        </div>
        @endforeach
    </section>

    <h2 class="my-8 flex gap-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <x-feathericon-layers />
        {{ __('Explore collections by categories') }}
    </h2>

    <section class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 2xl:grid-cols-8 gap-4">
        @foreach ($categories as $category)
        <div
            class="bg-white dark:bg-gray-800 shadow-sm rounded-2xl hover:bg-indigo-500 dark:hover:bg-indigo-500 hover:scale-105 overflow-hidden transition">
            <a href="{{ route('browse-collections') . '?category=' . Str::slug($category) }}"
                class=" block h-20 p-4 text-gray-900 dark:text-gray-100 hover:text-white">
                {{ $category }}
            </a>
        </div>
        @endforeach
    </section>

    <h2 class="mt-24 mb-8 text-center font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Feedback from our users') }}
    </h2>

    <section>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <blockquote class="twitter-tweet" data-theme="dark">
                <p lang="en" dir="ltr">Gm Nft world 🌞❤️❤️ just upload again struezz on <a
                        href="https://twitter.com/NFTaula?ref_src=twsrc%5Etfw">@NFTaula</a> 😍❤️ this amazing website
                    for nft marketing 😍 thanks for give me this amazing place <a
                        href="https://twitter.com/NFTbagari?ref_src=twsrc%5Etfw">@NFTbagari</a> 🤩<a
                        href="https://twitter.com/hashtag/NFTs?src=hash&amp;ref_src=twsrc%5Etfw">#NFTs</a> <a
                        href="https://twitter.com/hashtag/NFT?src=hash&amp;ref_src=twsrc%5Etfw">#NFT</a> <a
                        href="https://twitter.com/hashtag/NFTCommunity?src=hash&amp;ref_src=twsrc%5Etfw">#NFTCommunity</a>
                    <a href="https://t.co/mANrdCWSY2">pic.twitter.com/mANrdCWSY2</a>
                </p>&mdash; Struezz (@struezz) <a
                    href="https://twitter.com/struezz/status/1653204462121648128?ref_src=twsrc%5Etfw">May 2, 2023</a>
            </blockquote>

            <blockquote class="twitter-tweet" data-conversation="none" data-theme="dark">
                <p lang="en" dir="ltr">Thanks for the platform, i&#39;ve been uploaded some of my nft on <a
                        href="https://t.co/9paB2gONKP">https://t.co/9paB2gONKP</a> 🥂💕 <a
                        href="https://t.co/eHnRGqIf1p">pic.twitter.com/eHnRGqIf1p</a></p>&mdash; BLΞU. (@BleuNFT_) <a
                    href="https://twitter.com/BleuNFT_/status/1660548583912001542?ref_src=twsrc%5Etfw">May 22, 2023</a>
            </blockquote>

            <blockquote class="twitter-tweet" data-conversation="none" data-theme="dark">
                <p lang="en" dir="ltr">I think this website is very awesome. From appearance to operation. So, thank you
                    sir for your space on the website. I&#39;ve uploaded it there. 💖🤗 <a
                        href="https://t.co/KRmkl7GINO">pic.twitter.com/KRmkl7GINO</a></p>&mdash; Arshaka V2 || OS ||
                ERC-721 🐺 (@Arshaka_nft) <a
                    href="https://twitter.com/Arshaka_nft/status/1676857506667319296?ref_src=twsrc%5Etfw">July 6,
                    2023</a>
            </blockquote>

            <blockquote class="twitter-tweet" data-conversation="none" data-theme="dark">
                <p lang="en" dir="ltr">Gmgm☕☕🌄<br>Have a relaxing sunday🙂<br><br>Just listed my &quot;Barbie
                    belle&quot; on <a href="https://twitter.com/NFTaula?ref_src=twsrc%5Etfw">@NFTaula</a> by <a
                        href="https://twitter.com/NFTbagari?ref_src=twsrc%5Etfw">@NFTbagari</a><br><br>Such a cool and
                    easiest way to present art🥰 just love it..💜<a
                        href="https://twitter.com/hashtag/NFT?src=hash&amp;ref_src=twsrc%5Etfw">#NFT</a> <a
                        href="https://twitter.com/hashtag/nftart?src=hash&amp;ref_src=twsrc%5Etfw">#nftart</a> <a
                        href="https://t.co/5AztGVP4gP">pic.twitter.com/5AztGVP4gP</a></p>&mdash; ARSHIA ZAHID
                (@ttMK123456) <a
                    href="https://twitter.com/ttMK123456/status/1690588851507466240?ref_src=twsrc%5Etfw">August 13,
                    2023</a>
            </blockquote>

            <blockquote class="twitter-tweet" data-conversation="none" data-theme="dark">
                <p lang="en" dir="ltr">great idea, I registered and entered my nft collection entirely in free mint.
                    thanks for the chance</p>&mdash; MasterP&amp;Co (@____MasterP____) <a
                    href="https://twitter.com/____MasterP____/status/1655288249810669571?ref_src=twsrc%5Etfw">May 7,
                    2023</a>
            </blockquote>

            <blockquote class="twitter-tweet" data-conversation="none" data-theme="dark">
                <p lang="en" dir="ltr">What i like about it, thats not complicated and easy access 👌🏻</p>&mdash;
                Renalla (@RenallaNFT) <a
                    href="https://twitter.com/RenallaNFT/status/1659569039297896450?ref_src=twsrc%5Etfw">May 19,
                    2023</a>
            </blockquote>

            <blockquote class="twitter-tweet" data-conversation="none" data-theme="dark">
                <p lang="en" dir="ltr">Love everything about it. It&#39;s very simple and easy to use. 🤍🤍</p>&mdash;
                wizard_world (@wizardworld555) <a
                    href="https://twitter.com/wizardworld555/status/1660546916277719041?ref_src=twsrc%5Etfw">May 22,
                    2023</a>
            </blockquote>

            <blockquote class="twitter-tweet" data-conversation="none" data-theme="dark">
                <p lang="en" dir="ltr">It&#39;s awesome that creators can easily register and share their NFTs with all
                    the important details like name, description, and even price. The advanced search feature is really
                    helpful too, allowing collectors to filter NFTs by category, blockchain, currency, and price! 💖📱🚀
                </p>&mdash; Cats NFT 猫 🪸 (@CatsNFT011) <a
                    href="https://twitter.com/CatsNFT011/status/1659564754644369409?ref_src=twsrc%5Etfw">May 19,
                    2023</a>
            </blockquote>
    </section>

    <h3 class="my-8 text-center font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('...and much more') }}
    </h3>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</x-app-layout>