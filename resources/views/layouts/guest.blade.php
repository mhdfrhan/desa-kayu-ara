<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-50 via-white to-green-50">
        <!-- Background decoration -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none hidden md:block">
            <div
                class="absolute -top-40 -right-40 w-80 h-80 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute bottom-20 right-1/4 w-80 h-80 bg-green-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>
            <div
                class="absolute top-40 left-40 w-80 h-80 bg-yellow-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000">
            </div>
        </div>

        <!-- Logo -->
        <div class="relative z-10 mb-8">
            <a href="/" wire:navigate class="inline-flex gap-3 justify-center items-center">
                <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}"
                    class="h-20 sm:h-24 drop-shadow-lg">
                <img src="{{ asset('img/logo-kknmas.png') }}" alt="{{ config('app.name') }}"
                    class="h-20 sm:h-24 drop-shadow-lg">
            </a>
        </div>

        <!-- Login Card -->
        <div
            class="relative z-10 w-full sm:max-w-md px-6 py-8 bg-white/80 backdrop-blur-sm shadow-2xl rounded-2xl border border-white/20">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <div class="relative z-10 mt-8 text-center">
            <p class="text-sm text-gray-600">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>
