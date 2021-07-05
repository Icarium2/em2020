<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Fotbolls-EM 2021') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    </head>
    <body class="font-sans antialiased bg-gray-100">
        <header class="flex items-center justify-between sm:px-8 sm:py-4">
            <a href="#"></a>
            <div class="flex items-center">
                @if (Route::has('login'))
                <div class="sm:px-6 sm:py-4 px-3 py-6 flex text-sm">
                    @auth
                    <a href="#" class="px-6">{{ Auth::user()->name }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            logga ut
                    </a>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Logga in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrera</a>
                        @endif
                    @endauth
                </div>
            @endif

            </div>
        </header>
        <main class="container mx-auto flex max-w-custom">

            <div class="w-full">
                <nav class="flex items-center text-xs">
                    <ul class="flex uppercase justfiy-evenly font-semibold border-b-4 pb-3 space-x-6">
                        <li><a href="{{ route('games') }}" class="{{ (request()->is('games')) ? 'border-blue-400' : 'hover:border-blue-400 text-gray-400' }}  transition duration-150 ease-in border-b-3 pb-3">Tipset</a></li>
                        <li><a href="{{ route('today') }}" class="{{ (request()->is('today')) ? 'border-blue-400' : 'hover:border-blue-400 text-gray-400' }} transition duration-150 ease-in border-b-3 pb-3">Dagens matcher</a></li>
                        <li><a href="{{ route('groups') }}" class="{{ (request()->is('groups')) ? 'border-blue-400' : 'hover:border-blue-400 text-gray-400' }} transition duration-150 ease-in border-b-3 pb-3">Grupper</a></li>
                        <li><a href="{{ route('poangligan') }}" class="{{ (request()->is('poangligan')) ? 'border-blue-400' : 'hover:border-blue-400 text-gray-400' }} transition duration-150 ease-in border-b-3 pb-3">Poängligan</a></li>

                        @auth
                            @if (Auth::user()->userlevel == 'admin')
                                <div x-data="{ open: false }" class="relative cursor-pointer">
                                    <li x-on:click="open = true">
                                        Admin
                                    </li>
                                    <div x-show.transition="open" x-on:click.away="open = false" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">
                                    <a href="{{ route('users') }}" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Användare</a>
                                    <a href="{{ route('poang') }}" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Poäng</a>
                                    </div>
                                </div>
                              @endif
                        @endauth


                    </ul>
                </nav>

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
        <livewire:scripts />
    </body>
</html>
