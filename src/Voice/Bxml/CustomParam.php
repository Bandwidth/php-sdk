<?php
/**
 * CustomParam.php
 *
 * Implementation of the BXML CustomParam tag. You may specify up to 12 <CustomParam/> elements nested within a <StartTranscription> tag. These elements define optional user specified parameters that will be sent to the destination URL when the real-time transcription is first started.
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class CustomParam extends Verb {
    /**
     * @var string
     */
    private $value;
    /**
     * @var string
     */
    private $name;

    /**
     * Sets the name attribute for CustomParam
     *
     * @param string $name (required) The name of this parameter, up to 256 characters.
     */
    public function name(string $name) {
        $this->name = $name;
    }

    /**
     * Sets the value attribute for CustomParam
     *
     * @param string $value (required) The value of this parameter, up to 2048 characters.
     */
    public function value(string $value) {
        $this->value = $value;
    }

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("CustomParam");

        if(isset($this->name)) {
            $element->setAttribute("name", $this->name);
        }

        if(isset($this->value)) {
            $element->setAttribute("value", $this->value);
        }

        return $element;
    }
}
