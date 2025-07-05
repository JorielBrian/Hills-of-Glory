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
                    <flux:icon.user-plus class="text-center text-white size-10 rounded-full p-1 bg-gray-500 border hover:bg-gray-700 active:scale-85" />
                    <flux:icon.trash class="text-center text-white size-10 rounded-full p-1 bg-gray-500 border hover:bg-gray-700 active:scale-85" />
                </div>
            </div>
        </div>
        <div class="bg-[#f1f1f1] h-screen">
            <table class="w-full">
                <tr class="bg-white border">
                    <th class="p-3">Name</th>
                    <th class="p-3">Age</th>
                    <th class="p-3">Gender</th>
                    <th class="p-3">Birthdate</th>
                    <th class="p-3">Address</th>
                    <th class="p-3">Contact</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Network Leader</th>
                    <th class="p-3">Action</th>
                </tr>
                @foreach ($members as $member)
                    <tr class="bg-white">
                        <td class="p-1 pl-7 justify-center">
                            <flux:profile class="w-60" :chevron="false" name="{{ $member['first_name'] }}  {{ $member['last_name'] }}"/>
                        </td>
                        <td class="p-1 text-center">{{ $member['age'] }}</td>
                        <td class="p-1 text-center">{{ $member['gender'] }}</td>
                        <td class="p-1 text-center">{{ $member['birth_date'] }}</td>
                        <td class="p-1 text-center">{{ $member['address'] }}</td>
                        <td class="p-1 text-center">{{ $member['contact'] }}</td>
                        <td class="p-1 text-center">{{ $member['status'] }}</td>
                        <td class="p-1 text-center">{{ $member['network_leader'] }}</td>
                        <td class="flex content-center p-7 justify-evenly items-center">
                                <flux:icon.cog-6-tooth variant="solid" class="text-[#5bd5ff] hover:scale-125" />
                                <flux:icon.x-circle variant="solid" class="text-[#ff3131] hover:scale-125" />
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $members->links() }}
        </div>
    </div>
</x-layouts.app>
