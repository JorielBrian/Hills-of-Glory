<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="/hog_logo.png" rel="icon" type="img/png">
    <title>Dashboard</title>
</head>
<body class="grid grid-cols-4">
    {{-- SIDEBAR --}}
    <div class="sidebar relative col-span-1 bg-[#182920] text-white">
        <a class="" href="/">
            <div class="flex mb-30 pt-10 items-center">
                <img src="/hog_logo.png" alt="logo" class=" size-20">
                <h1 class="text-3xl">Hills of Glory - Mabalacat</h1>
            </div>
        </a>
        <ul class="">
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><img src="/hog_logo.png" alt="logo" class="size-10 mr-5">Dashboard</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><img src="/hog_logo.png" alt="logo" class="size-10 mr-5">Members</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><img src="/hog_logo.png" alt="logo" class="size-10 mr-5">Events</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><img src="/hog_logo.png" alt="logo" class="size-10 mr-5">Attendance</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><img src="/hog_logo.png" alt="logo" class="size-10 mr-5">Donation</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><img src="/hog_logo.png" alt="logo" class="size-10 mr-5">Expense</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><img src="/hog_logo.png" alt="logo" class="size-10 mr-5">Report</button></li>
        </ul>
    </div>
    {{-- MAIN --}}
    <div class="col-span-3">  
        <header class="flex header bg-[#d9dfbc] h-20 justify-between">
            <x-heroicon-c-bars-3 class="size-20 p-3 text-[#6b6767]"/>
            <div class="flex items-center">
                <input type="search" class="rounded-full bg-white m-5 w-100 h-1/2 p-5" placeholder="Search"><button class=""><x-heroicon-m-magnifying-glass class="size-7 text-[#150d0d]"/></button></input>
                <div class="flex right-0">
                    <h1>name</h1>
                    <img src="" alt="dp" class="rounded-full">
                </div>
            </div>
        </header>
        <main>
            <x-dashboard></x-dashboard>
        </main>
    </div>
</body>
</html>