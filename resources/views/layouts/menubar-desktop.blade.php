{{-- Desktop menubar --}}
<div class="hidden md:flex z-50 w-full 2xl:w-20 fixed bottom-4 2xl:bottom-96 2xl:left-4">
    <div
        class="mx-auto p-6 bg-white dark:bg-gray-800 overflow-hidden drop-shadow-lg border border-indigo-500 dark:border-indigo-500 rounded-2xl">
        <div class="flex flex-row 2xl:flex-col gap-6 items-start justify-center">

            <x-menubar-link :active="request()->routeIs('home')" href="{{ route('home') }}">
                <x-feathericon-home />
            </x-menubar-link>

            @guest
            <x-menubar-link :active="request()->routeIs('login')" href="{{ route('login') }}">
                <x-feathericon-log-in />
            </x-menubar-link>
            @endguest

            @auth
            {{-- Other links --}}
            <x-menubar-link :active="request()->routeIs('saved')" href="{{ route('saved') }}">
                <x-feathericon-bookmark />
            </x-menubar-link>

            <x-menubar-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
                <x-feathericon-grid />
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
</div>