<?php
/**
 * Forward.php
 *
 * Implementation of the BXML Forward verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class Forward extends Verb {

    /**
     * Sets the to attribute for Forward
     *
     * @param string $to The phone number to receive the phone call 
     */
    public function to($to) {
        $this->to = $to;
    }

    /**
     * Sets the from attribute for Forward
     *
     * @param string $from The phone number to make the phone call
     */
    public function from($from) {
        $this->from = $from;
    }

    /**
     * Sets the callTimeout attribute for Forward
     *
     * @param string $callTimeout The timeout in seconds for the phone call 
     */
    public function callTimeout($callTimeout) {
        $this->callTimeout = $callTimeout;
    }

    /**
     * Sets the diversionTreatment attribute for Forward
     *
     * @param string $diversionTreatment The diversion treatment for the phone call 
     */
    public function diversionTreatment($diversionTreatment) {
        $this->diversionTreatment = $diversionTreatment;
    }

    /**
     * Sets the diversionReason attribute for Forward
     *
     * @param string $diversionReason The diversion treatment for the phone call 
     */
    public function diversionReason($diversionReason) {
        $this->diversionReason = $diversionReason;
    }

    public function toBxml($doc) {
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
