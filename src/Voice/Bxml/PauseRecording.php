<?php
/**
 * PauseRecording.php
 *
 * Implementation of the BXML PauseRecording verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class PauseRecording extends Verb {

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("PauseRecording");
        return $element;
    }
}
