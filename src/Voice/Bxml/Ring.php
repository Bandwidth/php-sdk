<?php
/**
 * Ring.php
 *
 * Implementation of the BXML Ring verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Ring extends Verb {
    /**
     * @var bool
     */
    private $answerCall;
    /**
     * @var float
     */
    private $duration;

    /**
     * Sets the duration attribute for Ring
     *
     * @param float $duration The duration in seconds for the ring
     */
    public function duration(float $duration): static {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Sets the answerCall attribute for Ring
     *
     * @param boolean $answerCall Determines whether or not to answer the call when Ring is executed on an unanswered incoming call
     */
    public function answerCall(bool $answerCall): static {
        $this->answerCall = $answerCall;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Ring");

        if(isset($this->duration)) {
            $element->setAttribute("duration", $this->duration);
        }

        if(isset($this->answerCall)) {
            if ($this->answerCall) {
                $element->setattribute("answerCall", "true");
            } else {
                $element->setattribute("answerCall", "false");
            }
        }

        return $element;
    }
}
