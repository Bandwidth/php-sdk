<?php
/**
 * SendDtmf.php
 *
 * Implementation of the BXML SendDtmf verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class SendDtmf extends Verb {

    /**
     * Constructor for SendDtmf
     *
     * @param string $digits The dtmf digits
     */
    public function __construct($digits) {
        $this->digits = $digits;
    }

    /**
     * Sets the toneDuration attribute for SendDtmf
     *
     * @param double $toneDuration The length in milliseconds of each DTMF tone
     */
    public function toneDuration($toneDuration) {
        $this->toneDuration = $toneDuration;
    }

    /**
     * Sets the toneInterval attribute for SendDtmf
     *
     * @param double $toneInterval The duration of silence in milliseconds following each DTMF tone
     */
    public function toneInterval($toneInterval) {
        $this->toneInterval = $toneInterval;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("SendDtmf");

        $element->appendChild($doc->createTextNode($this->digits));

        if(isset($this->toneDuration)) {
            $element->setattribute("toneDuration", $this->toneDuration);
        }

        if(isset($this->toneInterval)) {
            $element->setattribute("toneInterval", $this->toneInterval);
        }

        return $element;
    }
}
