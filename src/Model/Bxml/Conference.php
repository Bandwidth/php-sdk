<?php

namespace Bandwidth\Model\Bxml;

class Conference extends Verb
{
    /**
     * @param string          $name                           The name of the conference to join. Max 100 characters.
     * @param bool|null       $mute                            Whether the member should be muted in the conference. Default false.
     * @param bool|null       $hold                            Whether the member should be on hold in the conference. Default false.
     * @param string|null     $callIdsToCoach                  Comma-separated list of call IDs to coach.
     * @param string|null     $conferenceEventUrl              URL to send conference events to. May be relative.
     * @param HttpMethod|null $conferenceEventMethod           HTTP method for the request to conferenceEventUrl. Default POST.
     * @param string|null     $conferenceEventFallbackUrl      Fallback URL used to retry conference webhooks.
     * @param HttpMethod|null $conferenceEventFallbackMethod   HTTP method for conferenceEventFallbackUrl. Default POST.
     * @param string|null     $username                        Username for the HTTP request to conferenceEventUrl.
     * @param string|null     $password                        Password for the HTTP request to conferenceEventUrl.
     * @param string|null     $fallbackUsername                Username for the HTTP request to conferenceEventFallbackUrl.
     * @param string|null     $fallbackPassword                Password for the HTTP request to conferenceEventFallbackUrl.
     * @param string|null     $tag                             Custom string sent with all future callbacks. Max 256 characters.
     * @param float|null      $callbackTimeout                 Timeout in seconds for conference webhook delivery. Range 1-25.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?bool $mute = null,
        public readonly ?bool $hold = null,
        public readonly ?string $callIdsToCoach = null,
        public readonly ?string $conferenceEventUrl = null,
        public readonly ?HttpMethod $conferenceEventMethod = null,
        public readonly ?string $conferenceEventFallbackUrl = null,
        public readonly ?HttpMethod $conferenceEventFallbackMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $fallbackUsername = null,
        public readonly ?string $fallbackPassword = null,
        public readonly ?string $tag = null,
        public readonly ?float $callbackTimeout = null,
    ) {
        parent::__construct('Conference', $name);
    }

    protected function attributes(): array
    {
        return [
            'mute' => $this->mute,
            'hold' => $this->hold,
            'callIdsToCoach' => $this->callIdsToCoach,
            'conferenceEventUrl' => $this->conferenceEventUrl,
            'conferenceEventMethod' => $this->conferenceEventMethod,
            'conferenceEventFallbackUrl' => $this->conferenceEventFallbackUrl,
            'conferenceEventFallbackMethod' => $this->conferenceEventFallbackMethod,
            'username' => $this->username,
            'password' => $this->password,
            'fallbackUsername' => $this->fallbackUsername,
            'fallbackPassword' => $this->fallbackPassword,
            'tag' => $this->tag,
            'callbackTimeout' => $this->callbackTimeout,
        ];
    }
}
