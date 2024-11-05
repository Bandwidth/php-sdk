<?php
/**
 * Transfer.php
 *
 * Implementation of the BXML Transfer tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Transfer extends Verb {
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
    private $transferCompleteFallbackMethod;
    /**
     * @var string
     */
    private $transferCompleteFallbackUrl;
    private $sipUris;
    private $phoneNumbers;
    /**
     * @var string
     */
    private $diversionReason;
    /**
     * @var string
     */
    private $diversionTreatment;
    /**
     * @var string
     */
    private $tag;
    /**
     * @var int
     */
    private $callTimeout;
    /**
     * @var string
     */
    private $transferCallerId;
    /**
     * @var string
     */
    private $transferCallerDisplayName;
    /**
     * @var string
     */
    private $transferCompleteMethod;
    /**
     * @var string
     */
    private $transferCompleteUrl;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $username;

    /**
     * Sets the username attribute for Transfer
     *
     * @param string $username The username for http authentication on the transfer answered callback url
     */
    public function username(string $username): static {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for Transfer
     *
     * @param string $password The password for http authentication on the transfer answered callback url
     */
    public function password(string $password): static {
        $this->password = $password;
        return $this;
    }

    /**
     * Sets the transferCompleteUrl attribute for Transfer
     *
     * @param string $transferCompleteUrl The url to receive the transfer answered callback 
     */
    public function transferCompleteUrl(string $transferCompleteUrl): static {
        $this->transferCompleteUrl = $transferCompleteUrl;
        return $this;
    }

    /**
     * Sets the transferCompleteMethod attribute for Transfer
     *
     * @param string $transferCompleteMethod The http method to send the transfer answered callback 
     */
    public function transferCompleteMethod(string $transferCompleteMethod): static {
        $this->transferCompleteMethod = $transferCompleteMethod;
        return $this;
    }

    /**
     * Sets the transferCallerId attribute for Transfer
     *
     * @param string $transferCallerId The caller id to use when the call is transferred
     */
    public function transferCallerId(string $transferCallerId): static {
        $this->transferCallerId = $transferCallerId;
        return $this;
    }

    /**
     * Sets the transferCallerDisplayName attribute for Transfer
     */
    public function transferCallerDisplayName(string $transferCallerDisplayName): static {
        $this->transferCallerDisplayName = $transferCallerDisplayName;
        return $this;
    }

    /**
     * Sets the callTimeout attribute for Transfer
     *
     * @param int $callTimeout The number of seconds to wait before timing out the call
     */
    public function callTimeout(int $callTimeout): static {
        $this->callTimeout = $callTimeout;
        return $this;
    }

    /**
     * Sets the tag attribute for Transfer
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag(string $tag): static {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the diversionTreatment attribute for Transfer
     *
     * @param string $diversionTreatment The diversion treatment for the phone call 
     */
    public function diversionTreatment(string $diversionTreatment): static {
        $this->diversionTreatment = $diversionTreatment;
        return $this;
    }

    /**
     * Sets the diversionReason attribute for Transfer
     *
     * @param string $diversionReason The diversion treatment for the phone call 
     */
    public function diversionReason(string $diversionReason): static {
        $this->diversionReason = $diversionReason;
        return $this;
    }

    /**
     * Sets the PhoneNumber tags to be included in the Transfer
     *
     * @param list<PhoneNumber> $phoneNumbers The list of PhoneNumber tags
     */
    public function phoneNumbers($phoneNumbers): static {
        $this->phoneNumbers = $phoneNumbers;
        return $this;
    }

    /**
     * Sets the SipUri tags to be included in the Transfer
     *
     * @param list<SipUri> $sipUris The list of SipUri tags
     */
    public function sipUris($sipUris): static {
        $this->sipUris = $sipUris;
        return $this;
    }

    /**
     * Sets the transferCompleteFallbackUrl attribute for Transfer
     *
     * @param string $transferCompleteFallbackUrl Fallback url for transfer complete events 
     */
    public function transferCompleteFallbackUrl(string $transferCompleteFallbackUrl): static {
        $this->transferCompleteFallbackUrl = $transferCompleteFallbackUrl;
        return $this;
    }

    /**
     * Sets the transferCompleteFallbackMethod attribute for Transfer
     *
     * @param string $transferCompleteFallbackMethod HTTP method for fallback events
     */
    public function transferCompleteFallbackMethod(string $transferCompleteFallbackMethod): static {
        $this->transferCompleteFallbackMethod = $transferCompleteFallbackMethod;
        return $this;
    }

    /**
     * Sets the fallbackUsername attribute for Transfer
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events 
     */
    public function fallbackUsername(string $fallbackUsername): static {
        $this->fallbackUsername = $fallbackUsername;
        return $this;
    }

    /**
     * Sets the fallbackPassword attribute for Transfer
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events
     */
    public function fallbackPassword(string $fallbackPassword): static {
        $this->fallbackPassword = $fallbackPassword;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Transfer");

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
        }

        if(isset($this->transferCompleteUrl)) {
            $element->setAttribute("transferCompleteUrl", $this->transferCompleteUrl);
        }

        if(isset($this->transferCompleteMethod)) {
            $element->setAttribute("transferCompleteMethod", $this->transferCompleteMethod);
        }

        if(isset($this->transferCallerId)) {
            $element->setAttribute("transferCallerId", $this->transferCallerId);
        }

        if(isset($this->transferCallerDisplayName)) {
            $element->setAttribute("transferCallerDisplayName", $this->transferCallerDisplayName);
        }

        if(isset($this->callTimeout)) {
            $element->setAttribute("callTimeout", $this->callTimeout);
        }
        
        if(isset($this->diversionTreatment)) {
            $element->setAttribute("diversionTreatment", $this->diversionTreatment);
        }

        if(isset($this->diversionReason)) {
            $element->setAttribute("diversionReason", $this->diversionReason);
        }

        if(isset($this->transferCompleteFallbackUrl)) {
            $element->setAttribute("transferCompleteFallbackUrl", $this->transferCompleteFallbackUrl);
        }

        if(isset($this->transferCompleteFallbackMethod)) {
            $element->setAttribute("transferCompleteFallbackMethod", $this->transferCompleteFallbackMethod);
        }

        if(isset($this->fallbackUsername)) {
            $element->setAttribute("fallbackUsername", $this->fallbackUsername);
        }

        if(isset($this->fallbackPassword)) {
            $element->setAttribute("fallbackPassword", $this->fallbackPassword);
        }

        if(isset($this->phoneNumbers)) {
            foreach ($this->phoneNumbers as $phoneNumber) {
                $element->appendChild($phoneNumber->toBxml($doc));
            }
        }

        if(isset($this->sipUris)) {
            foreach ($this->sipUris as $sipUri) {
                $element->appendChild($sipUri->toBxml($doc));
            }
        }

        return $element;
    }
}
