<?php
/**
 * StopRecording.php
 *
 * Implementation of the BXML StopRecording verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class StopRecording extends Verb {

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("StopRecording");
        return $element;
    }
}
