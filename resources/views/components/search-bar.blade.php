@php
$categories = [
'All' => '',
'Art' => 'art',
'Celebrities' => 'celebrities',
'Collectibles' => 'collectibles',
'Domain Names' => 'domain-names',
'Gaming' => 'gaming',
'Memberships' => 'memberships',
'Memes' => 'memes',
'Music' => 'music',
'PFPs' => 'pfps',
'Photography' => 'photography',
'Sport' => 'sport',
'Trading Cards' => 'trading-cards',
'Utilities' => 'utilities',
'Videos' => 'videos',
'Virtual Worlds' => 'virtual-worlds',
'Other' => 'other',
];
@endphp

<form method="GET" action="{{ route(\Request::route()->getName()) }}">
  <div class="flex gap-4 items-center max-w-2xl mx-auto">
    {{-- Searchbar --}}
    <div class="relative w-full">
      <x-feathericon-search class="absolute top-3.5 left-4 w-5 h-5 text-gray-600 dark:text-gray-400" />

      <input type="search" id="search" name="search" placeholder="Search NFTs, collections and more..."
        value="{{ request()->get('search') }}"
        class="form-input w-full pl-12 {{ request()->has('search') ? 'pr-12' : 'pr-4' }} py-3 border-none rounded-2xl shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        @keyup.enter="event.preventDefault(); this.closest('form').submit();" />

      <div class="absolute top-2 right-2 flex gap-2">
        {{-- Clear search button --}}
        @if(request()->has('search') || request()->has('category'))
        <a href="{{ route(\Request::route()->getName()) }}"
          class="p-2 text-gray-600 dark:text-gray-400 bg-gray-100 dark:bg-gray-900 rounded-full transition">
          <x-feathericon-x class="w-4 h-4" />
        </a>
        @endif
        <x-primary-button class="hidden sm:block">Search</x-primary-button>
      </div>
    </div>

    {{-- Filters button --}}
    <button class="p-2 text-gray-600 dark:text-gray-400 rounded-full transition" x-data=""
      x-on:click.prevent="$dispatch('open-modal', 'filters')">
      <x-feathericon-sliders class="w-5 h-5" />
    </button>

    {{-- Filters modal --}}
    <x-modal name="filters" :show="false" focusable>
      <div class="p-6">
        <header>
          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Filters') }}
          </h2>

          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Apply one or more filters to quickly find exactly what you need.") }}
          </p>
        </header>

        <div class="mt-6 space-y-6">
          <div class="flex flex-col items-start">

            {{--
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-2 block w-full" :value="old('name', $user->name)"
              required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}

            <x-input-label for="marketplace" :value="__('Marketplace')" />
            <select id="marketplace" name="marketplace"
              class="form-select mt-2 block w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
              <option value="">Select marketplace</option>

              <option value="blur">Blur</option>
              <option value="foundation">Foundation</option>
              <option value="gamma-io">Gamma.io</option>
              <option value="knownorigin">KnownOrigin</option>
              <option value="magiceden">MagicEden</option>
              <option value="mintable">Mintable</option>
              <option value="nifty-gateway">Nifty Gateway</option>
              <option value="objkt-com">Objkt.com</option>
              <option value="oneplanet-nft">OnePlanet NFT</option>
              <option value="opensea">OpenSea</option>
              <option value="rarible">Rarible</option>
              <option value="superare">SuperRare</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div class="flex flex-col items-start">
            <x-input-label for="blockchain" :value="__('Blockchain')" />
            <select id="blockchain" name="blockchain"
              class="form-select mt-2 block w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
              <option value="">Select blockchain</option>

              <option value="bitcoin">Bitcoin</option>
              <option value="binance-chain">Binance Chain</option>
              <option value="ethereum">Ethereum</option>
              <option value="flow">Flow</option>
              <option value="polygon">Polygon</option>
              <option value="solana">Solana</option>
              <option value="tezos">Tezos</option>
            </select>
          </div>
          <div class="flex flex-col items-start">
            <x-input-label for="currency" :value="__('Currency')" />
            <select id="currency" name="currency"
              class="form-select mt-2 block w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
              <option value="">Select currency</option>

              <option value="btc">BTC</option>
              <option value="bnb">BNB</option>
              <option value="eth">ETH</option>
              <option value="weth">WETH</option>
              <option value="flow">FLOW</option>
              <option value="matic">MATIC</option>
              <option value="sol">SOL</option>
              <option value="xtz">XTZ</option>
            </select>
          </div>
          <div class="flex gap-4">
            <div class="flex flex-col items-start">
              <x-input-label for="minPrice" :value="__('Min price')" />
              <x-text-input id="minPrice" name="minPrice" type="number" step="any" class="mt-2 block w-full"
                :value="__('0.00')" />
              <x-input-error class="mt-2" :messages="$errors->get('minPrice')" />
            </div>
            <div class="flex flex-col items-start">
              <x-input-label for="maxPrice" :value="__('Max price')" />
              <x-text-input id="maxPrice" name="maxPrice" type="number" step="any" class="mt-2 block w-full"
                :value="__('9999.99')" />
              <x-input-error class="mt-2" :messages="$errors->get('maxPrice')" />
            </div>
          </div>

          <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
              {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
              {{ __('Apply filters') }}
            </x-primary-button>
          </div>
        </div>
      </div>
    </x-modal>
  </div>

  {{-- Sort and Categories select inputs --}}
  <div class="w-full flex items-center justify-between mt-4 px-0 sm:px-4">
    <div class="flex flex-col items-start">
      <select id="sort" name="sort"
        class="form-select text-sm mt-2 block w-full border-none rounded-xl shadow-sm bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        <option value="latest">Latest</option>
        <option value="oldest">Oldest</option>
        <option value="lowestPrice">Lowest price</option>
        <option value="highestPrice">Highest price</option>
      </select>
    </div>
    <div class="flex flex-col items-start">
      <select id="category" name="category"
        class="form-select text-sm mt-2 block w-full border-none rounded-xl shadow-sm bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        {{-- Loop through categories --}}
        @foreach ($categories as $categoryName => $categorySlug)
        <option value="{{ $categorySlug }}" @if(request()->get('category', '') == $categorySlug) selected @endif>
          {{ $categoryName }}
        </option>
        @endforeach
      </select>
    </div>
  </div>
</form>