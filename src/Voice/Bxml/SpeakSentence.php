<?php
/**
 * SpeakSentence.php
 *
 * Implementation of the BXML SpeakSentence verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class SpeakSentence extends Verb {
    /**
     * @var string
     */
    private $gender;
    /**
     * @var string
     */
    private $locale;
    /**
     * @var string
     */
    private $voice;
    /**
     * @var string
     */
    private $sentence;

    /**
     * Constructor for SpeakSentence
     *
     * @param string $sentence The sentence to speak in the call
     */
    public function __construct(string $sentence) {
        $this->sentence = $sentence;
    }

    /**
     * Sets the voice attribute for SpeakSentence
     *
     * @param string $voice The voice to speak in the call
     */
    public function voice(string $voice): SpeakSentence {
        $this->voice = $voice;
        return $this;
    }

    /**
     * Sets the locale attribute for SpeakSentence
     *
     * @param string $locale The locale of the voice in the call
     */
    public function locale(string $locale): SpeakSentence {
        $this->locale = $locale;
        return $this;
    }

    /**
     * Sets the gender attribute for SpeakSentence
     *
     * @param string $gender The gender of the voice in the call
     */
    public function gender(string $gender): SpeakSentence {
        $this->gender = $gender;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("SpeakSentence");

        $element->appendChild($doc->createTextNode($this->sentence));

        if(isset($this->locale)) {
            $element->setAttribute("locale", $this->locale);
        }

        if(isset($this->gender)) {
            $element->setAttribute("gender", $this->gender);
        }

        if(isset($this->voice)) {
            $element->setAttribute("voice", $this->voice);
        }

        return $element;
    }
}
