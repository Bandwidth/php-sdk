<?php

namespace Bandwidth\Model\Bxml;

class Refer extends NestableVerb
{
    /**
     * @param SipUri|null     $sipUri              The SIP URI to refer the call to.
     * @param string|null     $referCompleteUrl    URL to send the Refer Complete event to. May be relative.
     * @param HttpMethod|null $referCompleteMethod HTTP method for the request to referCompleteUrl. Default POST.
     * @param string|null     $tag                 Custom string sent with all future callbacks. Max 256 characters.
     */
    public function __construct(
        ?SipUri $sipUri = null,
        public readonly ?string $referCompleteUrl = null,
        public readonly ?HttpMethod $referCompleteMethod = null,
        public readonly ?string $tag = null,
    ) {
        parent::__construct('Refer', null, $sipUri === null ? [] : [$sipUri]);
    }

    protected function childConstraint(): ?array
    {
        return [SipUri::class, ['SipUri']];
    }

    protected function attributes(): array
    {
        return [
            'referCompleteUrl' => $this->referCompleteUrl,
            'referCompleteMethod' => $this->referCompleteMethod,
            'tag' => $this->tag,
        ];
    }
}
