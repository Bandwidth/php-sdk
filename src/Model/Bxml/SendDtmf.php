<?php

namespace Bandwidth\Model\Bxml;

class SendDtmf extends Verb
{
    /**
     * @param string   $digits       The DTMF digits to send.
     * @param int|null $toneDuration Length in milliseconds of each DTMF tone. Default 200. Range 50-5000.
     * @param int|null $toneInterval Length in milliseconds between DTMF tones. Default 400. Range 50-5000.
     */
    public function __construct(
        public readonly string $digits,
        public readonly ?int $toneDuration = null,
        public readonly ?int $toneInterval = null,
    ) {
        parent::__construct('SendDtmf', $digits);
    }

    protected function attributes(): array
    {
        return [
            'toneDuration' => $this->toneDuration,
            'toneInterval' => $this->toneInterval,
        ];
    }
}
