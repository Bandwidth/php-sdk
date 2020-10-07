<?php
/**
 * StopGather.php
 *
 * Implementation of the BXML StopGather verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class StopGather extends Verb {

    public function toBxml($doc) {
        $element = $doc->createElement("StopGather");
        return $element;
    }
}
