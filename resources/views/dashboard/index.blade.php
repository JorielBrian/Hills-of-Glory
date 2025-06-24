@extends('layouts.dashboard')

@section ('main')
    <div>
        <header class="relative h-50">
            <h1 class="text-6xl p-10">Dashboard</h1>
            <div class="flex absolute bottom-0 justify-between w-full px-5">
                <div>
                    <button class="px-15 py-3 text-xl">Last 7 Days</button>
                    <button class="px-15 py-3 text-xl">Last 21 Days</button>
                    <button class="px-15 py-3 text-xl">Last 30 Days</button>
                    <button class="px-15 py-3 text-xl">Custom</button>
                </div>
            </div>
        </header>
        <div class="bg-[#f1f1f1] h-screen p-7">
        </div>
    </div>
@endsection