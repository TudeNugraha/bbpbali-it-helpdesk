<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <!-- Page Content -->
<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 text-white min-h-screen sticky top-0">

        <div class="p-6 text-center">

            <div class="text-5xl mb-3">
                💻
            </div>

            <h2 class="text-xl font-bold">
                IT Helpdesk
            </h2>

            <p class="text-sm text-slate-300">
                Balai Bahasa Bali
            </p>

        </div>

        <nav class="px-4 space-y-2">

            <a href="/dashboard"
                class="block px-4 py-2 rounded transition
                {{ request()->is('dashboard') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-700' }}">
                    📊 Dashboard
            </a>

            <a href="/admin/tickets"
                class="block px-4 py-2 rounded transition
                {{ request()->is('admin/tickets*') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-700' }}">
                    🎫 Kelola Tiket
            </a>

            <a href="/admin/tickets/create"
                class="block px-4 py-2 rounded transition
                {{ request()->is('admin/tickets/create') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-700' }}">
                    ➕ Tambah Tiket
            </a>

            <a href="/antrean"
                class="block px-4 py-2 rounded transition
                {{ request()->is('antrean') ? 'bg-indigo-600 text-white' : 'hover:bg-slate-700' }}">
                    🌐 Antrean Publik
            </a>

        </nav>

    </aside>

    <!-- Content -->
    <main class="flex-1">
        {{ $slot }}
    </main>

</div>
        </div>
    </body>
</html>
