<?php
/**
 * StopStreamphp
 *
 * Implementation of the BXML StopStream verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class StopStream extends Verb {

    /**
     * Sets the name attribute for StopStream
     *
     * @param float $name (required) The name of the stream to stop. This is either the user selected name when sending the [`<StartStream>`][1] verb, or the system generated name returned in the [Media Stream Started][2] webhook if `<StartStream>` was sent with no `name` attribute.
     */
    public function name($name) {
        $this->name = $name;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("StopStream");

        if(isset($this->name)) {
            $element->setAttribute("name", $this->name);
        }

        return $element;
    }
}
