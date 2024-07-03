<?php
/**
 * PlayAudio.php
 *
 * Implementation of the BXML PlayAudio verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class PlayAudio extends Verb {
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $url;

    /**
     * Constructor for PlayAudio
     *
     * @param string $url The URL of the audio to be played
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    /**
     * Sets the username attribute for PlayAudio
     *
     * @param string $username The username for http authentication on the audio url
     */
    public function username(string $username): PlayAudio {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for PlayAudio
     *
     * @param string $password The password for http authentication on the audio url
     */
    public function password(string $password): PlayAudio {
        $this->password = $password;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("PlayAudio");

        $element->appendChild($doc->createTextNode($this->url));

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        return $element;
    }
}
