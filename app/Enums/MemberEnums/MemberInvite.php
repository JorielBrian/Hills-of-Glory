<?php

namespace App\Enums\MemberEnums;

enum MemberInvite: string
{
    case FIRST_TIMER = 'First Timer';
    case NEW_SOUL = 'Newly Won Soul';
    case VISITOR = 'Visitor';
}
