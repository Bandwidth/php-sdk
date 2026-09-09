<?php

namespace Bandwidth\Model\Bxml;

class StopTranscription extends Verb
{
    /**
     * @param string|null $name The name of the real-time transcription to stop. Either the name
     *                          given when sending StartTranscription, or the system generated name
     *                          returned in the Real-Time Transcription Started webhook if
     *                          StartTranscription was sent with no name. If omitted, all active
     *                          call transcriptions are stopped.
     */
    public function __construct(
        public readonly ?string $name = null,
    ) {
        parent::__construct('StopTranscription');
    }

    protected function attributes(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
