<?php
/**
 * Bridge.php
 *
 * Implementation of the BXML Bridge verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Bridge extends Verb {
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
    private $bridgeTargetCompleteFallbackMethod;
    /**
     * @var string
     */
    private $bridgeTargetCompleteFallbackUrl;
    /**
     * @var string
     */
    private $bridgeCompleteFallbackMethod;
    /**
     * @var string
     */
    private $bridgeCompleteFallbackUrl;
    /**
     * @var string
     */
    private $tag;
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
    private $bridgeTargetCompleteMethod;
    /**
     * @var string
     */
    private $bridgeTargetCompleteUrl;
    /**
     * @var string
     */
    private $bridgeCompleteMethod;
    /**
     * @var string
     */
    private $bridgeCompleteUrl;
    /**
     * @var string
     */
    private $targetCall;

    /**
     * Constructor for Bridge
     *
     * @param string $targetCall The target call ID of the bridge
     */
    public function __construct(string $targetCall) {
        $this->targetCall = $targetCall;
    }

    /**
     * Sets the bridgeCompleteUrl attribute for Bridge
     *
     * @param string $bridgeCompleteUrl URL to send the bridge complete event to
     */
    public function bridgeCompleteUrl(string $bridgeCompleteUrl): Bridge {
        $this->bridgeCompleteUrl = $bridgeCompleteUrl;
        return $this;
    }

    /**
     * Sets the bridgeCompleteMethod attribute for Bridge
     *
     * @param string $bridgeCompleteMethod HTTP method to send the bridge complete event
     */
    public function bridgeCompleteMethod(string $bridgeCompleteMethod): Bridge {
        $this->bridgeCompleteMethod = $bridgeCompleteMethod;
        return $this;
    }

    /**
     * Sets the bridgeTargetCompleteUrl attribute for Bridge
     *
     * @param string $bridgeTargetCompleteUrl URL to send the bridge target complete event to
     */
    public function bridgeTargetCompleteUrl(string $bridgeTargetCompleteUrl): Bridge {
        $this->bridgeTargetCompleteUrl = $bridgeTargetCompleteUrl;
        return $this;
    }

    /**
     * Sets the bridgeTargetCompleteMethod attribute for Bridge
     *
     * @param string $bridgeTargetCompleteMethod HTTP method to send the bridge target complete event
     */
    public function bridgeTargetCompleteMethod(string $bridgeTargetCompleteMethod): Bridge {
        $this->bridgeTargetCompleteMethod = $bridgeTargetCompleteMethod;
        return $this;
    }

    /**
     * Sets the username attribute for Bridge
     *
     * @param string $username HTTP basic auth username for sending events
     */
    public function username(string $username): Bridge {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for Bridge
     *
     * @param string $password HTTP basic auth password for sending events
     */
    public function password(string $password): Bridge {
        $this->password = $password;
        return $this;
    }

    /**
     * Sets the tag attribute for Bridge
     *
     * @param string $tag String to include in events
     */
    public function tag(string $tag): Bridge {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the bridgeCompleteFallbackUrl attribute for Bridge
     *
     * @param string $bridgeCompleteFallbackUrl Fallback URL for bridge complete callback events
     */
    public function bridgeCompleteFallbackUrl(string $bridgeCompleteFallbackUrl): Bridge {
        $this->bridgeCompleteFallbackUrl = $bridgeCompleteFallbackUrl;
        return $this;
    }

    /**
     * Sets the bridgeCompleteFallbackMethod attribute for Bridge
     *
     * @param string $bridgeCompleteFallbackMethod HTTP method for bridge complete fallback requests 
     */
    public function bridgeCompleteFallbackMethod(string $bridgeCompleteFallbackMethod): Bridge {
        $this->bridgeCompleteFallbackMethod = $bridgeCompleteFallbackMethod;
        return $this;
    }

    /**
     * Sets the bridgeTargetCompleteFallbackUrl attribute for Bridge
     *
     * @param string $bridgeTargetCompleteFallbackUrl Fallback URL for bridge target complete callback events 
     */
    public function bridgeTargetCompleteFallbackUrl(string $bridgeTargetCompleteFallbackUrl): Bridge {
        $this->bridgeTargetCompleteFallbackUrl = $bridgeTargetCompleteFallbackUrl;
        return $this;
    }

    /**
     * Sets the bridgeTargetCompleteFallbackMethod attribute for Bridge
     *
     * @param string $bridgeTargetCompleteFallbackMethod HTTP method for bridge target complete fallback events 
     */
    public function bridgeTargetCompleteFallbackMethod(string $bridgeTargetCompleteFallbackMethod): Bridge {
        $this->bridgeTargetCompleteFallbackMethod = $bridgeTargetCompleteFallbackMethod;
        return $this;
    }

    /**
     * Sets the fallbackUsername attribute for Bridge
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events
     */
    public function fallbackUsername(string $fallbackUsername): Bridge {
        $this->fallbackUsername = $fallbackUsername;
        return $this;
    }

    /**
     * Sets the fallbackPassword attribute for Bridge
     *
     * @param string $fallbackPassword HTTP basic auth password 
     */
    public function fallbackPassword(string $fallbackPassword): Bridge {
        $this->fallbackPassword = $fallbackPassword;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Bridge");

        $element->appendChild($doc->createTextNode($this->targetCall));

        if(isset($this->bridgeCompleteUrl)) {
            $element->setAttribute("bridgeCompleteUrl", $this->bridgeCompleteUrl);
        }

        if(isset($this->bridgeCompleteMethod)) {
            $element->setAttribute("bridgeCompleteMethod", $this->bridgeCompleteMethod);
        }

        if(isset($this->bridgeTargetCompleteUrl)) {
            $element->setAttribute("bridgeTargetCompleteUrl", $this->bridgeTargetCompleteUrl);
        }

        if(isset($this->bridgeTargetCompleteMethod)) {
            $element->setAttribute("bridgeTargetCompleteMethod", $this->bridgeTargetCompleteMethod);
        }

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
        }

        if(isset($this->bridgeCompleteFallbackUrl)) {
            $element->setAttribute("bridgeCompleteFallbackUrl", $this->bridgeCompleteFallbackUrl);
        }

        if(isset($this->bridgeCompleteFallbackMethod)) {
            $element->setAttribute("bridgeCompleteFallbackMethod", $this->bridgeCompleteFallbackMethod);
        }

        if(isset($this->bridgeTargetCompleteFallbackUrl)) {
            $element->setAttribute("bridgeTargetCompleteFallbackUrl", $this->bridgeTargetCompleteFallbackUrl);
        }

        if(isset($this->bridgeTargetCompleteFallbackMethod)) {
            $element->setAttribute("bridgeTargetCompleteFallbackMethod", $this->bridgeTargetCompleteFallbackMethod);
        }

        if(isset($this->fallbackUsername)) {
            $element->setAttribute("fallbackUsername", $this->fallbackUsername);
        }

        if(isset($this->fallbackPassword)) {
            $element->setAttribute("fallbackPassword", $this->fallbackPassword);
        }

        return $element;
    }
}
