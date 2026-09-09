<?php

namespace Bandwidth\Model\Bxml;

class Pause extends Verb
{
    /**
     * @param float|null $duration The time in seconds to pause. Default value is 1.
     */
    public function __construct(
        public readonly ?float $duration = null,
    ) {
        parent::__construct('Pause');
    }

    protected function attributes(): array
    {
        return [
            'duration' => $this->duration,
        ];
    }
}
