<?php
/**
 * Endpoint.php
 *
 * Implementation of the BXML Endpoint verb for BRTC endpoints
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Endpoint extends Verb {
    /**
     * @var string
     */
    private $endpointId;

    /**
     * @param string $endpointId The endpointId to connect to
     */
    public function __construct(string $endpointId) {
        $this->endpointId = $endpointId;
    }

    /**
     * Converts the Endpoint verb into a DOMElement
     *
     * @param DOMDocument $doc
     * @return DOMElement
     */
    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Endpoint");
        $element->appendChild($doc->createTextNode($this->endpointId));
        return $element;
    }
}
