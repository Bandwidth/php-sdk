<?php
/**
 * Forward.php
 *
 * Implementation of the BXML Forward verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class Forward extends Verb {
    /**
     * @var string
     */
    private $diversionReason;
    /**
     * @var string
     */
    private $diversionTreatment;
    /**
     * @var string
     */
    private $callTimeout;
    /**
     * @var string
     */
    private $from;
    /**
     * @var string
     */
    private $to;

    /**
     * Sets the to attribute for Forward
     *
     * @param string $to The phone number to receive the phone call 
     */
    public function to(string $to) {
        $this->to = $to;
    }

    /**
     * Sets the from attribute for Forward
     *
     * @param string $from The phone number to make the phone call
     */
    public function from(string $from) {
        $this->from = $from;
    }

    /**
     * Sets the callTimeout attribute for Forward
     *
     * @param string $callTimeout The timeout in seconds for the phone call 
     */
    public function callTimeout(string $callTimeout) {
        $this->callTimeout = $callTimeout;
    }

    /**
     * Sets the diversionTreatment attribute for Forward
     *
     * @param string $diversionTreatment The diversion treatment for the phone call 
     */
    public function diversionTreatment(string $diversionTreatment) {
        $this->diversionTreatment = $diversionTreatment;
    }

    /**
     * Sets the diversionReason attribute for Forward
     *
     * @param string $diversionReason The diversion treatment for the phone call 
     */
    public function diversionReason(string $diversionReason) {
        $this->diversionReason = $diversionReason;
    }

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("Forward");

        if(isset($this->to)) {
            $element->setAttribute("to", $this->to);
        }

        if(isset($this->from)) {
            $element->setAttribute("from", $this->from);
        }

        if(isset($this->callTimeout)) {
            $element->setAttribute("callTimeout", $this->callTimeout);
        }

        if(isset($this->diversionTreatment)) {
            $element->setAttribute("diversionTreatment", $this->diversionTreatment);
        }

        if(isset($this->diversionReason)) {
            $element->setAttribute("diversionReason", $this->diversionReason);
        }

        return $element;
    }
}
