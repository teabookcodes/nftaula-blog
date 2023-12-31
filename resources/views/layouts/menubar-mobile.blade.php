{{-- Mobile menubar --}}
<div
    class="md:hidden z-50 fixed bottom-0 w-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm border border-gray-100 dark:border-gray-900 rounded-t-2xl">
    <div class="flex items-center justify-around pt-6 pb-4 text-gray-800 dark:text-gray-200">

        <x-menubar-link :active="request()->routeIs('home')" href="{{ route('home') }}">
            <x-feathericon-home />
            <span class="text-xs leading-tight">Home</span>
        </x-menubar-link>

        @guest
        <x-menubar-link :active="request()->routeIs('login')" href="{{ route('login') }}">
            <x-feathericon-log-in />
            <span class="text-xs leading-tight">Log In</span>
        </x-menubar-link>
        @endguest

        @auth
        <x-menubar-link :active="request()->routeIs('saved')" href="{{ route('saved') }}">
            <x-feathericon-bookmark />
            <span class="text-xs leading-tight">Saved</span>
        </x-menubar-link>

        <x-menubar-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
            <x-feathericon-grid />
            <span class="text-xs leading-tight">My NFTs</span>
        </x-menubar-link>

        <x-menubar-link :active="request()->routeIs('profile.edit')" href="{{ route('profile.edit') }}">
            <x-feathericon-user />
            <span class="text-xs leading-tight">Profile</span>
        </x-menubar-link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-menubar-link :active="false" href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();">
                <x-feathericon-log-out />
                <span class="text-xs leading-tight">Log Out</span>
            </x-menubar-link>
        </form>
        @endauth
    </div>
</div>