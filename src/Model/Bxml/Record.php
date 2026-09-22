<?php

namespace Bandwidth\Model\Bxml;

class Record extends Verb
{
    /**
     * @param string|null     $recordCompleteUrl            URL to send the Record Complete event to and request new BXML. May be relative.
     * @param HttpMethod|null $recordCompleteMethod         HTTP method for the request to recordCompleteUrl. Default POST.
     * @param string|null     $recordCompleteFallbackUrl    Fallback URL used to retry the Record Complete callback.
     * @param HttpMethod|null $recordCompleteFallbackMethod HTTP method for recordCompleteFallbackUrl. Default POST.
     * @param string|null     $recordingAvailableUrl        URL to send the Recording Available event to. Does not accept BXML.
     * @param HttpMethod|null $recordingAvailableMethod     HTTP method for the request to recordingAvailableUrl. Default POST.
     * @param bool|null       $transcribe                   Whether the recording should be transcribed. Default false.
     * @param bool|null       $detectLanguage               Whether the transcription service should detect the dominant language rather
     *                                                      than assuming English. Ignored unless transcribe is true. Default false.
     * @param string|null     $transcriptionAvailableUrl    URL to send the Transcription Available event to. Does not accept BXML.
     * @param HttpMethod|null $transcriptionAvailableMethod HTTP method for the request to transcriptionAvailableUrl. Default POST.
     * @param string|null     $username                     Username for the HTTP request to recordCompleteUrl.
     * @param string|null     $password                     Password for the HTTP request to recordCompleteUrl.
     * @param string|null     $fallbackUsername             Username for the HTTP request to the fallback URL.
     * @param string|null     $fallbackPassword             Password for the HTTP request to the fallback URL.
     * @param string|null     $tag                          Custom string sent with all future callbacks. Max 256 characters.
     * @param string|null     $terminatingDigits            A digit that terminates the recording. Default "" (disabled).
     * @param int|null        $maxDuration                  Maximum recording length in seconds. Default 60. Max 10800.
     * @param float|null      $silenceTimeout               Seconds of silence after which the recording ends.
     * @param FileFormat|null $fileFormat                   The audio format the recording is saved as. Default wav.
     * @param string|null     $recordingName                A name identifying this recording, returned in the Recording Available event.
     */
    public function __construct(
        public readonly ?string $recordCompleteUrl = null,
        public readonly ?HttpMethod $recordCompleteMethod = null,
        public readonly ?string $recordCompleteFallbackUrl = null,
        public readonly ?HttpMethod $recordCompleteFallbackMethod = null,
        public readonly ?string $recordingAvailableUrl = null,
        public readonly ?HttpMethod $recordingAvailableMethod = null,
        public readonly ?bool $transcribe = null,
        public readonly ?bool $detectLanguage = null,
        public readonly ?string $transcriptionAvailableUrl = null,
        public readonly ?HttpMethod $transcriptionAvailableMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $fallbackUsername = null,
        public readonly ?string $fallbackPassword = null,
        public readonly ?string $tag = null,
        public readonly ?string $terminatingDigits = null,
        public readonly ?int $maxDuration = null,
        public readonly ?float $silenceTimeout = null,
        public readonly ?FileFormat $fileFormat = null,
        public readonly ?string $recordingName = null,
    ) {
        parent::__construct('Record');
    }

    protected function attributes(): array
    {
        return [
            'recordCompleteUrl' => $this->recordCompleteUrl,
            'recordCompleteMethod' => $this->recordCompleteMethod,
            'recordCompleteFallbackUrl' => $this->recordCompleteFallbackUrl,
            'recordCompleteFallbackMethod' => $this->recordCompleteFallbackMethod,
            'recordingAvailableUrl' => $this->recordingAvailableUrl,
            'recordingAvailableMethod' => $this->recordingAvailableMethod,
            'transcribe' => $this->transcribe,
            'detectLanguage' => $this->detectLanguage,
            'transcriptionAvailableUrl' => $this->transcriptionAvailableUrl,
            'transcriptionAvailableMethod' => $this->transcriptionAvailableMethod,
            'username' => $this->username,
            'password' => $this->password,
            'fallbackUsername' => $this->fallbackUsername,
            'fallbackPassword' => $this->fallbackPassword,
            'tag' => $this->tag,
            'terminatingDigits' => $this->terminatingDigits,
            'maxDuration' => $this->maxDuration,
            'silenceTimeout' => $this->silenceTimeout,
            'fileFormat' => $this->fileFormat,
            'recordingName' => $this->recordingName,
        ];
    }
}
