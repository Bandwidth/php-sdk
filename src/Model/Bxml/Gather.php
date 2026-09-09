<?php

namespace Bandwidth\Model\Bxml;

class Gather extends NestableVerb
{
    /**
     * @param AudioProducer[]  $audioVerbs                  Nested SpeakSentence and/or PlayAudio verbs.
     * @param string|null      $gatherUrl                   URL to send the Gather event to and request new BXML. May be relative.
     * @param HttpMethod|null  $gatherMethod                HTTP method for the request to gatherUrl. Default POST.
     * @param string|null      $gatherFallbackUrl           Fallback URL used to retry the Gather event callback.
     * @param HttpMethod|null  $gatherFallbackMethod        HTTP method for gatherFallbackUrl. Default POST.
     * @param string|null      $username                    Username for the HTTP request to gatherUrl.
     * @param string|null      $password                    Password for the HTTP request to gatherUrl.
     * @param string|null      $fallbackUsername            Username for the HTTP request to gatherFallbackUrl.
     * @param string|null      $fallbackPassword            Password for the HTTP request to gatherFallbackUrl.
     * @param string|null      $tag                         Custom string sent with this and all future callbacks. Max 256 characters.
     * @param string|null      $terminatingDigits           Digits that terminate the Gather. Default "" (disabled).
     * @param int|null         $maxDigits                   Max digits to collect. Default 50. Range 1-50.
     * @param float|null       $interDigitTimeout           Seconds allowed between digit presses. Default 5. Range 1-60.
     * @param float|null       $firstDigitTimeout           Seconds to pause after nested audio. Default 5. Range 0-60.
     * @param int|null         $repeatCount                 Times to replay the audio prompt if no digits are pressed. Default 1.
     * @param GatherInput|null $input                       The input mode. Default dtmf.
     * @param string|null      $hints                       Words or phrases that improve speech recognition. Only used when input includes speech.
     * @param string|null      $language                    Language code for speech recognition. Only used when input includes speech.
     * @param string|null      $partialResultCallback       URL to send the Partial Result event to. May be relative. Only used when input includes speech.
     * @param HttpMethod|null  $partialResultCallbackMethod HTTP method for the request to partialResultCallback. Default POST.
     * @param bool|null        $profanityFilter             Whether profane words are filtered. Default true. Only used when input includes speech.
     * @param string|null      $speechModel                 The speech recognition model to use. Only used when input includes speech.
     * @param int|null         $speechTimeout               Seconds to wait for speech input before timing out. Default 5.
     */
    public function __construct(
        array $audioVerbs = [],
        public readonly ?string $gatherUrl = null,
        public readonly ?HttpMethod $gatherMethod = null,
        public readonly ?string $gatherFallbackUrl = null,
        public readonly ?HttpMethod $gatherFallbackMethod = null,
        public readonly ?string $username = null,
        public readonly ?string $password = null,
        public readonly ?string $fallbackUsername = null,
        public readonly ?string $fallbackPassword = null,
        public readonly ?string $tag = null,
        public readonly ?string $terminatingDigits = null,
        public readonly ?int $maxDigits = null,
        public readonly ?float $interDigitTimeout = null,
        public readonly ?float $firstDigitTimeout = null,
        public readonly ?int $repeatCount = null,
        public readonly ?GatherInput $input = null,
        public readonly ?string $hints = null,
        public readonly ?string $language = null,
        public readonly ?string $partialResultCallback = null,
        public readonly ?HttpMethod $partialResultCallbackMethod = null,
        public readonly ?bool $profanityFilter = null,
        public readonly ?string $speechModel = null,
        public readonly ?int $speechTimeout = null,
    ) {
        parent::__construct('Gather', null, $audioVerbs);
    }

    protected function childConstraint(): ?array
    {
        return [AudioProducer::class, ['SpeakSentence', 'PlayAudio']];
    }

    protected function attributes(): array
    {
        return [
            'gatherUrl' => $this->gatherUrl,
            'gatherMethod' => $this->gatherMethod,
            'gatherFallbackUrl' => $this->gatherFallbackUrl,
            'gatherFallbackMethod' => $this->gatherFallbackMethod,
            'username' => $this->username,
            'password' => $this->password,
            'fallbackUsername' => $this->fallbackUsername,
            'fallbackPassword' => $this->fallbackPassword,
            'tag' => $this->tag,
            'terminatingDigits' => $this->terminatingDigits,
            'maxDigits' => $this->maxDigits,
            'interDigitTimeout' => $this->interDigitTimeout,
            'firstDigitTimeout' => $this->firstDigitTimeout,
            'repeatCount' => $this->repeatCount,
            'input' => $this->input,
            'hints' => $this->hints,
            'language' => $this->language,
            'partialResultCallback' => $this->partialResultCallback,
            'partialResultCallbackMethod' => $this->partialResultCallbackMethod,
            'profanityFilter' => $this->profanityFilter,
            'speechModel' => $this->speechModel,
            'speechTimeout' => $this->speechTimeout,
        ];
    }
}
