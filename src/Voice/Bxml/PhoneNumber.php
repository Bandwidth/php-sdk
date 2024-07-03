<?php
/**
 * PhoneNumber.php
 *
 * Implementation of the BXML PhoneNumber tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class PhoneNumber extends Verb {
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
    private $transferAnswerFallbackMethod;
    /**
     * @var string
     */
    private $transferAnswerFallbackUrl;
    /**
     * @var string
     */
    private $tag;
    /**
     * @var string
     */
    private $transferDisconnectMethod;
    /**
     * @var string
     */
    private $transferDisconnectUrl;
    /**
     * @var string
     */
    private $transferAnswerMethod;
    /**
     * @var string
     */
    private $transferAnswerUrl;
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
    private $phoneNumber;

    /**
     * Constructor for PhoneNumber
     *
     * @param string $phoneNumber The phone number for the tag
     */
    public function __construct(string $phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Sets the username attribute for PhoneNumber
     *
     * @param string $username The username for http authentication on the audio url
     */
    public function username(string $username): PhoneNumber {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for PhoneNumber
     *
     * @param string $password The password for http authentication on the audio url
     */
    public function password(string $password): PhoneNumber {
        $this->password = $password;
        return $this;
    }

    /**
     * Sets the transferAnswerUrl attribute for PhoneNumber
     *
     * @param string $transferAnswerUrl The url to receive the transfer answered callback 
     */
    public function transferAnswerUrl(string $transferAnswerUrl): PhoneNumber {
        $this->transferAnswerUrl = $transferAnswerUrl;
        return $this;
    }

    /**
     * Sets the transferAnswerMethod attribute for PhoneNumber
     *
     * @param string $transferAnswerMethod The http method to send the transfer answered callback 
     */
    public function transferAnswerMethod(string $transferAnswerMethod): PhoneNumber {
        $this->transferAnswerMethod = $transferAnswerMethod;
        return $this;
    }

    /**
     * Sets the transferDisconnectUrl attribute for PhoneNumber
     *
     * @param string $transferDisconnectUrl The url to receive the transfer disconnect callback 
     */
    public function transferDisconnectUrl(string $transferDisconnectUrl): PhoneNumber {
        $this->transferDisconnectUrl = $transferDisconnectUrl;
        return $this;
    }

    /**
     * Sets the transferDisconnectMethod attribute for PhoneNumber
     *
     * @param string $transferDisconnectMethod The http method to send the transfer disconnect callback 
     */
    public function transferDisconnectMethod(string $transferDisconnectMethod): PhoneNumber {
        $this->transferDisconnectMethod = $transferDisconnectMethod;
        return $this;
    }

    /**
     * Sets the tag attribute for PhoneNumber
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag(string $tag): PhoneNumber {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the transferAnswerFallbackUrl attribute for PhoneNumber
     *
     * @param string $transferAnswerFallbackUrl Fallback URL for transfer answer events 
     */
    public function transferAnswerFallbackUrl(string $transferAnswerFallbackUrl): PhoneNumber {
        $this->transferAnswerFallbackUrl = $transferAnswerFallbackUrl;
        return $this;
    }

    /**
     * Sets the transferAnswerFallbackMethod attribute for PhoneNumber
     *
     * @param string $transferAnswerFallbackMethod HTTP method for fallback events 
     */
    public function transferAnswerFallbackMethod(string $transferAnswerFallbackMethod): PhoneNumber {
        $this->transferAnswerFallbackMethod = $transferAnswerFallbackMethod;
        return $this;
    }

    /**
     * Sets the fallbackUsername attribute for PhoneNumber
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events 
     */
    public function fallbackUsername(string $fallbackUsername): PhoneNumber {
        $this->fallbackUsername = $fallbackUsername;
        return $this;
    }

    /**
     * Sets the fallbackPassword attribute for PhoneNumber
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events
     */
    public function fallbackPassword(string $fallbackPassword): PhoneNumber {
        $this->fallbackPassword = $fallbackPassword;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("PhoneNumber");

        $element->appendChild($doc->createTextNode($this->phoneNumber));

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
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
