<?php

namespace Bandwidth\Model\Bxml;

enum GatherInput: string
{
    case DTMF = 'dtmf';
    case SPEECH = 'speech';
    case DTMF_SPEECH = 'dtmf_speech';
}
