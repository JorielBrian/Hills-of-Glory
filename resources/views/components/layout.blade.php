<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="/hog_logo.png" rel="icon" type="img/png">
    <title>Hills of Glory</title>
</head>
<body class="bg-[url(/public/background_one.jpg)] bg-center bg-no-repeat bg-fixed text-white">
    <div class=" bg-black/60 h-full">
        {{-- <x-login :class="{translate-x-full: !open}" class="h-screen w-1/3 bg-white absolute right-0 text-black text-center align-middle py-60"></x-login> --}}
        <div :class="{translate-x-full: !open}" class="h-screen w-1/3 bg-white absolute right-0 text-black text-center align-middle py-60">
            <h1 class="text-6xl">Welcome!</h1>  
            <h2 class="text-2xl">Login your account</h2>
            <form action="/dashboard" class="grid col-2 w-100 m-auto">
                <input type="text" id="username" placeholder="Username" class="col-span-2 bg-[#d9dfbc] p-2 rounded-md w-100 m-2">
                <input type="password" id="username" placeholder="Password" class="col-span-2 bg-[#d9dfbc] p-2 rounded-md w-100 m-2">
                <span class="text-start">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </span>
                <a href="/" class="text-end">Forgot Password?</a>
                <div class="col-span-2">
                    <input type="button" value="Back" class="bg-[#78838a] px-5 py-3 rounded-xl text-white w-40 my-20 hover:underline">
                    <input type="submit" value="Sign in" class="bg-[#6b8b7a] px-5 py-3 rounded-xl text-white w-40 my-20 hover:underline">
                </div>
            </form>
        </div>
        {{-- HEADER --}}
        <header class="grid grid-cols-3 w-full justify-between px-15 py-5">
            <a href="/">
                <div class="flex">
                    <img src="/hog_logo.png" alt="logo" class="size-15">
                    <h1 class="text-3xl text-[#fdc53a] content-center px-1">Hills of Glory</h1><h1 class="text-3xl content-center px-1">Mabalacat</h1>
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