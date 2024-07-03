<?php
/**
 * StopGather.php
 *
 * Implementation of the BXML StopGather verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class StopGather extends Verb {

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("StopGather");
        return $element;
    }
}
