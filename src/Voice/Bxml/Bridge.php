<?php
/**
 * Bridge.php
 *
 * Implementation of the BXML Bridge verb
 *
 *  * @copyright Bandwidth INC
 */
  
namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class Bridge extends Verb {

    /**
     * Constructor for Bridge
     *
     * @param string $targetCall The target call ID of the bridge
     */
    public function __construct($targetCall) {
        $this->targetCall = $targetCall;
    }

    /**
     * Sets the bridgeCompleteUrl attribute for Bridge
     *
     * @param string $bridgeCompleteUrl URL to send the bridge complete event to
     */
    public function bridgeCompleteUrl($bridgeCompleteUrl) {
        $this->bridgeCompleteUrl = $bridgeCompleteUrl;
    }

    /**
     * Sets the bridgeCompleteMethod attribute for Bridge
     *
     * @param string $bridgeCompleteMethod HTTP method to send the bridge complete event
     */
    public function bridgeCompleteMethod($bridgeCompleteMethod) {
        $this->bridgeCompleteMethod = $bridgeCompleteMethod;
    }

    /**
     * Sets the bridgeTargetCompleteUrl attribute for Bridge
     *
     * @param string $bridgeTargetCompleteUrl URL to send the bridge target complete event to
     */
    public function bridgeTargetCompleteUrl($bridgeTargetCompleteUrl) {
        $this->bridgeTargetCompleteUrl = $bridgeTargetCompleteUrl;
    }

    /**
     * Sets the bridgeTargetCompleteMethod attribute for Bridge
     *
     * @param string $bridgeTargetCompleteMethod HTTP method to send the bridge target complete event
     */
    public function bridgeTargetCompleteMethod($bridgeTargetCompleteMethod) {
        $this->bridgeTargetCompleteMethod = $bridgeTargetCompleteMethod;
    }

    /**
     * Sets the username attribute for Bridge
     *
     * @param string $username HTTP basic auth username for sending events
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for Bridge
     *
     * @param string $password HTTP basic auth password for sending events
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the tag attribute for Bridge
     *
     * @param string $tag String to include in events
     */
    public function tag($tag) {
        $this->tag = $tag;
    }

    /**
     * Sets the bridgeCompleteFallbackUrl attribute for Bridge
     *
     * @param string $bridgeCompleteFallbackUrl Fallback URL for bridge complete callback events
     */
    public function bridgeCompleteFallbackUrl($bridgeCompleteFallbackUrl) {
        $this->bridgeCompleteFallbackUrl = $bridgeCompleteFallbackUrl;
    }

    /**
     * Sets the bridgeCompleteFallbackMethod attribute for Bridge
     *
     * @param string $bridgeCompleteFallbackMethod HTTP method for bridge complete fallback requests 
     */
    public function bridgeCompleteFallbackMethod($bridgeCompleteFallbackMethod) {
        $this->bridgeCompleteFallbackMethod = $bridgeCompleteFallbackMethod;
    }

    /**
     * Sets the bridgeTargetCompleteFallbackUrl attribute for Bridge
     *
     * @param string $bridgeTargetCompleteFallbackUrl Fallback URL for bridge target complete callback events 
     */
    public function bridgeTargetCompleteFallbackUrl($bridgeTargetCompleteFallbackUrl) {
        $this->bridgeTargetCompleteFallbackUrl = $bridgeTargetCompleteFallbackUrl;
    }

    /**
     * Sets the bridgeTargetCompleteFallbackMethod attribute for Bridge
     *
     * @param string $bridgeTargetCompleteFallbackMethod HTTP method for bridge target complete fallback events 
     */
    public function bridgeTargetCompleteFallbackMethod($bridgeTargetCompleteFallbackMethod) {
        $this->bridgeTargetCompleteFallbackMethod = $bridgeTargetCompleteFallbackMethod;
    }

    /**
     * Sets the fallbackUsername attribute for Bridge
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events
     */
    public function fallbackUsername($fallbackUsername) {
        $this->fallbackUsername = $fallbackUsername;
    }

    /**
     * Sets the fallbackPassword attribute for Bridge
     *
     * @param string $fallbackPassword HTTP basic auth password 
     */
    public function fallbackPassword($fallbackPassword) {
        $this->fallbackPassword = $fallbackPassword;
    }

    public function toBxml($doc) {
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
