<?php

namespace Bandwidth\Model\Bxml;

class Forward extends Verb
{
    /**
     * @param string|null             $to                 The phone number to forward the call to, in E.164 format.
     * @param string|null             $from               The caller ID to use when forwarding, in E.164 format.
     * @param bool|null               $privacy            Hide the calling number. Use callerDisplayName to customize the displayed name.
     * @param string|null             $callerDisplayName  The caller display name to use when the call is created. Max 256 characters.
     *                                                    If privacy is true, only Restricted, Anonymous, Private, or Unavailable are valid.
     * @param float|null              $callTimeout        Seconds to wait for the callee to answer. Default 30. Range 1-300.
     * @param DiversionTreatment|null $diversionTreatment How Diversion headers are handled on the outbound leg.
     * @param DiversionReason|null    $diversionReason    Only considered when diversionTreatment is stack.
     * @param string|null             $uui                The User-To-User header to send in the initial INVITE. Max 256 characters.
     */
    public function __construct(
        public readonly ?string $to = null,
        public readonly ?string $from = null,
        public readonly ?bool $privacy = null,
        public readonly ?string $callerDisplayName = null,
        public readonly ?float $callTimeout = null,
        public readonly ?DiversionTreatment $diversionTreatment = null,
        public readonly ?DiversionReason $diversionReason = null,
        public readonly ?string $uui = null,
    ) {
        parent::__construct('Forward');
    }

    protected function attributes(): array
    {
        return [
            'to' => $this->to,
            'from' => $this->from,
            'privacy' => $this->privacy,
            'callerDisplayName' => $this->callerDisplayName,
            'callTimeout' => $this->callTimeout,
            'diversionTreatment' => $this->diversionTreatment,
            'diversionReason' => $this->diversionReason,
            'uui' => $this->uui,
        ];
    }
}
