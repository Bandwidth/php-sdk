<?php

namespace Bandwidth\Model\Bxml;

class StartStream extends NestableVerb
{
    /**
     * @param StreamParam[]   $streamParams         Nested StreamParam verbs. Up to 12 are allowed.
     * @param string|null     $name                 A name to refer to this stream by, used when sending StopStream.
     * @param StreamMode|null $mode                 Whether the stream is unidirectional or bidirectional. Default unidirectional.
     * @param Tracks|null     $tracks               The part of the call to stream. Default inbound.
     * @param string|null     $destination          A websocket URI to send the stream to.
     * @param string|null     $destinationUsername  Username for the Authorization header on the websocket connection.
     * @param string|null     $destinationPassword  Password for the Authorization header on the websocket connection.
     * @param string|null     $streamEventUrl       URL to send stream lifetime webhook events to. Does not accept BXML.
     * @param HttpMethod|null $streamEventMethod    HTTP method for the request to streamEventUrl. Default POST.
     * @param string|null     $username             Username for the HTTP request to streamEventUrl.
     * @param string|null     $password             Password for the HTTP request to streamEventUrl.
     */
    public function __construct(
        array $streamParams = [],
        public readonly ?string $name = null,
        public readonly ?StreamMode $mode = null,
        public readonly ?Tracks $tracks = null,
        public readonly ?string $destination = null,
        public readonly ?string $destinationUsername = null,
        public readonly ?string $destinationPassword = null,
        public readonly ?string $streamEventUrl = null,
        public readonly ?HttpMethod $streamEventMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
    ) {
        parent::__construct('StartStream', null, $streamParams);
    }

    protected function childConstraint(): ?array
    {
        return [StreamParam::class, ['StreamParam']];
    }

    protected function attributes(): array
    {
        return [
            'name' => $this->name,
            'mode' => $this->mode,
            'tracks' => $this->tracks,
            'destination' => $this->destination,
            'destinationUsername' => $this->destinationUsername,
            'destinationPassword' => $this->destinationPassword,
            'streamEventUrl' => $this->streamEventUrl,
            'streamEventMethod' => $this->streamEventMethod,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
