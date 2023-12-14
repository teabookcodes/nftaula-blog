<x-app-layout>
    <div>
        <div class="block p-4 rounded-xl">
            <img src="{{ asset('storage/cover_images/' . $article->image) }}" class="mt-2 mb-4 rounded-lg" />
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-sm md:text-base text-gray-500">Posted by {{ $article->user->name }}</span>
                    <span class="text-sm md:text-base text-gray-400 dark:text-gray-500">
                        on {{ $article->created_at->format('j M Y, g:i a') }}</span>
                </div>

                @if ($article->user->is(auth()->user()))
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('articles.edit', $article)">
                            {{ __('Edit') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('articles.destroy', $article) }}">
                            @csrf
                            @method('delete')
                            <x-dropdown-link :href="route('articles.destroy', $article)"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Delete') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endif
            </div>
            <h2 class="font-semibold mt-4 text-4xl">{{ $article->title }}</h2>
            <p class="mt-4">{{ $article->content }}</p>
        </div>
    </div>
</x-app-layout>