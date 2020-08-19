<?php
/**
 * Gather.php
 *
 * Implementation of the BXML Gather tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";
require_once "SpeakSentence.php";
require_once "PlayAudio.php";

class Gather extends Verb {

    /**
     * Sets the username attribute for Gather
     *
     * @param string $username The username for http authentication for the gather callback
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for Gather
     *
     * @param string $password The password for http authentication for the gather callback
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the gatherUrl attribute for Gather
     *
     * @param string $gatherUrl The url to receive the gather callback 
     */
    public function gatherUrl($gatherUrl) {
        $this->gatherUrl = $gatherUrl;
    }

    /**
     * Sets the gatherMethod attribute for Gather
     *
     * @param string $gatherMethod The http method to send the gather callback 
     */
    public function gatherMethod($gatherMethod) {
        $this->gatherMethod = $gatherMethod;
    }

    /**
     * Sets the tag attribute for Gather
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag($tag) {
        $this->tag = $tag;
    }

    /**
     * Sets the terminatingDigits attribute for Gather
     *
     * @param string $terminatingDigits Digits to terminate the gather
     */
    public function terminatingDigits($terminatingDigits) {
        $this->terminatingDigits = $terminatingDigits;
    }

    /**
     * Sets the maxDigits attribute for Gather
     *
     * @param int $maxDigits The maximum number of digits to collect in the gather
     */
    public function maxDigits($maxDigits) {
        $this->maxDigits = $maxDigits;
    }

    /**
     * Sets the interDigitTimeout attribute for Gather
     *
     * @param int $interDigitTimeout The time in secods between digit presses before timing out
     */
    public function interDigitTimeout($interDigitTimeout) {
        $this->interDigitTimeout = $interDigitTimeout;
    }

    /**
     * Sets the firstDigitTimeout attribute for Gather
     *
     * @param int $firstDigitTimeout The time in seconds before the first digit is pressed before timing out
     */
    public function firstDigitTimeout($firstDigitTimeout) {
        $this->firstDigitTimeout = $firstDigitTimeout;
    }

    /**
     * Sets the PlayAudio tag for Gather
     *
     * @param PlayAudio $playAudio The PlayAudio tag to include in the Gather
     */
    public function playAudio($playAudio) {
        $this->playAudio = $playAudio;
        $this->addNestableVerb($playAudio);
    }

    /**
     * Sets the repeatCount attribute for the Gather
     *
     * @param int $repeatCount The number of times to repeat the played audio
     */
    public function repeatCount($repeatCount) {
        $this->repeatCount = $repeatCount;
    }

    /**
     * Sets the SpeakSentence tag for Gather.
     *
     * @param SpeakSentence $speakSentence The SpeakSentence tag to include in the Gather
     */
    public function speakSentence($speakSentence) {
        $this->speakSentence = $speakSentence;
        $this->addNestableVerb($speakSentence);
    }

    /**
     * Sets the gatherFallbackUrl attribute for Gather
     *
     * @param string $gatherFallbackUrl Fallback url for gather events
     */
    public function gatherFallbackUrl($gatherFallbackUrl) {
        $this->gatherFallbackUrl = $gatherFallbackUrl;
    }

    /**
     * Sets the gatherFallbackMethod attribute for Gather
     *
     * @param string $gatherFallbackMethod HTTP method for fallback events
     */
    public function gatherFallbackMethod($gatherFallbackMethod) {
        $this->gatherFallbackMethod = $gatherFallbackMethod;
    }

    /**
     * Sets the fallbackUsername attribute for Gather
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events
     */
    public function fallbackUsername($fallbackUsername) {
        $this->fallbackUsername = $fallbackUsername;
    }

    /**
     * Sets the fallbackPassword attribute for Gather
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events
     */
    public function fallbackPassword($fallbackPassword) {
        $this->fallbackPassword = $fallbackPassword;
    }

    /**
     * Adds a nestable verb being one of SpeakSentence or PlayAudio.
     *
     * @param SpeakSentence|PlayAudio $verb The nestable verb to add
     */
    private function addNestableVerb($verb) {
        if(!isset($this->nestableVerbs)) {
            $this->nestableVerbs = [];
        }
        array_push($this->nestableVerbs, $verb);
    }

    public function toBxml($doc) {
        $element = $doc->createElement("Gather");

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
        }

        if(isset($this->gatherUrl)) {
            $element->setAttribute("gatherUrl", $this->gatherUrl);
        }

        if(isset($this->gatherMethod)) {
            $element->setAttribute("gatherMethod", $this->gatherMethod);
        }

        if(isset($this->terminatingDigits)) {
            $element->setAttribute("terminatingDigits", $this->terminatingDigits);
        }

        if(isset($this->maxDigits)) {
            $element->setAttribute("maxDigits", $this->maxDigits);
        }

        if(isset($this->interDigitTimeout)) {
            $element->setAttribute("interDigitTimeout", $this->interDigitTimeout);
        }

        if(isset($this->firstDigitTimeout)) {
            $element->setAttribute("firstDigitTimeout", $this->firstDigitTimeout);
        }

        if(isset($this->repeatCount)) {
            $element->setAttribute("repeatCount", $this->repeatCount);
        }

        if(isset($this->gatherFallbackUrl)) {
            $element->setAttribute("gatherFallbackUrl", $this->gatherFallbackUrl);
        }

        if(isset($this->gatherFallbackMethod)) {
            $element->setAttribute("gatherFallbackMethod", $this->gatherFallbackMethod);
        }

        if(isset($this->fallbackUsername)) {
            $element->setAttribute("fallbackUsername", $this->fallbackUsername);
        }

        if(isset($this->fallbackPassword)) {
            $element->setAttribute("fallbackPassword", $this->fallbackPassword);
        }

        if(isset($this->nestableVerbs)) {
            foreach ($this->nestableVerbs as $verb) {
                $element->appendChild($verb->toBxml($doc));
            }
        }

        return $element;
    }
}
