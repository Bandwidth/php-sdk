<?php

namespace Bandwidth\Model\Bxml;

enum Tracks: string
{
    case INBOUND = 'inbound';
    case OUTBOUND = 'outbound';
    case BOTH = 'both';
}
