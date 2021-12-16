<?php
/**
 * SpeakSentence.php
 *
 * Implementation of the BXML SpeakSentence verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class SpeakSentence extends Verb {

    /**
     * Constructor for SpeakSentence
     *
     * @param string $sentence The sentence to speak in the call
     */
    public function __construct($sentence) {
        $this->sentence = $sentence;
    }

    /**
     * Sets the voice attribute for SpeakSentence
     *
     * @param string $voice The voice to speak in the call
     */
    public function voice($voice) {
        $this->voice = $voice;
    }

    /**
     * Sets the locale attribute for SpeakSentence
     *
     * @param string $locale The locale of the voice in the call
     */
    public function locale($locale) {
        $this->locale = $locale;
    }

    /**
     * Sets the gender attribute for SpeakSentence
     *
     * @param string $gender The gender of the voice in the call
     */
    public function gender($gender) {
        $this->gender = $gender;
    }

    public function toBxml($doc) {
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
