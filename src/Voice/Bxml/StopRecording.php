<?php
/**
 * StopRecording.php
 *
 * Implementation of the BXML StopRecording verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class StopRecording extends Verb {

    public function toBxml($doc) {
        $element = $doc->createElement("StopRecording");
        return $element;
    }
}
