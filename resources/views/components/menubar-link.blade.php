@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex flex-col gap-1 items-center justify-center text-indigo-500'
            : 'flex flex-col gap-1 items-center justify-center text-gray-600 dark:text-gray-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
