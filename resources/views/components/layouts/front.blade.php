<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Hills of Glory Mabalacat</title>

        <link rel="icon" href="/hog_logo.png" sizes="any">
        <link rel="icon" href="/hog_logo.png" type="image">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    </head>
    <body class="bg-[url(/public/background_one.jpg)] bg-center bg-no-repeat bg-fixed text-zinc-200">
        <div class=" bg-black/60 h-full">
            {{-- <x-login :class="{translate-x-full: !open}" class="h-screen w-1/3 bg-white absolute right-0 text-black text-center align-middle py-60"></x-login> --}}

            {{-- HEADER --}}
            <header class="grid grid-cols-3 w-full justify-between px-15 py-5">
                <a href="/">
                    <div class="flex">
                        <img src="/hog_logo.png" alt="logo" class="size-15">
                        <h1 class="text-3xl text-[#fdc53a] content-center px-1">Hills of Glory</h1><h1 class="text-3xl content-center px-1">Mabalacat</h1>
                    </div>
                </a>
                <nav>
                    <ul class="flex justify-between text-xl *:px-3 *:py-1 *:text-center *:items-center *:hover:text-zinc-100 *:hover:bg-zinc-200/30 *:active:bg-zinc-400/20 *:rounded-lg">
                        <li><button>About</button></li>
                        <li><button>Ministries</button></li>
                        <li><button>Services</button></li>
                        <li><button>Connect</button></li>
                    </ul>
                </nav>
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 text-md text-zinc-200 leading-normal bg-zinc-300/10 border border-zinc-200/30 rounded-sm hover:bg-zinc-300/30 hover:border-[#1915014a]"> Dashboard </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block text-xl hover:underline leading-normal" > Sign In </a>
                        @endauth
                    </nav>
                @endif
            </header>
            {{-- MAIN --}}
            <main>
                {{ $slot }}
            </main>
            @if (Route::has('login'))
                <div class="h-14.5 hidden lg:block"></div>
            @endif
        </div>
    </body>
</html>