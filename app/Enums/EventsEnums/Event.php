<?php

namespace App\Enums\EventsEnums;

enum Event: string
{
    // WEEKLY SERVICES
    case SUNDAY_SERVICE = 'Sunday Service';
    case PRAYER_ENCOUNTER = 'Prayer Encounter';
    case PROTEGE = 'Protege';
        // MONTHLY SERVICES
    case PROTEGE_GIG = 'Protege Gig';
    case SOAKING = 'Soaking';
    case PRAYER_AND_FASTING = 'Prayer and Fasting';
    case LIFEGUIDE_SUMMIT = 'Lifeguide Summit';
        // SPIRITUAL JOURNEY
    case STARTUP = 'Start Up';
    case RETREAT = 'Retreat';
        // ANNUAL EVENTS
    case CONCERT = 'Concert';
    case SIMBANG_GABI = 'Simbang Gabi';
    case LIFEGUIDE_ONBOARDING = 'Lifeguide Onboarding';
    case OTHER = 'Other';
}
