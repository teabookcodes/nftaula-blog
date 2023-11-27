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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ darkMode: false }" class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-32 px-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <x-application-logo />
        <x-theme-switcher class="hidden" />

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-2xl">
            {{ $slot }}
        </div>
    </div>
</body>

</html>