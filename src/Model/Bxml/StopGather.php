<?php

namespace Bandwidth\Model\Bxml;

class StopGather extends Verb
{
    public function __construct()
    {
        parent::__construct('StopGather');
    }

    protected function attributes(): array
    {
        return [];
    }
}
