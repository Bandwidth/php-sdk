<?php

namespace Bandwidth\Model\Bxml;

class Endpoint extends Verb
{
    /**
     * @param string $endpointId An Endpoint ID to connect the call to.
     */
    public function __construct(
        public readonly string $endpointId,
    ) {
        parent::__construct('Endpoint', $endpointId);
    }

    protected function attributes(): array
    {
        return [];
    }
}
