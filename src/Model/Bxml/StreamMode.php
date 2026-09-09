<?php

namespace Bandwidth\Model\Bxml;

enum StreamMode: string
{
    case UNIDIRECTIONAL = 'unidirectional';
    case BIDIRECTIONAL = 'bidirectional';
}
