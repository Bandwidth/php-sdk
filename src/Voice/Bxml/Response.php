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
     * @var array
     */
    private $verbs;

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
    public function addVerb(Verb $verb) {
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
