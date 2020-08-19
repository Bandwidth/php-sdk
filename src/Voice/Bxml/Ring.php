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

    public function toBxml($doc) {
        $element = $doc->createElement("Ring");

        if(isset($this->duration)) {
            $element->setAttribute("duration", $this->duration);
        }

        return $element;
    }
}
