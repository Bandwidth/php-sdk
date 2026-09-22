<?php

namespace Bandwidth\Model\Bxml;

class StartGather extends Verb
{
    /**
     * @param string|null     $dtmfUrl    URL to send the DTMF event to. Does not accept BXML. May be relative.
     * @param HttpMethod|null $dtmfMethod HTTP method for the request to dtmfUrl. Default POST.
     * @param string|null     $username   Username for the HTTP request to dtmfUrl.
     * @param string|null     $password   Password for the HTTP request to dtmfUrl.
     * @param string|null     $tag        Custom string sent with all future callbacks. Max 256 characters.
     */
    public function __construct(
        public readonly ?string $dtmfUrl = null,
        public readonly ?HttpMethod $dtmfMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $tag = null,
    ) {
        parent::__construct('StartGather');
    }

    protected function attributes(): array
    {
        return [
            'dtmfUrl' => $this->dtmfUrl,
            'dtmfMethod' => $this->dtmfMethod,
            'username' => $this->username,
            'password' => $this->password,
            'tag' => $this->tag,
        ];
    }
}
