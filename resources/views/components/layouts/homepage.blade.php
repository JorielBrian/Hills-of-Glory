<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-[url(/public/background_one.jpg)] bg-center bg-no-repeat bg-fixed text-zinc-200">
        <div class="bg-black/60 h-fulla">
            {{-- HEADER --}}
            <flux:header class="grid grid-cols-3 w-full justify-between px-15 py-5">
                <a href="/">
                    <div class="flex">
                        <img src="/hog_logo.png" alt="logo" class="size-15">
                        <h1 class="text-3xl text-[#fdc53a] content-center px-1">Hills of Glory</h1><h1 class="text-3xl content-center px-1">Mabalacat</h1>
                    </div>
                </a>
                <flux:navbar class="gap-15 **:text-zinc-50 **:text-lg! **:hover:text-zinc-300! **:bg-transparent **:border-0 *:hover:bg-zinc-400/50 *:active:bg-zinc-400/20 *:rounded-lg">
                    <flux:navbar.item href="/about">About</flux:navbar.item>
                    <flux:dropdown>
                        <flux:navbar.item icon:trailing="chevron-down">Ministries</flux:navbar.item>
                        <flux:navmenu class="px-5! rounded-lg bg-zinc-700/90! *:text-zinc-200! *:hover:bg-zinc-800/70!">
                            <flux:navmenu.item href="/ministries/admin_and_extension">Administration & Extension Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/consolidation">Consolidation Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/creative">Creative Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/education">Education Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/events">Events Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/finance">Finance Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/kids">Hills Kids Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/hospitality">Hospitality Ministry</flux:navmenu.item>
                            <flux:separator class="bg-zinc-400!"/>
                            <flux:navmenu.item href="/ministries/music_and_arts">Music and Arts Ministry</flux:navmenu.item>
                        </flux:navmenu>
                    </flux:dropdown>    
                    <flux:navbar.item href="/services">Services</flux:navbar.item>
                    <flux:navbar.item href="/connect">Connect</flux:navbar.item>
                </flux:navbar>
                {{-- <nav>
                    <ul class="flex justify-between text-xl *:px-3 *:py-1 *:text-center *:items-center *:hover:text-zinc-100 *:hover:bg-zinc-200/30 *:active:bg-zinc-400/20 *:rounded-lg">
                        <li><button>About</button></li>
                        <li>
                            
                        </li>
                        <li><button>Services</button></li>
                        <li><button>Connect</button></li>
                    </ul>
                </nav> --}}
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 text-md text-zinc-200 leading-normal bg-zinc-300/10 border border-zinc-200/30 rounded-sm hover:bg-zinc-300/30 hover:border-[#1915014a]"> Dashboard </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block text-xl hover:underline leading-normal" > Sign In </a>
                        @endauth
                    </nav>
                @endif
            </flux:header>
            {{-- MAIN --}}
            <main>
                {{ $slot }}
            </main>
            @if (Route::has('login'))
                <div class="h-14.5 hidden lg:block"></div>
            @endif
        </div>
        @fluxScripts
    </body>
</html>