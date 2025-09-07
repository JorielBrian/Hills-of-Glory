<?php

namespace App\Enums\MemberEnums;

enum ChurchRole: string
{
    case HEAD_PASTOR = 'Head Pastor';
    case PASTOR = 'Pastor';
    case NETWORK_LEADER = 'Network Leader';
    case LIFE_GUIDE = 'Life Guide';
    case FIRST_TIMER = 'First Timer';
    case MEMBER = 'Member';
}
