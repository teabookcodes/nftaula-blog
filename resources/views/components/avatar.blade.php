{{-- Avatar --}}
<img class="h-12 rounded-full" src="{{ 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
    alt="{{ auth()->user()->name . ' avatar' }}" />