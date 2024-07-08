<?php
/**
 * Gather.php
 *
 * Implementation of the BXML Gather tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";
require_once "SpeakSentence.php";
require_once "PlayAudio.php";

class Gather extends Verb {
    /**
     * @var string
     */
    private $fallbackPassword;
    /**
     * @var string
     */
    private $fallbackUsername;
    /**
     * @var string
     */
    private $gatherFallbackMethod;
    /**
     * @var string
     */
    private $gatherFallbackUrl;
    /**
     * @var SpeakSentence
     */
    private $speakSentence;
    /**
     * @var int
     */
    private $repeatCount;
    /**
     * @var PlayAudio
     */
    private $playAudio;
    /**
     * @var int
     */
    private $firstDigitTimeout;
    /**
     * @var int
     */
    private $interDigitTimeout;
    /**
     * @var int
     */
    private $maxDigits;
    /**
     * @var string
     */
    private $terminatingDigits;
    /**
     * @var string
     */
    private $tag;
    /**
     * @var string
     */
    private $gatherMethod;
    /**
     * @var string
     */
    private $gatherUrl;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $username;
    /**
     * @var array(Verb)
     */
    private $nestableVerbs;

    /**
     * Sets the username attribute for Gather
     *
     * @param string $username The username for http authentication for the gather callback
     */
    public function username(string $username): Gather {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for Gather
     *
     * @param string $password The password for http authentication for the gather callback
     */
    public function password(string $password): Gather {
        $this->password = $password;
        return $this;
    }

    /**
     * Sets the gatherUrl attribute for Gather
     *
     * @param string $gatherUrl The url to receive the gather callback 
     */
    public function gatherUrl(string $gatherUrl): Gather {
        $this->gatherUrl = $gatherUrl;
        return $this;
    }

    /**
     * Sets the gatherMethod attribute for Gather
     *
     * @param string $gatherMethod The http method to send the gather callback 
     */
    public function gatherMethod(string $gatherMethod): Gather {
        $this->gatherMethod = $gatherMethod;
        return $this;
    }

    /**
     * Sets the tag attribute for Gather
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag(string $tag): Gather {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the terminatingDigits attribute for Gather
     *
     * @param string $terminatingDigits Digits to terminate the gather
     */
    public function terminatingDigits(string $terminatingDigits): Gather {
        $this->terminatingDigits = $terminatingDigits;
        return $this;
    }

    /**
     * Sets the maxDigits attribute for Gather
     *
     * @param int $maxDigits The maximum number of digits to collect in the gather
     */
    public function maxDigits(int $maxDigits): Gather {
        $this->maxDigits = $maxDigits;
        return $this;
    }

    /**
     * Sets the interDigitTimeout attribute for Gather
     *
     * @param int $interDigitTimeout The time in secods between digit presses before timing out
     */
    public function interDigitTimeout(int $interDigitTimeout): Gather {
        $this->interDigitTimeout = $interDigitTimeout;
        return $this;
    }

    /**
     * Sets the firstDigitTimeout attribute for Gather
     *
     * @param int $firstDigitTimeout The time in seconds before the first digit is pressed before timing out
     */
    public function firstDigitTimeout(int $firstDigitTimeout): Gather {
        $this->firstDigitTimeout = $firstDigitTimeout;
        return $this;
    }

    /**
     * Sets the PlayAudio tag for Gather
     *
     * @param PlayAudio $playAudio The PlayAudio tag to include in the Gather
     */
    public function playAudio(PlayAudio $playAudio): Gather {
        $this->playAudio = $playAudio;
        return $this->addNestableVerb($playAudio);
    }

    /**
     * Sets the repeatCount attribute for the Gather
     *
     * @param int $repeatCount The number of times to repeat the played audio
     */
    public function repeatCount(int $repeatCount): Gather {
        $this->repeatCount = $repeatCount;
        return $this;
    }

    /**
     * Sets the SpeakSentence tag for Gather.
     *
     * @param SpeakSentence $speakSentence The SpeakSentence tag to include in the Gather
     */
    public function speakSentence(SpeakSentence $speakSentence): Gather {
        $this->speakSentence = $speakSentence;
        return $this->addNestableVerb($speakSentence);
    }

    /**
     * Sets the gatherFallbackUrl attribute for Gather
     *
     * @param string $gatherFallbackUrl Fallback url for gather events
     */
    public function gatherFallbackUrl(string $gatherFallbackUrl): Gather {
        $this->gatherFallbackUrl = $gatherFallbackUrl;
        return $this;
    }

    /**
     * Sets the gatherFallbackMethod attribute for Gather
     *
     * @param string $gatherFallbackMethod HTTP method for fallback events
     */
    public function gatherFallbackMethod(string $gatherFallbackMethod): Gather {
        $this->gatherFallbackMethod = $gatherFallbackMethod;
        return $this;
    }

    /**
     * Sets the fallbackUsername attribute for Gather
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events
     */
    public function fallbackUsername(string $fallbackUsername): Gather {
        $this->fallbackUsername = $fallbackUsername;
        return $this;
    }

    /**
     * Sets the fallbackPassword attribute for Gather
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events
     */
    public function fallbackPassword(string $fallbackPassword): Gather {
        $this->fallbackPassword = $fallbackPassword;
        return $this;
    }

    /**
     * Adds a nestable verb being one of SpeakSentence or PlayAudio.
     *
     * @param SpeakSentence|PlayAudio $verb The nestable verb to add
     */
    private function addNestableVerb($verb): Gather {
        if(!isset($this->nestableVerbs)) {
            $this->nestableVerbs = [];
        }
        array_push($this->nestableVerbs, $verb);
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
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
