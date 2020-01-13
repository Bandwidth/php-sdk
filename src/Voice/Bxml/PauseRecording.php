<?php
/**
 * PauseRecording.php
 *
 * Implementation of the BXML PauseRecording verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class PauseRecording extends Verb {

    public function toBxml($doc) {
        $element = $doc->createElement("PauseRecording");
        return $element;
    }
}
