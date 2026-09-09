<?php

namespace Bandwidth\Model\Bxml;

class Hangup extends Verb
{
    public function __construct()
    {
        parent::__construct('Hangup');
    }

    protected function attributes(): array
    {
        return [];
    }
}
