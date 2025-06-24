@extends('layouts.dashboard')

@section ('main')
    <div>
        <header class="relative h-50">
            <h1 class="text-6xl p-10">Members</h1>
            <div class="flex absolute bottom-0 justify-between w-full px-5">
                <div>
                    <button class="px-15 py-3 text-xl">Members</button>
                    <button class="px-15 py-3 text-xl">New Members</button>
                </div>
                <div>
                    <button class="rounded-full m-1 border"><x-heroicon-c-user-plus class="size-10 text-[#6b6767] rounded-full p-1" /></button>
                    <button class="rounded-full m-1"><x-heroicon-o-trash class="size-10 text-white bg-[#6b6767] rounded-full p-1" /></button>
                </div>
            </div>
        </header>
        <div class="bg-[#f1f1f1] h-screen p-7">
            <div class="grid grid-cols-5 bg-white justify-between p-3">
                <h1 class="font-bold">Name</h1>
                <h1 class="font-bold">Date Created</h1>
                <h1 class="font-bold">Role</h1>
                <h1 class="font-bold">Status</h1>
                <h1 class="font-bold">Action</h1>
            </div>
            @foreach ($leaders as $leader)
                <div class="grid grid-cols-5 bg-white my-1 p-3">
                    <p>{{ $leader['username'] }}</p>
                    <p>{{ $leader['created_at'] }}</p>
                    <P> ------ </P>
                    <p>{{ $leader['is_active'] }}</p>
                    <p> ------ </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection