<?php
/**
 * Conference.php
 *
 * Implementation of the BXML Conference verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class Conference extends Verb {
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
    private $conferenceEventFallbackMethod;
    /**
     * @var string
     */
    private $conferenceEventFallbackUrl;
    /**
     * @var bool
     */
    private $hold;
    /**
     * @var bool
     */
    private $mute;
    /**
     * @var string
     */
    private $callIdsToCoach;
    /**
     * @var string
     */
    private $conferenceEventMethod;
    /**
     * @var string
     */
    private $conferenceEventUrl;
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
    private $tag;
    /**
     * @var string
     */
    private $conferenceName;

    /**
     * Constructor for Conference
     *
     * @param string $conferenceName The name of the conference 
     */
    public function __construct(string $conferenceName) {
        $this->conferenceName = $conferenceName;
    }

    /**
     * Sets the tag attribute for Conference
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag(string $tag) {
        $this->tag = $tag;
    }

    /**
     * Sets the username attribute for Conference
     *
     * @param string $username Username for basic auth for callbacks
     */
    public function username(string $username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for Conference
     *
     * @param string $password Password for basic auth for callbacks
     */
    public function password(string $password) {
        $this->password = $password;
    }

    /**
     * Sets the conferenceEventUrl attribute for Conference
     *
     * @param string $conferenceEventUrl URL to receive conference events 
     */
    public function conferenceEventUrl(string $conferenceEventUrl) {
        $this->conferenceEventUrl = $conferenceEventUrl;
    }

    /**
     * Sets the conferenceEventMethod attribute for Conference
     *
     * @param string $conferenceEventMethod HTTP method for conference events 
     */
    public function conferenceEventMethod(string $conferenceEventMethod) {
        $this->conferenceEventMethod = $conferenceEventMethod;
    }

    /**
     * Sets the callIdsToCoach attribute for Conference
     *
     * @param string $callIdsToCoach A string of comma separated call IDs to coach 
     */
    public function callIdsToCoach(string $callIdsToCoach) {
        $this->callIdsToCoach = $callIdsToCoach;
    }

    /**
     * Sets the callIdsToCoach attribute for Conference
     *
     * @param array $callIdsToCoach An array of call IDs to coach 
     */
    public function callIdsToCoachArray(array $callIdsToCoach) {
        $this->callIdsToCoach = implode(",", $callIdsToCoach);
    }

    /**
     * Sets the mute attribute for Conference
     *
     * @param boolean $mute Determines if conference members should be on mute
     */
    public function mute(bool $mute) {
        $this->mute = $mute;
    }

    /**
     * Sets the hold attribute for Conference
     *
     * @param boolean $hold Determines if conference members should be on hold
     */
    public function hold(bool $hold) {
        $this->hold = $hold;
    }

    /**
     * Sets the conferenceEventFallbackUrl attribute for Conference
     *
     * @param string $conferenceEventFallbackUrl Fallback url for conference events
     */
    public function conferenceEventFallbackUrl(string $conferenceEventFallbackUrl) {
        $this->conferenceEventFallbackUrl = $conferenceEventFallbackUrl;
    }

    /**
     * Sets the conferenceEventFallbackMethod attribute for Conference
     *
     * @param string $conferenceEventFallbackMethod HTTP method for fallback events 
     */
    public function conferenceEventFallbackMethod(string $conferenceEventFallbackMethod) {
        $this->conferenceEventFallbackMethod = $conferenceEventFallbackMethod;
    }

    /**
     * Sets the fallbackUsername attribute for Conference
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events
     */
    public function fallbackUsername(string $fallbackUsername) {
        $this->fallbackUsername = $fallbackUsername;
    }

    /**
     * Sets the fallbackPassword attribute for Conference
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events
     */
    public function fallbackPassword(string $fallbackPassword) {
        $this->fallbackPassword = $fallbackPassword;
    }

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("Conference");

        $element->appendChild($doc->createTextNode($this->conferenceName));

        if(isset($this->username)) {
            $element->setattribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setattribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setattribute("tag", $this->tag);
        }

        if(isset($this->mute)) {
            if ($this->mute) {
                $element->setattribute("mute", "true");
            } else {
                $element->setattribute("mute", "false");
            }
        }

        if(isset($this->hold)) {
            if ($this->hold) {
                $element->setattribute("hold", "true");
            } else {
                $element->setattribute("hold", "false");
            }
        }

        if(isset($this->callIdsToCoach)) {
            $element->setattribute("callIdsToCoach", $this->callIdsToCoach);
        }

        if(isset($this->conferenceEventUrl)) {
            $element->setattribute("conferenceEventUrl", $this->conferenceEventUrl);
        }

        if(isset($this->conferenceEventMethod)) {
            $element->setattribute("conferenceEventMethod", $this->conferenceEventMethod);
        }

        if(isset($this->conferenceEventFallbackUrl)) {
            $element->setattribute("conferenceEventFallbackUrl", $this->conferenceEventFallbackUrl);
        }

        if(isset($this->conferenceEventFallbackMethod)) {
            $element->setattribute("conferenceEventFallbackMethod", $this->conferenceEventFallbackMethod);
        }

        if(isset($this->fallbackUsername)) {
            $element->setattribute("fallbackUsername", $this->fallbackUsername);
        }

        if(isset($this->fallbackPassword)) {
            $element->setattribute("fallbackPassword", $this->fallbackPassword);
        }

        return $element;
    }
}
