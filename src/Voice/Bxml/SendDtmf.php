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

    public function toBxml($doc) {
        $element = $doc->createElement("SendDtmf", $this->digits);
        return $element;
    }
}
