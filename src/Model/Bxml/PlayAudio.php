<?php

namespace Bandwidth\Model\Bxml;

class PlayAudio extends Verb implements AudioProducer
{
    /**
     * @param string      $audioUri The URL of the audio file to play. May be relative.
     * @param string|null $username The username to send in the HTTP request to audioUri.
     * @param string|null $password The password to send in the HTTP request to audioUri.
     */
    public function __construct(
        public readonly string $audioUri,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
    ) {
        parent::__construct('PlayAudio', $audioUri);
    }

    protected function attributes(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}
