<?php

namespace App\Livewire\Member;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Member;
use App\Models\User;

class MembersTable extends Component
{
    use WithPagination;

    public $search = '';

    // Reset pagination when filter changes
    public function updated($property)
    {
        if (in_array($property, ['search'])) {
            $this->resetPage();
        }
    }

    public function viewMember($memberId)
    {
        return redirect()->route('members.show', $memberId);
    }

    public function editMember($memberId)
    {
        return redirect()->route('members.edit', $memberId);
    }

    public function render()
    {
        $query = Member::with(['lifeGroup', 'networkLeader'])
            ->orderBy('first_name');

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('contact', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.member.members-table', [
            'members' => $query->paginate(10),
        ]);
    }
}
