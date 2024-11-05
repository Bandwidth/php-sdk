<?php
/**
 * SendDtmf.php
 *
 * Implementation of the BXML SendDtmf verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class SendDtmf extends Verb {
    /**
     * @var float
     */
    private $toneInterval;
    /**
     * @var float
     */
    private $toneDuration;
    /**
     * @var string
     */
    private $digits;

    /**
     * Constructor for SendDtmf
     *
     * @param string $digits The dtmf digits
     */
    public function __construct(string $digits) {
        $this->digits = $digits;
    }

    /**
     * Sets the toneDuration attribute for SendDtmf
     *
     * @param double $toneDuration The length in milliseconds of each DTMF tone
     */
    public function toneDuration(float $toneDuration): static {
        $this->toneDuration = $toneDuration;
        return $this;
    }

    /**
     * Sets the toneInterval attribute for SendDtmf
     *
     * @param double $toneInterval The duration of silence in milliseconds following each DTMF tone
     */
    public function toneInterval(float $toneInterval): static {
        $this->toneInterval = $toneInterval;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
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
