<?php
/**
 * Ring.php
 *
 * Implementation of the BXML Ring verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class Ring extends Verb {

    /**
     * Sets the duration attribute for Ring
     *
     * @param float $duration The duration in seconds for the ring
     */
    public function duration($duration) {
        $this->duration = $duration;
    }

    /**
     * Sets the answerCall attribute for Ring
     *
     * @param boolean $answerCall Determines whether or not to answer the call when Ring is executed on an unanswered incoming call
     */
    public function answerCall($answerCall) {
        $this->answerCall = $answerCall;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("Ring");

        if(isset($this->duration)) {
            $element->setAttribute("duration", $this->duration);
        }

        if(isset($this->answerCall)) {
            $element->setAttribute("answerCall", $this->answerCall);
        }

        return $element;
    }
}
