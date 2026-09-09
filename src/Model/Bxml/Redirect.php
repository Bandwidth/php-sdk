<?php

namespace Bandwidth\Model\Bxml;

class Redirect extends Verb
{
    /**
     * @param string|null     $redirectUrl            URL to send the Redirect event to and request new BXML. May be relative.
     * @param HttpMethod|null $redirectMethod         HTTP method for the request to redirectUrl. Default POST.
     * @param string|null     $redirectFallbackUrl    Fallback URL used to retry the Redirect callback.
     * @param HttpMethod|null $redirectFallbackMethod HTTP method for redirectFallbackUrl. Default POST.
     * @param string|null     $username               Username for the HTTP request to redirectUrl.
     * @param string|null     $password               Password for the HTTP request to redirectUrl.
     * @param string|null     $fallbackUsername       Username for the HTTP request to redirectFallbackUrl.
     * @param string|null     $fallbackPassword       Password for the HTTP request to redirectFallbackUrl.
     * @param string|null     $tag                    Custom string sent with all future callbacks. Max 256 characters.
     */
    public function __construct(
        public readonly ?string $redirectUrl = null,
        public readonly ?HttpMethod $redirectMethod = null,
        public readonly ?string $redirectFallbackUrl = null,
        public readonly ?HttpMethod $redirectFallbackMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $fallbackUsername = null,
        public readonly ?string $fallbackPassword = null,
        public readonly ?string $tag = null,
    ) {
        parent::__construct('Redirect');
    }

    protected function attributes(): array
    {
        return [
            'redirectUrl' => $this->redirectUrl,
            'redirectMethod' => $this->redirectMethod,
            'redirectFallbackUrl' => $this->redirectFallbackUrl,
            'redirectFallbackMethod' => $this->redirectFallbackMethod,
            'username' => $this->username,
            'password' => $this->password,
            'fallbackUsername' => $this->fallbackUsername,
            'fallbackPassword' => $this->fallbackPassword,
            'tag' => $this->tag,
        ];
    }
}
