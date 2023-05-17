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

require_once "Verb.php";

class StopGather extends Verb {

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("StopGather");
        return $element;
    }
}
