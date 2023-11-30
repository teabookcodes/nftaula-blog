@if (auth()->user()->avatar)
<img class="h-12 rounded-full aspect-square" src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}"
    alt="{{ auth()->user()->name . ' avatar' }}" />
@else
<img class="h-12 rounded-full aspect-square"
    src="{{ 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
    alt="{{ auth()->user()->name . ' avatar' }}" />
@endif