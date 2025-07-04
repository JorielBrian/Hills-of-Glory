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
        <div class="bg-[#f1f1f1] h-screen">
            <table class="table-auto w-full">
                <tr class="bg-white">
                    <th class="p-3 w-fit">Name</th>
                    <th class="p-3 w-fit">Date Created</th>
                    <th class="p-3 w-fit">Role</th>
                    <th class="p-3 w-fit">Status</th>
                    <th class="p-3 w-fit">Action</th>
                </tr>
                @foreach ($members as $member)
                    <tr class="bg-white">
                        <td class="p-3 text-center w-80">
                            <flux:profile :chevron="false" name="{{ $member['first_name'] }}"/>
                        </td>
                        <td class="p-3 text-center w-fit">{{ $member['created_at'] }}</td>
                        <td class="p-3 text-center w-fit">------</td>
                        <td class="p-3 text-center w-fit">{{ $member['is_active'] }}</td>
                        <td class="p-3 text-center w-fit">
                            <span>
                                <flux:icon.cog-6-tooth/>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $members->links() }}
        </div>
    </div>
</x-layouts.app>
