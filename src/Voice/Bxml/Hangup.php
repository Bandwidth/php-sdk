<?php
/**
 * Hangup.php
 *
 * Implementation of the BXML Hangup verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Hangup extends Verb {

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Hangup");
        return $element;
    }
}
