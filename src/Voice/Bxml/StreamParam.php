<?php
/**
 * StreamParam.php
 *
 * Implementation of the BXML StreamParam tag. You may specify up to 12 <StreamParam/> elements nested within a <StartStream> tag. These elements define optional user specified parameters that will be sent to the destination URL when the stream is first started.
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class StreamParam extends Verb {

    /**
     * Sets the name attribute for StreamParam
     *
     * @param string $name (required) The name of this parameter, up to 256 characters.
     */
    public function name($name) {
        $this->name = $name;
    }

    /**
     * Sets the value attribute for StreamParam
     *
     * @param string $value (required) The value of this parameter, up to 2048 characters.
     */
    public function value($value) {
        $this->value = $value;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("StreamParam");

        if(isset($this->name)) {
            $element->setAttribute("name", $this->name);
        }

        if(isset($this->value)) {
            $element->setAttribute("value", $this->value);
        }

        return $element;
    }
}
