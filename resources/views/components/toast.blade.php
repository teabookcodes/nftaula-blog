@props(['type' => 'info', 'position' => 'bottom-right'])

@php
    $typeClasses = [
        'info' => 'bg-blue-500 border-blue-700',
        'warning' => 'bg-yellow-500 border-yellow-700',
        'error' => 'bg-red-500 border-red-700',
        'success' => 'bg-green-500 border-green-700',
    ][$type];

    $positionClasses = [
        'bottom-right' => 'bottom-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
        'top-right' => 'top-4 right-4',
        'top-left' => 'top-4 left-4',
    ][$position]
@endphp

<div
    x-data="{ show: true, progress: 100 }"
    x-show="show"
    x-cloak
    x-init="
        setTimeout(() => {
            show = false;
        }, 3000);

        setInterval(() => {
            progress -= 1;
        }, 30);
    "
    class="{{$positionClasses}} fixed z-50"
>
    <div class="relative">
        <div
            x-show="progress > 0"
            x-bind:style="'width: ' + progress + '%;'"
            x-transition:enter="transition-transform transition-opacity"
            x-transition:enter-start="opacity-0 transform scale-y-0"
            x-transition:enter-end="opacity-100 transform scale-y-100"
            x-transition:leave="transition-transform transition-opacity"
            x-transition:leave-start="opacity-100 transform scale-y-100"
            x-transition:leave-end="opacity-0 transform scale-y-0"
            class="absolute bottom-0 left-0 h-1 bg-white/50"
        ></div>

        <div class="{{$typeClasses}} max-w-xs text-white rounded-lg px-4 py-2">
            {{$slot}}
        </div>
    </div>
</div>
