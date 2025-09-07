<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\MemberEnums\Gender;
use App\Enums\MemberEnums\Status;
use App\Enums\MemberEnums\ChurchRole;
use App\Enums\MemberEnums\Ministry;
use App\Enums\MemberEnums\MinistryRole;

class Member extends Model
{
    use HasFactory; // 👈 add this line

    protected $table = 'members';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'gender',
        'birth_date',
        'address',
        'contact',
        'status',
        'invitedBy',
        'church_role',
        'ministry',
        'ministry_role',
        'ministry_assignment',
        'network_leader',
        'isActive',
    ];

    protected $casts = [
        'gender' => Gender::class,
        'status' => Status::class,
        'church_role' => ChurchRole::class,
        'ministry' => Ministry::class,
        'ministry_role' => MinistryRole::class,
        'birth_date' => 'date',
        'age' => 'integer',
        'contact' => 'string',
        'isActive' => 'boolean',
    ];
}
