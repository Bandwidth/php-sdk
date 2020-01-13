<?php
/**
 * ResumeRecording.php
 *
 * Implementation of the BXML ResumeRecording verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class ResumeRecording extends Verb {

    public function toBxml($doc) {
        $element = $doc->createElement("ResumeRecording");
        return $element;
    }
}
