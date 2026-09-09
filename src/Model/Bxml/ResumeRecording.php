<?php

namespace Bandwidth\Model\Bxml;

class ResumeRecording extends Verb
{
    public function __construct()
    {
        parent::__construct('ResumeRecording');
    }

    protected function attributes(): array
    {
        return [];
    }
}
