<div>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Left Sidebar - Profile & Quick Info -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Profile Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6 text-center">
                            <!-- Profile Photo -->
                            <div class="relative inline-block">
                                @if($member->member_photo)
                                    <img class="h-24 w-24 rounded-full mx-auto object-cover border-4 border-white shadow-lg" 
                                         src="{{ asset('storage/' . $member->member_photo) }}" 
                                         alt="{{ $member->first_name }} {{ $member->last_name }}"
                                         onerror="this.style.display='none'">
                                @endif
                                @if(!$member->member_photo)
                                    <div class="h-24 w-24 rounded-full mx-auto bg-gradient-to-br from-blue-500 to-blue-600 border-4 border-white shadow-lg flex items-center justify-center">
                                        <span class="text-xl font-bold text-white">
                                            {{ substr($member->first_name, 0, 1) }}{{ substr($member->last_name, 0, 1) }}
                                        </span>
                                    </div>
                                @endif
                                <!-- Status Indicator -->
                                <div class="absolute bottom-0 right-0 transform -translate-x-1 -translate-y-1">
                                    <div class="h-6 w-6 rounded-full border-2 border-white {{ $member->is_active ? 'bg-green-500' : 'bg-red-500' }}"></div>
                                </div>
                            </div>
                            
                            <!-- Member Name & Role -->
                            <h2 class="mt-4 text-xl font-bold text-gray-900">
                                {{ $member->first_name }} {{ $member->last_name }}
                            </h2>
                            {{-- @if($member->middle_name)
                                <p class="text-sm text-gray-500">{{ $member->middle_name }}</p>
                            @endif --}}
                            <p class="text-sm text-blue-600 font-medium mt-1">
                                {{ $member->member_role instanceof \App\Enums\MemberEnums\MemberRole ? $member->member_role->value : $member->member_role }}
                            </p>
                            
                            <!-- Status Badge -->
                            <div class="mt-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $member->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <span class="h-2 w-2 rounded-full {{ $member->is_active ? 'bg-green-500' : 'bg-red-500' }} mr-2"></span>
                                    {{ $member->is_active ? 'Active Member' : 'Inactive Member' }}
                                </span>
                            </div>

                            <!-- Member Type Badge -->
                            <div class="mt-2">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                    {{ $member->member_type instanceof \App\Enums\MemberEnums\MemberType ? $member->member_type->value : $member->member_type }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Contact Information
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Email</p>
                                        <p class="text-sm text-gray-900 mt-1">{{ $member->email ?? 'Not provided' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Phone</p>
                                        <p class="text-sm text-gray-900 mt-1">{{ $member->contact ?? 'Not provided' }}</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-sm font-medium text-gray-500">Address</p>
                                        <p class="text-sm text-gray-900 mt-1">{{ $member->address ?? 'Not provided' }}</p>
                                    </div>
                                </div>
                                @if($member->facebook_account)
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-gray-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-500">Facebook</p>
                                        <a href="{{ $member->facebook_account }}" target="_blank" class="text-sm text-blue-600 hover:text-blue-800 mt-1 block truncate" title="{{ $member->facebook_account }}">
                                            {{ $member->facebook_account }}
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Quick Info
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Age</span>
                                    <span class="text-sm font-semibold text-gray-900">
                                        {{ \Carbon\Carbon::parse($member->birth_date)->age }} years
                                    </span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Marital Status</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $member->is_married ? 'Married' : 'Single' }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <span class="text-sm font-medium text-gray-500">Gender</span>
                                    <span class="text-sm font-semibold text-gray-900">
                                        {{ $member->gender instanceof \App\Enums\MemberEnums\Gender ? $member->gender->value : $member->gender }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-sm font-medium text-gray-500">Member Since</span>
                                    <span class="text-sm font-semibold text-gray-900">{{ $member->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="lg:col-span-3 space-y-6">
                    <!-- Personal Information Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Personal Information
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">First Name</label>
                                    <p class="text-sm text-gray-900 font-semibold">{{ $member->first_name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Middle Name</label>
                                    <p class="text-sm text-gray-900 font-semibold">{{ $member->middle_name ?? '—' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Last Name</label>
                                    <p class="text-sm text-gray-900 font-semibold">{{ $member->last_name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Gender</label>
                                    <p class="text-sm text-gray-900 font-semibold">
                                        {{ $member->gender instanceof \App\Enums\MemberEnums\Gender ? $member->gender->value : $member->gender }}
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Birth Date</label>
                                    <p class="text-sm text-gray-900 font-semibold">
                                        {{ \Carbon\Carbon::parse($member->birth_date)->format('F d, Y') }}
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Member Type</label>
                                    <p class="text-sm text-gray-900 font-semibold">
                                        {{ $member->member_type instanceof \App\Enums\MemberEnums\MemberType ? $member->member_type->value : $member->member_type }}
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Marital Status</label>
                                    <p class="text-sm text-gray-900 font-semibold">{{ $member->is_married ? 'Married' : 'Single' }}</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Address</label>
                                    <p class="text-sm text-gray-900 font-semibold">{{ $member->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Church Information Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Church Information
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Member Role</label>
                                    <p class="text-sm text-gray-900 font-semibold">
                                        {{ $member->member_role instanceof \App\Enums\MemberEnums\MemberRole ? $member->member_role->value : $member->member_role }}
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Hills Journey</label>
                                    <p class="text-sm text-gray-900 font-semibold">
                                        @if($member->hills_journey)
                                            {{ $member->hills_journey instanceof \App\Enums\MemberEnums\HillsJourney ? $member->hills_journey->value : $member->hills_journey }}
                                        @else
                                            —
                                        @endif
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Invited By</label>
                                    <p class="text-sm text-gray-900 font-semibold">{{ $member->invited_by ?? '—' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Date Invited</label>
                                    <p class="text-sm text-gray-900 font-semibold">
                                        {{ \Carbon\Carbon::parse($member->date_invited)->format('F d, Y') }}
                                    </p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Service Invited</label>
                                    <p class="text-sm text-gray-900 font-semibold">
                                        @if($member->service_invited)
                                            {{ $member->service_invited instanceof \App\Enums\EventsEnums\Event ? $member->service_invited->value : $member->service_invited }}
                                        @else
                                            —
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ministry & Life Group Information -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Ministry Information Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                    Ministry Information
                                </h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 mb-1">Ministry</label>
                                        <p class="text-sm text-gray-900 font-semibold">
                                            @if($member->ministry)
                                                {{ $member->ministry instanceof \App\Enums\MemberEnums\Ministry ? $member->ministry->value : $member->ministry }}
                                            @else
                                                Not assigned
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 mb-1">Ministry Role</label>
                                        <p class="text-sm text-gray-900 font-semibold">
                                            @if($member->ministry_role)
                                                {{ $member->ministry_role instanceof \App\Enums\MemberEnums\MinistryRole ? $member->ministry_role->value : $member->ministry_role }}
                                            @else
                                                Not assigned
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 mb-1">Ministry Assignment</label>
                                        <p class="text-sm text-gray-900 font-semibold">{{ $member->ministry_assignment ?? 'Not assigned' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Life Group Information Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                                    <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Life Group Information
                                </h3>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 mb-1">Life Group</label>
                                        <p class="text-sm text-gray-900 font-semibold">
                                            @if($member->lifeGroup)
                                                {{ $member->lifeGroup->life_group_name }}
                                            @else
                                                Not assigned
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 mb-1">Network Leader</label>
                                        <p class="text-sm text-gray-900 font-semibold">
                                            @if($member->networkLeader)
                                                {{ $member->networkLeader->first_name . " " . $member->networkLeader->last_name }}
                                            @else
                                                Not assigned
                                            @endif
                                        </p>
                                    </div>
                                    @if($member->lifeGroup)
                                    <div class="pt-4 border-t border-gray-100">
                                        <a href="#" class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            View Life Group Details
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Actions Card - Enhanced -->
                        <div class="col-span-2 bg-white rounded-2xl shadow-lg border border-gray-100 transform transition-all duration-300 hover:shadow-xl">
                            <div class="p-6">
                                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">Member Actions</h3>
                                        <p class="text-sm text-gray-600">Manage this member's information</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <button 
                                            wire:click="editMember"
                                            class="px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 border border-transparent rounded-xl shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:-translate-y-0.5"
                                        >
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit Member
                                            </div>
                                        </button>
                                        <button 
                                            wire:click="removeMember({{ $member->id }})"
                                            wire:confirm="Are you sure you want to remove this member from the life group?"
                                            class="px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-600 to-red-700 border border-transparent rounded-xl shadow-sm hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 transform hover:-translate-y-0.5"
                                        >
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Remove Member
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>