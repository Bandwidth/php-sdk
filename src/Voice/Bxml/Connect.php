<?php
/**
 * Connect.php
 *
 * Implementation of the BXML Connect verb for BRTC endpoints
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Connect extends Verb {
    /**
     * @var array
     */
    private $endpoints;

    /**
     * @param array $endpoints Array of Endpoint objects
     */
    public function __construct(array $endpoints = []) {
        $this->endpoints = $endpoints;
    }

    /**
     * Add an Endpoint to the Connect verb
     *
     * @param Endpoint $endpoint
     * @return $this
     */
    public function addEndpoint(Endpoint $endpoint): Connect {
        $this->endpoints[] = $endpoint;
        return $this;
    }

    /**
     * Converts the Connect verb into a DOMElement
     *
     * @param DOMDocument $doc
     * @return DOMElement
     */
    protected function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Connect");
        foreach ($this->endpoints as $endpoint) {
            $element->appendChild($endpoint->toBxml($doc));
        }
        return $element;
    }
}
