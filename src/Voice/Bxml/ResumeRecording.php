<?php
/**
 * ResumeRecording.php
 *
 * Implementation of the BXML ResumeRecording verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class ResumeRecording extends Verb {

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("ResumeRecording");
        return $element;
    }
}
