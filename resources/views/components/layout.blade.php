<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="/hog_logo.png" rel="icon" type="img/png">
    <title>Hills of Glory</title>
</head>
<body class="bg-[url(/public/background_one.jpg)] bg-center bg-no-repeat bg-fixed text-white">
    <div class=" bg-black/50 h-full">
        <x-login class="h-screen w-1/3 bg-white absolute right-0 text-black text-center align-middle py-60"></x-login>
        {{-- HEADER --}}
        <header class="grid grid-cols-3 w-full justify-between px-15 py-5">
            <a href="/">
                <div class="flex">
                    <img src="/hog_logo.png" alt="logo" class=" size-15">
                    <h1 class="text-3xl">Hills of Glory - Mabalacat</h1>
                </div>
            </a>
            <nav>
                <ul class="flex justify-between text-xl">
                    <li class="px-5 py-2 hover:bg-white/30 active:bg-white/20 rounded-4xl"><button>About</button></li>
                    <li class="px-5 py-2 hover:bg-white/30 active:bg-white/20 rounded-4xl"><button>Ministries</button></li>
                    <li class="px-5 py-2 hover:bg-white/30 active:bg-white/20 rounded-4xl"><button>Services</button></li>
                    <li class="px-5 py-2 hover:bg-white/30 active:bg-white/20 rounded-4xl"><button>Connect</button></li>
                </ul>
            </nav>
            <button type="button" class="text-2xl text-end hover:underline">Sign in</button>
        </header>

    
        {{-- MAIN --}}
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>