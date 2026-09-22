<?php

namespace Bandwidth\Model\Bxml;

class StopRecording extends Verb
{
    public function __construct()
    {
        parent::__construct('StopRecording');
    }

    protected function attributes(): array
    {
        return [];
    }
}
