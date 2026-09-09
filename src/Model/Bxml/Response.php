<?php

namespace Bandwidth\Model\Bxml;

class Response extends Root
{
    /**
     * @param Verb[] $verbs
     */
    public function __construct(array $verbs = [])
    {
        parent::__construct('Response', $verbs);
    }
}
