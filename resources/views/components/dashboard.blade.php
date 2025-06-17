<div>
    <header class="h-50">
        <h1 class="text-6xl p-10">Dashboard</h1>
        <div>
            
        </div>
    </header>
    <div class="bg-[#f1f1f1] h-screen p-5">
        <div class="grid grid-cols-5 bg-white justify-between p-3">
            <h1 class="font-bold">Name</h1>
            <h1 class="font-bold">Date Created</h1>
            <h1 class="font-bold">Role</h1>
            <h1 class="font-bold">Status</h1>
            <h1 class="font-bold">Action</h1>
        </div>
        {{ $slot }}
    </div>
</div>