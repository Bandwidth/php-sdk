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
     * @var array(Endpoint)
     */
    private $endpoints;
    /**
     * @var string
     */
    private $eventCallbackUrl;

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
     * Sets the eventCallbackUrl attribute for Connect
     *
     * @param string $eventCallbackUrl The URL to send event callbacks to
     * @return $this
     */
    public function eventCallbackUrl(string $eventCallbackUrl): Connect {
        $this->eventCallbackUrl = $eventCallbackUrl;
        return $this;
    }

    /**
     * Converts the Connect verb into a DOMElement
     *
     * @param DOMDocument $doc
     * @return DOMElement
     */
    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Connect");

        if(isset($this->eventCallbackUrl)) {
            $element->setAttribute("eventCallbackUrl", $this->eventCallbackUrl);
        }

        if(isset($this->endpoints)) {
            foreach ($this->endpoints as $endpoint) {
                $element->appendChild($endpoint->toBxml($doc));
            }
        }

        return $element;
    }
}
