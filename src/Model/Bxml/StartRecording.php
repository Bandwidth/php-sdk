<?php

namespace Bandwidth\Model\Bxml;

class StartRecording extends Verb
{
    /**
     * @param string|null     $recordingAvailableUrl        URL to send the Recording Available event to. Does not accept BXML.
     * @param HttpMethod|null $recordingAvailableMethod     HTTP method for the request to recordingAvailableUrl. Default POST.
     * @param bool|null       $transcribe                   Whether the recording should be transcribed. Default false.
     * @param bool|null       $detectLanguage               Whether the transcription service should detect the dominant language rather
     *                                                      than assuming English. Ignored unless transcribe is true. Default false.
     * @param string|null     $transcriptionAvailableUrl    URL to send the Transcription Available event to. Does not accept BXML.
     * @param HttpMethod|null $transcriptionAvailableMethod HTTP method for the request to transcriptionAvailableUrl. Default POST.
     * @param string|null     $username                     Username for the HTTP request to recordingAvailableUrl.
     * @param string|null     $password                     Password for the HTTP request to recordingAvailableUrl.
     * @param string|null     $tag                          Custom string sent with all future callbacks. Max 256 characters.
     * @param FileFormat|null $fileFormat                   The audio format the recording is saved as. Default wav.
     * @param bool|null       $multiChannel                 Whether each side of the call gets its own audio channel. Default false.
     * @param string|null     $recordingName                A name identifying this recording, returned in the Recording Available event.
     */
    public function __construct(
        public readonly ?string $recordingAvailableUrl = null,
        public readonly ?HttpMethod $recordingAvailableMethod = null,
        public readonly ?bool $transcribe = null,
        public readonly ?bool $detectLanguage = null,
        public readonly ?string $transcriptionAvailableUrl = null,
        public readonly ?HttpMethod $transcriptionAvailableMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $tag = null,
        public readonly ?FileFormat $fileFormat = null,
        public readonly ?bool $multiChannel = null,
        public readonly ?string $recordingName = null,
    ) {
        parent::__construct('StartRecording');
    }

    protected function attributes(): array
    {
        return [
            'recordingAvailableUrl' => $this->recordingAvailableUrl,
            'recordingAvailableMethod' => $this->recordingAvailableMethod,
            'transcribe' => $this->transcribe,
            'detectLanguage' => $this->detectLanguage,
            'transcriptionAvailableUrl' => $this->transcriptionAvailableUrl,
            'transcriptionAvailableMethod' => $this->transcriptionAvailableMethod,
            'username' => $this->username,
            'password' => $this->password,
            'tag' => $this->tag,
            'fileFormat' => $this->fileFormat,
            'multiChannel' => $this->multiChannel,
            'recordingName' => $this->recordingName,
        ];
    }
}
