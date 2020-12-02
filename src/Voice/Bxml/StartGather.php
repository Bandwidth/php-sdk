<?php
/**
 * StartGather.php
 *
 * Implementation of the BXML StartGather tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";
require_once "SpeakSentence.php";
require_once "PlayAudio.php";

class StartGather extends Verb {

    /**
     * Sets the username attribute for StartGather
     *
     * @param string $username The username for http authentication for the gather callback
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for StartGather
     *
     * @param string $password The password for http authentication for the gather callback
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the dtmfUrl attribute for StartGather
     *
     * @param string $dtmfUrl The url to receive the dtmf callback 
     */
    public function dtmfUrl($dtmfUrl) {
        $this->dtmfUrl = $dtmfUrl;
    }

    /**
     * Sets the dtmfMethod attribute for StartGather
     *
     * @param string $dtmfMethod The http method to send the dtmf callback 
     */
    public function dtmfMethod($dtmfMethod) {
        $this->dtmfMethod = $dtmfMethod;
    }

    /**
     * Sets the tag attribute for StartGather
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag($tag) {
        $this->tag = $tag;
    }

    public function toBxml($doc) {
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
