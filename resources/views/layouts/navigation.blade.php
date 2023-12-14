<nav class="hidden sm:block relative w-full text-gray-800 dark:text-gray-200 py-2">
  <div class="container mx-auto px-4 xl:px-0 py-2 flex items-center justify-between">
    <div class="hidden lg:flex lg:w-1/3 items-center justify-start">
      <ul class="inline-flex space-x-8">
        {{-- {menuItems.map((item) => (
        <li key={item.name}>
          <Link href={item.href} className="inline-flex items-center text-base hover:text-primary">
          {item.name}
          </Link>
        </li>
        ))} --}}
      </ul>
    </div>
    <div class="w-full lg:w-1/3 flex items-center justify-center">
      {{--
      <Link href="/" class="block w-full max-w-[180px]">
      <Logo />
      </Link> --}}
      <x-application-logo />
    </div>
    <div class="hidden sm:flex lg:w-1/3 pr-2 lg:pr-6 2xl:pr-0 items-center justify-end gap-4">
      @auth
      <a href="{{ route('profile.edit') }}"
        class="p-2 text-gray-800 dark:text-gray-200 bg-white hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-xl transition">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
          <path
            d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
        </svg>
      </a>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button onclick="event.preventDefault(); this.closest('form').submit();"
          class="flex gap-2 items-center py-2 px-3 text-gray-800 dark:text-gray-200 bg-white hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-xl transition">

          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fillRule="evenodd"
              d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
              clipRule="evenodd" />
            <path fillRule="evenodd"
              d="M19 10a.75.75 0 00-.75-.75H8.704l1.048-.943a.75.75 0 10-1.004-1.114l-2.5 2.25a.75.75 0 000 1.114l2.5 2.25a.75.75 0 101.004-1.114l-1.048-.943h9.546A.75.75 0 0019 10z"
              clipRule="evenodd" />
          </svg>
          Logout
        </button>
      </form>
      @endauth
      @guest
      <a href="{{ route('login') }}"
        class="flex gap-2 items-center py-2 px-3 text-gray-800 dark:text-gray-200 bg-white hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-xl transition">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
          <path fillRule="evenodd"
            d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
            clipRule="evenodd" />
          <path fillRule="evenodd"
            d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z"
            clipRule="evenodd" />
        </svg>
        Login
      </a>
      @endguest

      <x-theme-switcher />
    </div>
  </div>
</nav>

<nav class="block sm:hidden w-full text-gray-800 dark:text-gray-200">
  <div class="container px-6 pt-4 mx-auto flex items-center justify-between">
    <div class="flex items-center justify-center">
      <x-menu-icon />
    </div>
    <div class="flex items-center justify-end gap-4">
      @auth
      <a href="{{ route('profile.edit') }}"
        class="p-2 text-gray-800 dark:text-gray-200 bg-white hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-xl transition">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
          <path
            d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
        </svg>
      </a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button onclick="event.preventDefault(); this.closest('form').submit();"
          class="flex gap-2 items-center py-2 px-3 text-gray-800 dark:text-gray-200 bg-white hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-xl transition">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fillRule="evenodd"
              d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
              clipRule="evenodd" />
            <path fillRule="evenodd"
              d="M19 10a.75.75 0 00-.75-.75H8.704l1.048-.943a.75.75 0 10-1.004-1.114l-2.5 2.25a.75.75 0 000 1.114l2.5 2.25a.75.75 0 101.004-1.114l-1.048-.943h9.546A.75.75 0 0019 10z"
              clipRule="evenodd" />
          </svg>
        </button>
      </form>
      @endauth
      @guest
      <a href="{{ route('login') }}"
        class="flex gap-2 items-center py-2 px-3 text-gray-800 dark:text-gray-200 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-xl transition">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
          <path fillRule="evenodd"
            d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z"
            clipRule="evenodd" />
          <path fillRule="evenodd"
            d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z"
            clipRule="evenodd" />
        </svg>
        Login
      </a>
      @endguest

      <x-theme-switcher />
    </div>
  </div>
</nav>