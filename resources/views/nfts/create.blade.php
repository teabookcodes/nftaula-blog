<x-app-layout>
    <x-slot name="header">
        <h2 class="my-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New NFT') }}
        </h2>
    </x-slot>

    <div class="flex flex-col gap-8">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-xl">
            <form method="POST" enctype="multipart/form-data" action="{{ route('nfts.store') }}">
                @csrf
                <div class="w-full flex flex-col md:flex-row gap-0 md:gap-8">
                    <div class="w-full md:w-1/2">
                        {{-- Name --}}
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" placeholder="Name" class="mt-2 block w-full"
                            :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />

                        {{-- Collection name --}}
                        <x-input-label for="collection_name" :value="__('Collection name')" class="mt-4" />
                        <x-text-input id="collection_name" name="collection_name" type="text"
                            placeholder="Collection name" class="mt-2 block w-full" :value="old('collection_name')" />
                        <x-input-error class="mt-2" :messages="$errors->get('collection_name')" />

                        {{-- Image --}}
                        <x-input-label for="image" class="mt-4" :value="__('Image')" />
                        <x-text-input id="image" name="image" type="file" class="mt-2 block w-full" required />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />

                        {{-- Category --}}
                        <x-input-label for="category" class="mt-4" :value="__('Category')" />
                        <select id="category" name="category"
                            class="form-select mt-2 block w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">

                            <option value="">Select category</option>

                            <option value="art">Art</option>
                            <option value="celebrities">Celebrities</option>
                            <option value="collectibles">Collectibles</option>
                            <option value="domain-names">Domain Names</option>
                            <option value="gaming">Gaming</option>
                            <option value="memberships">Memberships</option>
                            <option value="memes">Memes</option>
                            <option value="music">Music</option>
                            <option value="pfps">PFPs</option>
                            <option value="photography">Photography</option>
                            <option value="sport">Sport</option>
                            <option value="trading-cards">Trading Cards</option>
                            <option value="utilities">Utilities</option>
                            <option value="videos">Videos</option>
                            <option value="virtual-worlds">Virtual Worlds</option>
                            <option value="other">Other</option>
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />

                        {{-- Marketplace --}}
                        <x-input-label for="marketplace" :value="__('Marketplace')" class="mt-4" />
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
                        <x-input-error class="mt-2" :messages="$errors->get('marketplace')" />

                        {{-- Blockchain --}}
                        <x-input-label for="blockchain" :value="__('Blockchain')" class="mt-4" />
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
                        <x-input-error class="mt-2" :messages="$errors->get('blockchain')" />

                        {{-- Price --}}
                        <x-input-label for="price" :value="__('Price')" class="mt-4" />
                        <x-text-input id="price" name="price" type="number" step="any" placeholder="Price"
                            class="mt-2 block w-full" :value="old('price')" />
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />

                        {{-- Currency --}}
                        <x-input-label for="currency" :value="__('Currency')" class="mt-4" />
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
                        <x-input-error class="mt-2" :messages="$errors->get('currency')" />
                    </div>

                    <div class="w-full md:w-1/2">
                        {{-- Description --}}
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea name="description"
                            placeholder="{{ __('If you want, you can describe your NFT here') }}"
                            class="form-textarea mt-2 w-full border-none rounded-xl shadow-sm bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />

                        {{-- NFT Marketplace link --}}
                        <x-input-label for="marketplace_link" :value="__('Marketplace URL')" class="mt-4" />
                        <x-text-input id="marketplace_link" name="marketplace_link" type="text"
                            placeholder="Link to your NFT on a marketplace" class="mt-2 block w-full"
                            :value="old('marketplace_link')" />
                        <x-input-error class="mt-2" :messages="$errors->get('marketplace_link')" />

                        {{-- Created using AI --}}
                        <div class="block mt-4">
                            <x-input-label for="created_using_ai" class="inline-flex items-center">
                                <input id="created_using_ai" type="checkbox" value="1"
                                    class="form-checkbox rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                    name="created_using_ai">
                                <span class="ms-2">{{ __('Created using AI') }}</span>
                            </x-input-label>
                            <x-input-error class="mt-2" :messages="$errors->get('created_using_ai')" />
                        </div>

                        {{-- Submit --}}
                        <div class="w-full flex justify-start md:justify-end">
                            <x-primary-button class="mt-4">{{ __('List') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>