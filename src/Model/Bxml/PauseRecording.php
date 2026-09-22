<?php

namespace Bandwidth\Model\Bxml;

class PauseRecording extends Verb
{
    public function __construct()
    {
        parent::__construct('PauseRecording');
    }

    protected function attributes(): array
    {
        return [];
    }
}
