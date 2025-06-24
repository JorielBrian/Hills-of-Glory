<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="/hog_logo.png" rel="icon" type="img/png">
    <title>Dashboard</title>
</head>
<body class="relative grid grid-cols-4">
    {{-- SIDEBAR --}}
    <div class="sticky col-span-1 bg-[#182920] text-white">
        <a class="" href="/">
            <div class="flex mb-30 pt-10 items-center justify-between px-7">
                <img src="/hog_logo.png" alt="logo" class="size-20">
                <h1 class="text-3xl font-bold text-[#e2b900]">Hills of Glory</h1>
                <h1 class="text-3xl">Mabalacat</h1>
            </div>
        </a>
        <ul class="">
            <li class="sidebar-menu my-10 text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><a href="/dashboard" class="flex w-50 m-auto justify-between"><x-iconic-dashboard class="text-[#d9dfbc] size-12"/><p class="w-2/3 text-start">Dashboard</p></a></li>
            <li class="sidebar-menu my-10 text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><a href="/dashboard/members" class="flex w-50 m-auto justify-between"><x-fluentui-people-team-32 class="text-[#d9dfbc] size-12"/><p class="w-2/3 text-start">Members</p></a></li>
            <li class="sidebar-menu my-10 text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><a href="/dashboard/events" class="flex w-50 m-auto justify-between"><x-gmdi-event class="text-[#d9dfbc] size-12"/><p class="w-2/3 text-start">Events</p></a></li>
            <li class="sidebar-menu my-10 text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><a href="/dashboard/attendance" class="flex w-50 m-auto justify-between"><x-bi-person-fill-check class="text-[#d9dfbc] size-12"/><p class="w-2/3 text-start">Attendance</p></a></li>
            <li class="sidebar-menu my-10 text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><a href="/dashboard/finances" class="flex w-50 m-auto justify-between"><x-fas-money-bills class="text-[#d9dfbc] size-12"/><p class="w-2/3 text-start">Finances</p></a></li>
            <li class="sidebar-menu my-10 text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><a href="/dashboard/expense" class="flex w-50 m-auto justify-between"><x-fas-money-bill-transfer class="text-[#d9dfbc] size-12"/><p class="w-2/3 text-start">Expense</p></a></li>
            <li class="sidebar-menu my-10 text-2xl flex hover:bg-gradient-to-l hover:from-white/30 active:underline"><a href="/dashboard/report" class="flex w-50 m-auto justify-between"><x-iconoir-stats-report class="text-[#d9dfbc] size-12"/><p class="w-2/3 text-start">Report</p></a></li>
        </ul>
    </div>
    {{-- MAIN --}}
    <div class="sticky col-span-3">  
        <header class="flex header p-3 bg-[#d9dfbc] h-25 justify-between">
            <x-heroicon-c-bars-3 class="size-20 text-[#6b6767]"/>
            <div class="flex items-center">
                <div class="flex relative h-1/2 m-5">
                    <input type="search" class="relative rounded-full bg-white w-150 p-5" placeholder="Search"></input>
                    <button class="absolute right-3 top-0"><x-heroicon-m-magnifying-glass class="size-9 text-[#150d0d92]"/></button>
                </div>
                <div class="flex right-0">
                    <h1 class="text-3xl content-center p-2">HillsMab</h1>
                    <img src="/profile.png" alt="dp" class="rounded-full size-15 border-4 border-b-gray-500">
                </div>
            </div>
        </header>
        <main>
            @section('main')
            @show
        </main>
    </div>
</body>
</html>