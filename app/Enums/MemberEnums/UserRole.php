<?php

namespace App\Enums\MemberEnums;

enum UserRole: string
{
    case HEAD_PASTOR = 'Head Pastor';
    case PASTOR = 'Pastor';
    case CORE_LEADER = 'Core Leader';
    case LIFE_GUIDE = 'Life Guide';
}
