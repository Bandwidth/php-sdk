<?php
/**
 * Hangup.php
 *
 * Implementation of the BXML Hangup verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class Hangup extends Verb {

    public function toBxml($doc) {
        $element = $doc->createElement("Hangup");
        return $element;
    }
}
