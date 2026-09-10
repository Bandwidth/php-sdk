<?php

namespace Bandwidth\Model\Bxml;

enum DiversionReason: string
{
    case UNKNOWN = 'unknown';
    case USER_BUSY = 'user-busy';
    case NO_ANSWER = 'no-answer';
    case UNAVAILABLE = 'unavailable';
    case UNCONDITIONAL = 'unconditional';
    case TIME_OF_DAY = 'time-of-day';
    case DO_NOT_DISTURB = 'do-not-disturb';
    case DEFLECTION = 'deflection';
    case FOLLOW_ME = 'follow-me';
    case OUT_OF_SERVICE = 'out-of-service';
    case AWAY = 'away';
}
