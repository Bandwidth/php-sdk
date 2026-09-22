<?php

namespace Bandwidth\Model\Bxml;

class Connect extends NestableVerb
{
    /**
     * @param Endpoint[]  $destination      Endpoints to connect the call to.
     * @param string|null $eventCallbackUrl URL to send events to during the connection lifecycle. May be relative.
     * @param string|null $eventFallbackUrl Fallback URL used to retry event callback delivery if eventCallbackUrl fails to respond.
     */
    public function __construct(
        array $destination = [],
        public readonly ?string $eventCallbackUrl = null,
        public readonly ?string $eventFallbackUrl = null,
    ) {
        parent::__construct('Connect', null, $destination);
    }

    protected function childConstraint(): ?array
    {
        return [Endpoint::class, ['Endpoint']];
    }

    protected function attributes(): array
    {
        return [
            'eventCallbackUrl' => $this->eventCallbackUrl,
            'eventFallbackUrl' => $this->eventFallbackUrl,
        ];
    }
}
