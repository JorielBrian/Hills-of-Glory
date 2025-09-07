<?php

namespace App\Enums\MemberEnums;

enum MinistryRole: string
{
    case DIRECTOR = 'Director';
    case LEADER = 'Leader';
    case MEMBER = 'Member';
    case TRAINEE = 'Trainee';
}
