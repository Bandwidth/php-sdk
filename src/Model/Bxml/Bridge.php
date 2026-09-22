<?php

namespace Bandwidth\Model\Bxml;

class Bridge extends Verb
{
    /**
     * @param string          $targetCall                         The call ID of the call to bridge with.
     * @param string|null     $bridgeCompleteUrl                  URL to send the Bridge Complete event to and request new BXML. May be relative.
     * @param HttpMethod|null $bridgeCompleteMethod               HTTP method for the request to bridgeCompleteUrl. Default POST.
     * @param string|null     $bridgeCompleteFallbackUrl          Fallback URL used to retry the Bridge Complete callback.
     * @param HttpMethod|null $bridgeCompleteFallbackMethod       HTTP method for bridgeCompleteFallbackUrl. Default POST.
     * @param string|null     $bridgeTargetCompleteUrl            URL to send the Bridge Target Complete event to. May be relative.
     * @param HttpMethod|null $bridgeTargetCompleteMethod         HTTP method for the request to bridgeTargetCompleteUrl. Default POST.
     * @param string|null     $bridgeTargetCompleteFallbackUrl    Fallback URL used to retry the Bridge Target Complete callback.
     * @param HttpMethod|null $bridgeTargetCompleteFallbackMethod HTTP method for bridgeTargetCompleteFallbackUrl. Default POST.
     * @param string|null     $username                           Username for the HTTP request to bridgeCompleteUrl.
     * @param string|null     $password                           Password for the HTTP request to bridgeCompleteUrl.
     * @param string|null     $fallbackUsername                   Username for the HTTP request to the fallback URLs.
     * @param string|null     $fallbackPassword                   Password for the HTTP request to the fallback URLs.
     * @param string|null     $tag                                Custom string sent with all future callbacks. Max 256 characters.
     */
    public function __construct(
        public readonly string $targetCall,
        public readonly ?string $bridgeCompleteUrl = null,
        public readonly ?HttpMethod $bridgeCompleteMethod = null,
        public readonly ?string $bridgeCompleteFallbackUrl = null,
        public readonly ?HttpMethod $bridgeCompleteFallbackMethod = null,
        public readonly ?string $bridgeTargetCompleteUrl = null,
        public readonly ?HttpMethod $bridgeTargetCompleteMethod = null,
        public readonly ?string $bridgeTargetCompleteFallbackUrl = null,
        public readonly ?HttpMethod $bridgeTargetCompleteFallbackMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $fallbackUsername = null,
        public readonly ?string $fallbackPassword = null,
        public readonly ?string $tag = null,
    ) {
        parent::__construct('Bridge', $targetCall);
    }

    protected function attributes(): array
    {
        return [
            'bridgeCompleteUrl' => $this->bridgeCompleteUrl,
            'bridgeCompleteMethod' => $this->bridgeCompleteMethod,
            'bridgeCompleteFallbackUrl' => $this->bridgeCompleteFallbackUrl,
            'bridgeCompleteFallbackMethod' => $this->bridgeCompleteFallbackMethod,
            'bridgeTargetCompleteUrl' => $this->bridgeTargetCompleteUrl,
            'bridgeTargetCompleteMethod' => $this->bridgeTargetCompleteMethod,
            'bridgeTargetCompleteFallbackUrl' => $this->bridgeTargetCompleteFallbackUrl,
            'bridgeTargetCompleteFallbackMethod' => $this->bridgeTargetCompleteFallbackMethod,
            'username' => $this->username,
            'password' => $this->password,
            'fallbackUsername' => $this->fallbackUsername,
            'fallbackPassword' => $this->fallbackPassword,
            'tag' => $this->tag,
        ];
    }
}
