<x-app-layout>
    @auth
    <div class="px-4">
        <a href="{{ route('articles.create') }}" class="inline-flex gap-2 items-center px-4 py-2 bg-indigo-500 border
        border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest
        hover:bg-indigo-600 dark:hover:bg-indigo-400 focus:bg-indigo-600 dark:focus:bg-indigo-400 active:bg-indigo-700
        dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            <x-feathericon-plus class="w-4 h-4" />
            Publish article
        </a>
    </div>
    @endauth
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
        @foreach ($articles as $article)
        <a href="{{ route('article.show', $article) }}" class="block p-4 rounded-xl">
            <img src="{{ asset('storage/cover_images/' . $article->image) }}" class="mt-2 mb-4 rounded-lg" />
            <div class="my-1 text-xs">
                <span class="text-sm text-gray-500">{{ $article->user->name }}</span>
                <small class="ml-2 text-sm text-gray-400 dark:text-gray-500">{{ $article->created_at->format('j M Y, g:i
                    a') }}</small>
            </div>
            <h2 class="font-semibold text-2xl">{{ $article->title }}</h2>
            <p class="mt-1 text-sm">{{ $article->content }}</p>

        </a>
        @endforeach
    </div>
</x-app-layout>