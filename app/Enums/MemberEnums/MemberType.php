<?php

namespace App\Enums\MemberEnums;

enum MemberType: string
{
    case STUDENT = 'Student';
    case UNEMPLOYED = 'Unemployed';
    case YOUNG_PROFESSIONAL = 'Young Professional';
    case PROFESSIONAL = 'Professional';
    case OTHERS = 'Others';
}
