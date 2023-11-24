<form method="GET" action="{{ route('home') }}" class="flex gap-4 items-center max-w-2xl mx-auto"> {{-- Searchbar --}}
  <div class="relative w-full">
    <x-feathericon-search class="absolute top-3.5 left-4 w-5 h-5 text-gray-600 dark:text-gray-400" />

    <input type="search" id="search" name="search" placeholder="Search NFTs, collections and more..."
      value="{{ request()->get('search') }}"
      class="form-input w-full pl-12 py-3 border-none rounded-2xl shadow-sm bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
      @keyup.enter="event.preventDefault(); this.closest('form').submit();" />
  </div>

  {{-- Filters button --}}
  <button class="p-2 text-gray-600 dark:text-gray-400 rounded-full transition">
    <x-feathericon-sliders class="w-5 h-5" />
  </button>

</form>