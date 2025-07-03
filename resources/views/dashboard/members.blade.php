<x-layouts.app :title="__('Members')">
    <div class="flex h-full w-full flex-1 flex-col rounded-xl text-black gap-5">
        <div class="bg-white">
            <h1 class="text-6xl p-10">Members</h1>
            <div class="flex justify-between">
                <div class="flex">
                    <p class="px-15 py-3 text-xl">Members</p>
                    <p class="px-15 py-3 text-xl">New Members</p>
                </div>
                <div class="flex gap-4 px-10">
                    <flux:icon.user-plus />
                    <flux:icon.trash />
                </div>
            </div>
        </div>
        <div class="bg-[#f1f1f1] h-screen px-7">
            <div class="grid grid-cols-5 bg-white justify-between p-3">
                <h1 class="font-bold">Name</h1>
                <h1 class="font-bold">Date Created</h1>
                <h1 class="font-bold">Role</h1>
                <h1 class="font-bold">Status</h1>
                <h1 class="font-bold">Action</h1>
            </div>
            {{-- @foreach ($leaders as $leader)
                <div class="grid grid-cols-5 bg-white my-1 p-3">
                    <p>{{ $leader['username'] }}</p>
                    <p>{{ $leader['created_at'] }}</p>
                    <P> ------ </P>
                    <p>{{ $leader['is_active'] }}</p>
                    <p> ------ </p>
                </div>
            @endforeach --}}
        </div>
    </div>
</x-layouts.app>
