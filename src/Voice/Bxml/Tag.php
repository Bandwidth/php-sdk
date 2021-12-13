<?php
/**
 * Tag.php
 *
 * Implementation of the BXML Tag verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class Tag extends Verb {

    /**
     * Constructor for Tag
     *
     * @param string $tag The value to set the call tag to
     */
    public function __construct($tag) {
        $this->tag = $tag;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("Tag");

        $element->appendChild($doc->createTextNode($this->tag));

        return $element;
    }
}
