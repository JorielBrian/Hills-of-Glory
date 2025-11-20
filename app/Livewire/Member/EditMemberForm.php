<?php

namespace App\Livewire\Member;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Member;
use App\Models\LifeGroup;
use App\Enums\MemberEnums\Gender;
use App\Enums\MemberEnums\MemberRole;
use App\Enums\MemberEnums\HillsJourney;
use App\Enums\MemberEnums\MemberType;
use App\Enums\MemberEnums\Ministry;
use App\Enums\MemberEnums\MinistryRole;
use App\Enums\EventsEnums\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class EditMemberForm extends Component
{
    use WithFileUploads;

    public Member $member;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $birth_date;
    public $contact;
    public $email;
    public $address;
    public $member_type;
    public $is_married;
    public $invited_by;
    public $date_invited;
    public $service_invited;
    public $facebook_account;
    public $member_photo;
    public $new_member_photo;
    public $member_role;
    public $hills_journey;
    public $ministry;
    public $ministry_role;
    public $ministry_assignment;
    public $life_group;

    // Define the enum arrays as properties
    public $genders;
    public $memberTypes;
    public $memberRoles;
    public $hillsJourneys;
    public $ministries;
    public $ministryRoles;
    public $lifeGroups;
    public $serviceEvents;

    protected function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'contact' => [
                'required',
                'string',
                'max:20',
                Rule::unique('members')->ignore($this->member->id),
            ],
            'email' => [
                'nullable',
                'email',
                Rule::unique('members')->ignore($this->member->id),
            ],
            'address' => 'required|string|max:500',
            'member_type' => 'required',
            'member_role' => 'required',
            'hills_journey' => 'required',
            'invited_by' => 'required|string|max:255',
            'date_invited' => 'required|date',
            'service_invited' => 'required',
            'new_member_photo' => 'nullable|image|max:2048',
        ];
    }

    public function mount(Member $member)
    {
        $this->member = $member;
        $this->first_name = $member->first_name;
        $this->middle_name = $member->middle_name;
        $this->last_name = $member->last_name;
        $this->gender = $member->gender instanceof \BackedEnum ? $member->gender->value : $member->gender;
        $this->birth_date = $member->birth_date->format('Y-m-d');
        $this->contact = $member->contact;
        $this->email = $member->email;
        $this->address = $member->address;
        $this->member_type = $member->member_type instanceof \BackedEnum ? $member->member_type->value : $member->member_type;
        $this->is_married = $member->is_married;
        $this->invited_by = $member->invited_by;
        $this->date_invited = $member->date_invited?->format('Y-m-d');
        $this->service_invited = $member->service_invited instanceof \BackedEnum ? $member->service_invited->value : $member->service_invited;
        $this->facebook_account = $member->facebook_account;
        $this->member_photo = $member->member_photo;
        $this->member_role = $member->member_role instanceof \BackedEnum ? $member->member_role->value : $member->member_role;
        $this->hills_journey = $member->hills_journey instanceof \BackedEnum ? $member->hills_journey->value : $member->hills_journey;
        $this->ministry = $member->ministry instanceof \BackedEnum ? $member->ministry->value : $member->ministry;
        $this->ministry_role = $member->ministry_role instanceof \BackedEnum ? $member->ministry_role->value : $member->ministry_role;
        $this->ministry_assignment = $member->ministry_assignment;
        $this->life_group = $member->life_group_id;

        // Initialize the enum arrays
        $this->initializeEnums();
    }

    /**
     * Initialize enum arrays
     */
    protected function initializeEnums(): void
    {
        $this->genders = Gender::cases();
        $this->memberTypes = MemberType::cases();
        $this->memberRoles = MemberRole::cases();
        $this->hillsJourneys = HillsJourney::cases();
        $this->ministries = Ministry::cases();
        $this->ministryRoles = MinistryRole::cases();
        $this->serviceEvents = Event::cases();
        $this->lifeGroups = LifeGroup::active()->get();
    }

    /**
     * Computed property for age
     */
    public function getComputedAgeProperty()
    {
        if ($this->birth_date) {
            return Carbon::parse($this->birth_date)->age;
        }
        return null;
    }

    public function updatedBirthDate($value)
    {
        // This will trigger when birth_date is updated
        // The computed age will automatically update
    }

    public function updatedLifeGroup($value)
    {
        // This will automatically set the network leader when a life group is selected
    }

    public function updateMember()
    {
        $this->validate();

        try {
            $photoPath = $this->member_photo;
            if ($this->new_member_photo) {
                // Delete old photo if exists
                if ($photoPath && Storage::disk('public')->exists($photoPath)) {
                    Storage::disk('public')->delete($photoPath);
                }
                $photoPath = $this->new_member_photo->store('member-photos', 'public');
            }

            // Get network leader from selected life group
            $networkLeaderId = null;
            if ($this->life_group) {
                $lifeGroup = LifeGroup::find($this->life_group);
                $networkLeaderId = $lifeGroup->network_leader_id;
            }

            $this->member->update([
                'first_name' => $this->first_name,
                'middle_name' => $this->middle_name,
                'last_name' => $this->last_name,
                'gender' => $this->gender,
                'birth_date' => $this->birth_date,
                'contact' => $this->contact,
                'email' => $this->email,
                'address' => $this->address,
                'member_type' => $this->member_type,
                'is_married' => $this->is_married,
                'invited_by' => $this->invited_by,
                'date_invited' => $this->date_invited,
                'service_invited' => $this->service_invited,
                'facebook_account' => $this->facebook_account,
                'member_photo' => $photoPath,
                'member_role' => $this->member_role,
                'hills_journey' => $this->hills_journey,
                'ministry' => $this->ministry,
                'ministry_role' => $this->ministry_role,
                'ministry_assignment' => $this->ministry_assignment,
                'life_group_id' => $this->life_group ?: null,
                'network_leader_id' => $networkLeaderId,
            ]);

            session()->flash('message', 'Member updated successfully!');

            return redirect()->route('members.show', $this->member);
        } catch (\Exception $e) {
            session()->flash('error', 'Error updating member: ' . $e->getMessage());
        }
    }

    public function backToMember()
    {
        return redirect()->route('members.show', $this->member);
    }

    public function render()
    {
        return view('livewire.member.edit-member-form');
    }
}
