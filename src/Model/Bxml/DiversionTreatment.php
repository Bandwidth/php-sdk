<?php

namespace Bandwidth\Model\Bxml;

enum DiversionTreatment: string
{
    case NONE = 'none';
    case PROPAGATE = 'propagate';
    case STACK = 'stack';
}
