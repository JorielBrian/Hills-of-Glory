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
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><x-iconic-dashboard class="text-[#d9dfbc] size-10" />Dashboard</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><x-fluentui-people-team-32 class="text-[#d9dfbc] size-10" />Members</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><x-gmdi-event class="text-[#d9dfbc] size-10" />Events</button></li>
            <li class="sidebar-menu text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><button class="flex w-50 m-auto"><x-bi-person-fill-check />Attendance</button></li>
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
                <div class="flex relative h-1/2 m-5">
                    <input type="search" class="relative rounded-full bg-white w-100 p-5" placeholder="Search"></input>
                    <button class="absolute right-3 top-0"><x-heroicon-m-magnifying-glass class="size-9 text-[#150d0d92]"/></button>
                </div>
                <div class="flex right-0">
                    <h1 class="text-2xl content-center p-2">HillsMab</h1>
                    <img src="/profile.png" alt="dp" class="rounded-full size-15 border-4 border-b-gray-500">
                </div>
            </div>
        </header>
        <main>
            <x-members>
                <x-card>
                    @foreach ($leaders as $leader)
                        <div class="grid grid-cols-5 bg-white my-1 p-3">
                            <p>{{ $leader['username'] }}</p>
                            <p>{{ $leader['created_at'] }}</p>
                            <P> ------ </P>
                            <p>{{ $leader['is_active'] }}</p>
                            <p> ------ </p>
                        </div>
                    @endforeach
                </x-card>
            </x-members>
        </main>
    </div>
</body>
</html>