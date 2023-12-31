<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Twitter meta tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name', 'NFTaula | Show & find NFTs') }}">
    <meta name="twitter:description"
        content="A friendly web platform for creators and collectors to show and buy NFTs 🚀🎨💎">
    <meta name="twitter:image" content="{{ url('/images/logo.svg') }}">

    <title>{{ config('app.name', 'NFTaula | Show & find NFTs') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Alpine -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ darkMode: false }" class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Toast Provider -->
        @if (session()->has('info') || session()->has('warning') || session()->has('error') ||
        session()->has('success'))
        @php
        $type = session('info') ? 'info' : (session('warning') ? 'warning' : (session('error') ? 'error' : 'success'));
        @endphp

        <x-toast type="{{ $type }}" position="bottom-right">
            {{ session($type) }}
        </x-toast>
        @endif

        <!-- Page Heading -->
        @if (isset($header))
        <header>
            <div class="max-w-7xl mx-auto pt-6 px-4">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto py-12 px-2 text-gray-800 dark:text-gray-200">
            <div class="flex-grow min-h-screen">
                {{ $slot }}
            </div>
        </main>

        @include('layouts.footer')
    </div>
</body>

</html>