<?php

namespace Bandwidth\Model\Bxml;

class Transfer extends NestableVerb
{
    /**
     * @param OutboundDestination[]   $transferTo                    Nested PhoneNumber and/or SipUri verbs.
     * @param string|null             $transferCallerId              The caller ID to use when the call is transferred.
     * @param bool|null               $privacy                       Hide the calling number. Use transferCallerDisplayName to customize the displayed name.
     * @param string|null             $transferCallerDisplayName     The caller display name to use when transferred. Max 256 characters.
     * @param float|null              $callTimeout                   Seconds to wait for the callee to answer. Default 30. Range 1-300.
     * @param string|null             $transferCompleteUrl           URL to send the Transfer Complete event to and request new BXML. May be relative.
     * @param HttpMethod|null         $transferCompleteMethod        HTTP method for the request to transferCompleteUrl. Default POST.
     * @param string|null             $transferCompleteFallbackUrl   Fallback URL used to retry the Transfer Complete callback.
     * @param HttpMethod|null         $transferCompleteFallbackMethod HTTP method for transferCompleteFallbackUrl. Default POST.
     * @param string|null             $username                      Username for the HTTP request to transferCompleteUrl.
     * @param string|null             $password                      Password for the HTTP request to transferCompleteUrl.
     * @param string|null             $fallbackUsername              Username for the HTTP request to transferCompleteFallbackUrl.
     * @param string|null             $fallbackPassword              Password for the HTTP request to transferCompleteFallbackUrl.
     * @param string|null             $tag                           Custom string sent with all future callbacks. Max 256 characters.
     * @param DiversionTreatment|null $diversionTreatment            How Diversion headers are handled on the outbound leg.
     * @param DiversionReason|null    $diversionReason               Only considered when diversionTreatment is stack.
     */
    public function __construct(
        array $transferTo = [],
        public readonly ?string $transferCallerId = null,
        public readonly ?bool $privacy = null,
        public readonly ?string $transferCallerDisplayName = null,
        public readonly ?float $callTimeout = null,
        public readonly ?string $transferCompleteUrl = null,
        public readonly ?HttpMethod $transferCompleteMethod = null,
        public readonly ?string $transferCompleteFallbackUrl = null,
        public readonly ?HttpMethod $transferCompleteFallbackMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $fallbackUsername = null,
        public readonly ?string $fallbackPassword = null,
        public readonly ?string $tag = null,
        public readonly ?DiversionTreatment $diversionTreatment = null,
        public readonly ?DiversionReason $diversionReason = null,
    ) {
        parent::__construct('Transfer', null, $transferTo);
    }

    protected function childConstraint(): ?array
    {
        return [OutboundDestination::class, ['PhoneNumber', 'SipUri']];
    }

    protected function attributes(): array
    {
        return [
            'transferCallerId' => $this->transferCallerId,
            'privacy' => $this->privacy,
            'transferCallerDisplayName' => $this->transferCallerDisplayName,
            'callTimeout' => $this->callTimeout,
            'transferCompleteUrl' => $this->transferCompleteUrl,
            'transferCompleteMethod' => $this->transferCompleteMethod,
            'transferCompleteFallbackUrl' => $this->transferCompleteFallbackUrl,
            'transferCompleteFallbackMethod' => $this->transferCompleteFallbackMethod,
            'username' => $this->username,
            'password' => $this->password,
            'fallbackUsername' => $this->fallbackUsername,
            'fallbackPassword' => $this->fallbackPassword,
            'tag' => $this->tag,
            'diversionTreatment' => $this->diversionTreatment,
            'diversionReason' => $this->diversionReason,
        ];
    }
}
