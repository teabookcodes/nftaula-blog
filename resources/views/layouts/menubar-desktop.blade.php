{{-- Desktop menubar --}}
<div class="hidden md:block w-18 ml-0 2xl:-ml-24 h-1/2 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-2xl">
    <div class="flex flex-col gap-6 items-start justify-center">
        
        <x-menubar-link :active="request()->routeIs('home')" href="{{ route('home') }}">
            <x-feathericon-search />
        </x-menubar-link>

        @guest
        <x-menubar-link :active="request()->routeIs('login')" href="{{ route('login') }}">
            <x-feathericon-log-in />
        </x-menubar-link>
        @endguest

        @auth
        {{-- Other links --}}
        <x-menubar-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
            <x-feathericon-bookmark />
        </x-menubar-link>
        
        <x-menubar-link :active="request()->routeIs('nfts.index')" href="{{ route('nfts.index') }}">
            <x-menu-icon />
        </x-menubar-link>

        <x-menubar-link :active="request()->routeIs('profile.edit')" href="{{ route('profile.edit') }}">
            <x-feathericon-user />
        </x-menubar-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-menubar-link :active="false" href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();">
                <x-feathericon-log-out />
            </x-menubar-link>
        </form>
        @endauth
    </div>
</div>