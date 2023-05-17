<?php
/**
 * Pause.php
 *
 * Implementation of the BXML Pause verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class Pause extends Verb {
    /**
     * @var float
     */
    private $duration;

    /**
     * Sets the duration attribute for Pause
     *
     * @param float $duration The duration in seconds for the pause 
     */
    public function duration(float $duration) {
        $this->duration = $duration;
    }

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("Pause");

        if(isset($this->duration)) {
            $element->setAttribute("duration", $this->duration);
        }

        return $element;
    }
}
