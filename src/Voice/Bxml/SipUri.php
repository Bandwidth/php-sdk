<?php
/**
 * SipUri.php
 *
 * Implementation of the BXML SipUri tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class SipUri extends Verb {

    /**
     * Constructor for SipUri
     *
     * @param string $phoneNumber The phone number for the tag
     */
    public function __construct($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Sets the username attribute for SipUri
     *
     * @param string $username The username for http authentication on the audio url
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for SipUri
     *
     * @param string $password The password for http authentication on the audio url
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the transferAnswerUrl attribute for SipUri
     *
     * @param string $transferAnswerUrl The url to receive the transfer answered callback 
     */
    public function transferAnswerUrl($transferAnswerUrl) {
        $this->transferAnswerUrl = $transferAnswerUrl;
    }

    /**
     * Sets the transferAnswerMethod attribute for SipUri
     *
     * @param string $transferAnswerMethod The http method to send the transfer answered callback 
     */
    public function transferAnswerMethod($transferAnswerMethod) {
        $this->transferAnswerMethod = $transferAnswerMethod;
    }

    /**
     * Sets the transferDisconnectUrl attribute for SipUri
     *
     * @param string $transferDisconnectUrl The url to receive the transfer disconnect callback 
     */
    public function transferDisconnectUrl($transferDisconnectUrl) {
        $this->transferDisconnectUrl = $transferDisconnectUrl;
    }

    /**
     * Sets the transferDisconnectMethod attribute for SipUri
     *
     * @param string $transferDisconnectMethod The http method to send the transfer disconnect callback 
     */
    public function transferDisconnectMethod($transferDisconnectMethod) {
        $this->transferDisconnectMethod = $transferDisconnectMethod;
    }

    /**
     * Sets the tag attribute for SipUri
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag($tag) {
        $this->tag = $tag;
    }

    /**
     * Sets the uui attribute for SipUri
     *
     * @param string $uui The value of the `User-To-User` header to send within the initial `INVITE`
     */
    public function uui($uui) {
        $this->uui = $uui;
    }

    /**
     * Sets the transferAnswerFallbackUrl attribute for SipUri
     *
     * @param string $transferAnswerFallbackUrl Fallback URL for transfer answer events 
     */
    public function transferAnswerFallbackUrl($transferAnswerFallbackUrl) {
        $this->transferAnswerFallbackUrl = $transferAnswerFallbackUrl;
    }

    /**
     * Sets the transferAnswerFallbackMethod attribute for SipUri
     *
     * @param string $transferAnswerFallbackMethod HTTP method for fallback events 
     */
    public function transferAnswerFallbackMethod($transferAnswerFallbackMethod) {
        $this->transferAnswerFallbackMethod = $transferAnswerFallbackMethod;
    }

    /**
     * Sets the fallbackUsername attribute for SipUri
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events 
     */
    public function fallbackUsername($fallbackUsername) {
        $this->fallbackUsername = $fallbackUsername;
    }

    /**
     * Sets the fallbackPassword attribute for SipUri
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events
     */
    public function fallbackPassword($fallbackPassword) {
        $this->fallbackPassword = $fallbackPassword;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("SipUri", $this->phoneNumber);

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
        }
        
        if(isset($this->uui)) {
            $element->setAttribute("uui", $this->uui);
        }

        if(isset($this->transferAnswerUrl)) {
            $element->setAttribute("transferAnswerUrl", $this->transferAnswerUrl);
        }

        if(isset($this->transferAnswerMethod)) {
            $element->setAttribute("transferAnswerMethod", $this->transferAnswerMethod);
        }

        if(isset($this->transferDisconnectUrl)) {
            $element->setAttribute("transferDisconnectUrl", $this->transferDisconnectUrl);
        }

        if(isset($this->transferDisconnectMethod)) {
            $element->setAttribute("transferDisconnectMethod", $this->transferDisconnectMethod);
        }

        if(isset($this->transferAnswerFallbackUrl)) {
            $element->setAttribute("transferAnswerFallbackUrl", $this->transferAnswerFallbackUrl);
        }

        if(isset($this->transferAnswerFallbackMethod)) {
            $element->setAttribute("transferAnswerFallbackMethod", $this->transferAnswerFallbackMethod);
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
