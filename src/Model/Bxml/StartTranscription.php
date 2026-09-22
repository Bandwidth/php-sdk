<?php

namespace Bandwidth\Model\Bxml;

class StartTranscription extends NestableVerb
{
    /**
     * @param CustomParam[]   $customParams             Nested CustomParam verbs. Up to 12 are allowed.
     * @param string|null     $name                     A name to refer to this transcription by, used when sending StopTranscription.
     * @param Tracks|null     $tracks                   The part of the call to transcribe. Default inbound.
     * @param string|null     $transcriptionEventUrl    URL to send transcription webhook events to. Does not accept BXML.
     * @param HttpMethod|null $transcriptionEventMethod HTTP method for the request to transcriptionEventUrl. Default POST.
     * @param string|null     $username                 Username for the HTTP request to transcriptionEventUrl.
     * @param string|null     $password                 Password for the HTTP request to transcriptionEventUrl.
     * @param string|null     $destination              A websocket URI to send transcription updates to.
     * @param bool|null       $stabilized               Whether to send only stable transcription updates. Requires destination. Default true.
     * @param bool|null       $detectLanguage           Whether to detect the dominant language rather than assuming English. Default false.
     * @param string|null     $preferredLanguages       Comma-separated list of language locales to transcribe in. Defaults to en-US.
     *                                                  Requires detectLanguage to be false. One dialect per language only.
     */
    public function __construct(
        array $customParams = [],
        public readonly ?string $name = null,
        public readonly ?Tracks $tracks = null,
        public readonly ?string $transcriptionEventUrl = null,
        public readonly ?HttpMethod $transcriptionEventMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $destination = null,
        public readonly ?bool $stabilized = null,
        public readonly ?bool $detectLanguage = null,
        public readonly ?string $preferredLanguages = null,
    ) {
        parent::__construct('StartTranscription', null, $customParams);
    }

    protected function childConstraint(): ?array
    {
        return [CustomParam::class, ['CustomParam']];
    }

    protected function attributes(): array
    {
        return [
            'name' => $this->name,
            'tracks' => $this->tracks,
            'transcriptionEventUrl' => $this->transcriptionEventUrl,
            'transcriptionEventMethod' => $this->transcriptionEventMethod,
            'username' => $this->username,
            'password' => $this->password,
            'destination' => $this->destination,
            'stabilized' => $this->stabilized,
            'detectLanguage' => $this->detectLanguage,
            'preferredLanguages' => $this->preferredLanguages,
        ];
    }
}
