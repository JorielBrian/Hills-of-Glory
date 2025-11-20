<div>
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl text-black p-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">My Members</h1>
                </div>
                <div class="flex flex-col mt-4 sm:mt-0">
                    <flux:button :href="route('members.create')">
                        Add Member
                    </flux:button>
                </div>
            </div>

            <!-- Search and Filters -->
            <div class="mb-6 flex flex-col sm:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            wire:model.live="search"
                            placeholder="Search members by name or contact..."
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                </div>
                
                <!-- Status Filter -->
                <div class="sm:w-48">
                    <select 
                        wire:model.live="statusFilter" 
                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option value="all">All Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Filter Status -->
            @if($search)
            <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-md">
                <span class="text-sm text-blue-700">
                    Showing members matching: <strong>"{{ $search }}"</strong>
                </span>
            </div>
            @endif

            <!-- Success Message -->
            @if (session()->has('message'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Members Grid -->
            @if($members->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($members as $member)
                        <div 
                            wire:click="viewMember({{ $member->id }})"
                            class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 cursor-pointer"
                        >
                            <!-- Member Photo -->
                            <div class="p-6 pb-4">
                                <div class="flex items-center space-x-4">
                                    @if($member->member_photo)
                                        <div class="flex-shrink-0">
                                            <img class="h-16 w-16 rounded-full object-cover border-2 border-gray-200" 
                                                src="{{ asset('storage/' . $member->member_photo) }}" 
                                                alt="{{ $member->first_name }} {{ $member->last_name }}"
                                                onerror="this.style.display='none'">
                                        </div>
                                    @endif
                                    @if(!$member->member_photo)
                                        <div class="flex-shrink-0">
                                            <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 border-2 border-gray-200 flex items-center justify-center">
                                                <span class="text-lg font-bold text-white">
                                                    {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-semibold text-gray-900 truncate">
                                                {{ $member->first_name }} {{ $member->last_name }}
                                            </h3>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $member->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $member->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-blue-600 font-medium mt-1">
                                            {{ $member->member_role instanceof \App\Enums\MemberEnums\MemberRole ? $member->member_role->value : $member->member_role }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Member Info -->
                            <div class="px-6 pb-6">
                                <div class="space-y-3 text-sm text-gray-600">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            <span>{{ $member->contact ?? 'No contact' }}</span>
                                        </div>
                                        <span class="text-xs font-medium px-2 py-1 rounded bg-gray-100 text-gray-700">
                                            {{ $member->gender instanceof \App\Enums\MemberEnums\Gender ? $member->gender->value : $member->gender }}
                                        </span>
                                    </div>

                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>{{ $member->birth_date?->format('M d, Y') ?? 'No birthday' }}</span>
                                    </div>

                                    @if($member->ministry)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                        </svg>
                                        <span class="truncate">{{ $member->ministry instanceof \App\Enums\MemberEnums\Ministry ? $member->ministry->value : $member->ministry }}</span>
                                        @if($member->ministry_role)
                                            <span class="ml-2 text-xs font-medium px-2 py-1 rounded bg-blue-100 text-blue-700">
                                                {{ $member->ministry_role instanceof \App\Enums\MemberEnums\MinistryRole ? $member->ministry_role->value : $member->ministry_role }}
                                            </span>
                                        @endif
                                    </div>
                                    @endif

                                    @if($member->networkLeader)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="truncate">Led by {{ $member->networkLeader->first_name }} {{ $member->networkLeader->last_name }}</span>
                                    </div>
                                    @endif

                                    @if($member->hills_journey)
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        <span>{{ $member->hills_journey instanceof \App\Enums\MemberEnums\HillsJourney ? $member->hills_journey->value : $member->hills_journey }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $members->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">No members found</h3>
                    <p class="mt-2 text-gray-500">
                        @if($search || $statusFilter !== 'all')
                            Try adjusting your search or filter criteria.
                        @else
                            No members have been added yet.
                        @endif
                    </p>
                    <div class="mt-6">
                        <flux:button :href="route('members.create')">
                            Add Your First Member
                        </flux:button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>