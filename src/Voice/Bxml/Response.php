<?php
/**
 * Response.php
 *
 * Class that represents the BXML response. Is built by adding verbs to it
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

class Response {

    /**
     * Creates the Response class with an emty list of verbs
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
        foreach($verb as $key => $value) {  // encodes any verb attributes of type string to avoid php character encoding bug
            if(gettype($value) == "string") {
                $verb->$key = htmlspecialchars($value, ENT_XML1, 'UTF-8');
            }
        }
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
        $responseElement = $doc->createElement("Response");

        foreach ($this->verbs as $verb) {
            $responseElement->appendChild($verb->toBxml($doc));
        }

        $doc->appendChild($responseElement);
        return str_replace("\n", '', preg_replace($ssmlRegex, "<$1>", $doc->saveXML()));
    }
}
