<div class="flex gap-2 items-center w-full sm:w-4/5 lg:w-2/5 mx-auto mb-4">
    {{-- Searchbar --}}
    <div class="relative w-full">
        <x-feathericon-search class="absolute top-2.5 left-4 w-5 h-5 text-gray-600 dark:text-gray-400" />

        <input
            type="search"
            placeholder="Search NFTs, collections and more..."
            class="form-input w-full pl-12 border-none rounded-2xl bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-70"
        />
    </div>

    {{-- Filters button --}}
    <button class="p-2 text-gray-600 dark:text-gray-400 rounded-full transition">
      <x-feathericon-sliders class="w-5 h-5" />
    </button>
  </div>