<?php
/**
 * ReferSipUri.php
 *
 * Implementation of the BXML SipUri tag for use inside the Refer verb.
 * Unlike the Transfer SipUri, this only accepts a SIP URI — no transfer-specific attributes.
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class ReferSipUri extends Verb {
    /**
     * @var string
     */
    private $sip;

    /**
     * Constructor for ReferSipUri
     *
     * @param string $sip The SIP URI destination (must start with "sip:")
     */
    public function __construct(string $sip) {
        $this->sip = $sip;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("SipUri");
        $element->appendChild($doc->createTextNode($this->sip));
        return $element;
    }
}

