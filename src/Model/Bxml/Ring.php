<?php

namespace Bandwidth\Model\Bxml;

class Ring extends Verb
{
    /**
     * @param float|null $duration   Seconds to play ringing on the call. Default 5. Range 0.1-86400.
     * @param bool|null  $answerCall Whether to answer the call when Ring runs on an unanswered
     *                               inbound call. Default true.
     */
    public function __construct(
        public readonly ?float $duration = null,
        public readonly ?bool $answerCall = null,
    ) {
        parent::__construct('Ring');
    }

    protected function attributes(): array
    {
        return [
            'duration' => $this->duration,
            'answerCall' => $this->answerCall,
        ];
    }
}
