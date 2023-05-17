<?php
/**
 * Verb.php
 *
 * Abstract class representing BXML verbs
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

abstract class Verb {

    /**
     * Converts the verb class into a DOMElement to build the complete BXML
     *
//     * @param DOMDocument $doc The document that is building the BXML
//     * @return DOMElement The element representing the verb
     */
    abstract protected function toBxml(DOMDocument $doc);

}
