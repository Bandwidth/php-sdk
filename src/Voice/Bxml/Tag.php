<?php
/**
 * Tag.php
 *
 * Implementation of the BXML Tag verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Tag extends Verb {
    /**
     * @var string
     */
    private $tag;

    /**
     * Constructor for Tag
     *
     * @param string $tag The value to set the call tag to
     */
    public function __construct(string $tag) {
        $this->tag = $tag;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Tag");

        $element->appendChild($doc->createTextNode($this->tag));

        return $element;
    }
}
