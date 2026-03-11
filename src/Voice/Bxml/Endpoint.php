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
    private $id;

    /**
     * @param string $id The endpointId to connect to
     */
    public function __construct(string $id) {
        $this->id = $id;
    }

    /**
     * Converts the Endpoint verb into a DOMElement
     *
     * @param DOMDocument $doc
     * @return DOMElement
     */
    protected function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Endpoint");
        $element->setAttribute("id", $this->id);
        return $element;
    }
}
