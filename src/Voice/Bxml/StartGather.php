<?php
/**
 * StartGather.php
 *
 * Implementation of the BXML StartGather tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";
require_once "SpeakSentence.php";
require_once "PlayAudio.php";

class StartGather extends Verb {
    /**
     * @var string
     */
    private $tag;
    /**
     * @var string
     */
    private $dtmfMethod;
    /**
     * @var string
     */
    private $dtmfUrl;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $username;

    /**
     * Sets the username attribute for StartGather
     *
     * @param string $username The username for http authentication for the gather callback
     */
    public function username(string $username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for StartGather
     *
     * @param string $password The password for http authentication for the gather callback
     */
    public function password(string $password) {
        $this->password = $password;
    }

    /**
     * Sets the dtmfUrl attribute for StartGather
     *
     * @param string $dtmfUrl The url to receive the dtmf callback 
     */
    public function dtmfUrl(string $dtmfUrl) {
        $this->dtmfUrl = $dtmfUrl;
    }

    /**
     * Sets the dtmfMethod attribute for StartGather
     *
     * @param string $dtmfMethod The http method to send the dtmf callback 
     */
    public function dtmfMethod(string $dtmfMethod) {
        $this->dtmfMethod = $dtmfMethod;
    }

    /**
     * Sets the tag attribute for StartGather
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag(string $tag) {
        $this->tag = $tag;
    }

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("StartGather");

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
        }

        if(isset($this->dtmfUrl)) {
            $element->setAttribute("dtmfUrl", $this->dtmfUrl);
        }

        if(isset($this->dtmfMethod)) {
            $element->setAttribute("dtmfMethod", $this->dtmfMethod);
        }

        return $element;
    }
}
