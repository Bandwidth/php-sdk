<?php
/**
 * Refer.php
 *
 * Implementation of the BXML Refer tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Refer extends Verb {
    /**
     * @var string
     */
    private $referCompleteUrl;
    /**
     * @var string
     */
    private $referCompleteMethod;
    /**
     * @var string
     */
    private $tag;
    /**
     * @var SipUri
     */
    private $sipUri;

    /**
     * Sets the referCompleteUrl attribute for Refer
     *
     * @param string $referCompleteUrl The URL to receive the refer complete callback
     */
    public function referCompleteUrl(string $referCompleteUrl): Refer {
        $this->referCompleteUrl = $referCompleteUrl;
        return $this;
    }

    /**
     * Sets the referCompleteMethod attribute for Refer
     *
     * @param string $referCompleteMethod The HTTP method for the refer complete callback (GET or POST)
     */
    public function referCompleteMethod(string $referCompleteMethod): Refer {
        $this->referCompleteMethod = $referCompleteMethod;
        return $this;
    }

    /**
     * Sets the tag attribute for Refer
     *
     * @param string $tag A custom string to be included in callbacks
     */
    public function tag(string $tag): Refer {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the SipUri child element for Refer
     *
     * @param SipUri $sipUri The SipUri destination for the REFER
     */
    public function sipUri(SipUri $sipUri): Refer {
        $this->sipUri = $sipUri;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Refer");

        if(isset($this->referCompleteUrl)) {
            $element->setAttribute("referCompleteUrl", $this->referCompleteUrl);
        }

        if(isset($this->referCompleteMethod)) {
            $element->setAttribute("referCompleteMethod", $this->referCompleteMethod);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
        }

        if(isset($this->sipUri)) {
            $element->appendChild($this->sipUri->toBxml($doc));
        }

        return $element;
    }
}

