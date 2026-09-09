<?php

namespace Bandwidth\Model\Bxml;

use DOMDocument;
use DOMElement;

class SpeakSentence extends Verb implements AudioProducer
{
    /**
     * @param string      $text   The text to speak. May mix plain text and SSML tags.
     *                            https://dev.bandwidth.com/docs/voice/bxml/speakSentence/#supported-ssml-tags
     * @param string|null $voice  Selects the voice of the speaker. If present, gender and locale are ignored.
     *                            https://dev.bandwidth.com/docs/voice/bxml/speakSentence/#supported-voices
     * @param string|null $gender "male" or "female". Default "female".
     * @param string|null $locale Default "en_US".
     */
    public function __construct(
        public readonly string $text,
        public readonly ?string $voice = null,
        public readonly ?string $gender = null,
        public readonly ?string $locale = null,
    ) {
        parent::__construct('SpeakSentence', $text);
    }

    protected function attributes(): array
    {
        return [
            'voice' => $this->voice,
            'gender' => $this->gender,
            'locale' => $this->locale,
        ];
    }

    protected function appendContent(DOMDocument $doc, DOMElement $element): void
    {
        $fragment = $doc->createDocumentFragment();

        // SSML tags must reach Bandwidth as real elements, not escaped text.
        if (@$fragment->appendXML($this->text)) {
            $element->appendChild($fragment);

            return;
        }

        $element->textContent = $this->text;
    }
}
