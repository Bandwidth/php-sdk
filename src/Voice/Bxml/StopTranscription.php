<?php
/**
 * StopTranscription php
 *
 * Implementation of the BXML StopTranscription verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class StopTranscription extends Verb {
    /**
     * @var string
     */
    private $name;

    /**
     * Sets the name attribute for StopTranscription
     *
     * @param string $name (required) The name of the real-time transcription to stop. This is either the user selected name when sending the [`<StartTranscription>`][1] verb, or the system generated name returned in the [Media Transcription Started][2] webhook if `<StartTranscription>` was sent with no `name` attribute.
     */
    public function name(string $name) {
        $this->name = $name;
    }

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("StopTranscription");

        if(isset($this->name)) {
            $element->setAttribute("name", $this->name);
        }

        return $element;
    }
}
