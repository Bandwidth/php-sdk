<?php
/**
 * Bxml.php
 *
 * Class that represents the BXML response. Is built by adding verbs to it
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

class Bxml {

    /**
     * Creates the Bxml class with an empty list of verbs
     */
    public function __construct() {
        $this->verbs = array();
    }
    
    /**
     * Adds the verb to the verbs
     *
     * @param Verb $verb The verb to add to the list
     */
    public function addVerb($verb) {
        array_push($this->verbs, $verb);
    }

    /**
     * Converts the Response class into its BXML representation
     *
     * @return string The xml representation of the class
     */
    public function toBxml() {
        $ssmlRegex = '/&lt;([a-zA-Z\/\/].*?)&gt;/';
        $doc = new DOMDocument('1.0', 'UTF-8');
        $bxmlElement = $doc->createElement("Bxml");

        foreach ($this->verbs as $verb) {
            $bxmlElement->appendChild($verb->toBxml($doc));
        }

        $doc->appendChild($bxmlElement);
        return str_replace("\n", '', preg_replace($ssmlRegex, "<$1>", $doc->saveXML()));
    }
}
