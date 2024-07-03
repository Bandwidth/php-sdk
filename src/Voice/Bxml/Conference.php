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
use DOMElement;

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
    public function tag(string $tag): Conference {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the username attribute for Conference
     *
     * @param string $username Username for basic auth for callbacks
     */
    public function username(string $username): Conference {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for Conference
     *
     * @param string $password Password for basic auth for callbacks
     */
    public function password(string $password): Conference {
        $this->password = $password;
        return $this;
    }

    /**
     * Sets the conferenceEventUrl attribute for Conference
     *
     * @param string $conferenceEventUrl URL to receive conference events 
     */
    public function conferenceEventUrl(string $conferenceEventUrl): Conference {
        $this->conferenceEventUrl = $conferenceEventUrl;
        return $this;
    }

    /**
     * Sets the conferenceEventMethod attribute for Conference
     *
     * @param string $conferenceEventMethod HTTP method for conference events 
     */
    public function conferenceEventMethod(string $conferenceEventMethod): Conference {
        $this->conferenceEventMethod = $conferenceEventMethod;
        return $this;
    }

    /**
     * Sets the callIdsToCoach attribute for Conference
     *
     * @param string $callIdsToCoach A string of comma separated call IDs to coach 
     */
    public function callIdsToCoach(string $callIdsToCoach): Conference {
        $this->callIdsToCoach = $callIdsToCoach;
        return $this;
    }

    /**
     * Sets the callIdsToCoach attribute for Conference
     *
     * @param array $callIdsToCoach An array of call IDs to coach 
     */
    public function callIdsToCoachArray(array $callIdsToCoach): Conference {
        $this->callIdsToCoach = implode(",", $callIdsToCoach);
        return $this;
    }

    /**
     * Sets the mute attribute for Conference
     *
     * @param boolean $mute Determines if conference members should be on mute
     */
    public function mute(bool $mute): Conference {
        $this->mute = $mute;
        return $this;
    }

    /**
     * Sets the hold attribute for Conference
     *
     * @param boolean $hold Determines if conference members should be on hold
     */
    public function hold(bool $hold): Conference {
        $this->hold = $hold;
        return $this;
    }

    /**
     * Sets the conferenceEventFallbackUrl attribute for Conference
     *
     * @param string $conferenceEventFallbackUrl Fallback url for conference events
     */
    public function conferenceEventFallbackUrl(string $conferenceEventFallbackUrl): Conference {
        $this->conferenceEventFallbackUrl = $conferenceEventFallbackUrl;
        return $this;
    }

    /**
     * Sets the conferenceEventFallbackMethod attribute for Conference
     *
     * @param string $conferenceEventFallbackMethod HTTP method for fallback events 
     */
    public function conferenceEventFallbackMethod(string $conferenceEventFallbackMethod): Conference {
        $this->conferenceEventFallbackMethod = $conferenceEventFallbackMethod;
        return $this;
    }

    /**
     * Sets the fallbackUsername attribute for Conference
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events
     */
    public function fallbackUsername(string $fallbackUsername): Conference {
        $this->fallbackUsername = $fallbackUsername;
        return $this;
    }

    /**
     * Sets the fallbackPassword attribute for Conference
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events
     */
    public function fallbackPassword(string $fallbackPassword): Conference {
        $this->fallbackPassword = $fallbackPassword;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
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
