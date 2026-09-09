<?php

namespace Bandwidth\Model\Bxml;

class Bxml extends Root
{
    /**
     * @param Verb[] $verbs
     */
    public function __construct(array $verbs = [])
    {
        parent::__construct('Bxml', $verbs);
    }
}
