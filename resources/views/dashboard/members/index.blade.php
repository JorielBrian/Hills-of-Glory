<x-layouts.dashboard_layout :title="__('Members')">
    <div class="flex h-full w-full flex-1 flex-col gap-2 rounded-xl text-black">
        <div class="bg-white p-2">
                <livewire:member.members-table />
        </div>
    </div>
</x-layouts.dashboard_layout>
