<?php
/**
 * Pause.php
 *
 * Implementation of the BXML Pause verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class Pause extends Verb {

    /**
     * Sets the duration attribute for Pause
     *
     * @param string $duration The duration in seconds for the pause 
     */
    public function duration($duration) {
        $this->duration = $duration;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("Pause");

        if(isset($this->duration)) {
            $element->setAttribute("duration", $this->duration);
        }

        return $element;
    }
}
