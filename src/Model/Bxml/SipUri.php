<?php

namespace Bandwidth\Model\Bxml;

class SipUri extends Verb implements OutboundDestination
{
    /**
     * @param string          $uri                          The SIP URI to transfer the call to.
     * @param string|null     $uui                          The User-To-User header to send in the initial INVITE. Max 256 characters.
     * @param string|null     $transferAnswerUrl            URL to send the Transfer Answer event to and request BXML. May be relative.
     * @param HttpMethod|null $transferAnswerMethod         HTTP method for the request to transferAnswerUrl. Default POST.
     * @param string|null     $transferAnswerFallbackUrl    Fallback URL used to retry the Transfer Answer callback.
     * @param HttpMethod|null $transferAnswerFallbackMethod HTTP method for transferAnswerFallbackUrl. Default POST.
     * @param string|null     $transferDisconnectUrl        URL to send the Transfer Disconnect event to. Does not accept BXML.
     * @param HttpMethod|null $transferDisconnectMethod     HTTP method for the request to transferDisconnectUrl. Default POST.
     * @param string|null     $username                     Username for the HTTP requests to the transfer URLs.
     * @param string|null     $password                     Password for the HTTP requests to the transfer URLs.
     * @param string|null     $fallbackUsername             Username for the HTTP request to transferAnswerFallbackUrl.
     * @param string|null     $fallbackPassword             Password for the HTTP request to transferAnswerFallbackUrl.
     * @param string|null     $tag                          Custom string sent with all future callbacks. Max 256 characters.
     */
    public function __construct(
        public readonly string $uri,
        public readonly ?string $uui = null,
        public readonly ?string $transferAnswerUrl = null,
        public readonly ?HttpMethod $transferAnswerMethod = null,
        public readonly ?string $transferAnswerFallbackUrl = null,
        public readonly ?HttpMethod $transferAnswerFallbackMethod = null,
        public readonly ?string $transferDisconnectUrl = null,
        public readonly ?HttpMethod $transferDisconnectMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $fallbackUsername = null,
        public readonly ?string $fallbackPassword = null,
        public readonly ?string $tag = null,
    ) {
        parent::__construct('SipUri', $uri);
    }

    protected function attributes(): array
    {
        return [
            'uui' => $this->uui,
            'transferAnswerUrl' => $this->transferAnswerUrl,
            'transferAnswerMethod' => $this->transferAnswerMethod,
            'transferAnswerFallbackUrl' => $this->transferAnswerFallbackUrl,
            'transferAnswerFallbackMethod' => $this->transferAnswerFallbackMethod,
            'transferDisconnectUrl' => $this->transferDisconnectUrl,
            'transferDisconnectMethod' => $this->transferDisconnectMethod,
            'username' => $this->username,
            'password' => $this->password,
            'fallbackUsername' => $this->fallbackUsername,
            'fallbackPassword' => $this->fallbackPassword,
            'tag' => $this->tag,
        ];
    }
}
