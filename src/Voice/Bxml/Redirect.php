<?php
/**
 * Redirect.php
 *
 * Implementation of the BXML Redirect verb
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class Redirect extends Verb {
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
    private $redirectFallbackMethod;
    /**
     * @var string
     */
    private $redirectFallbackUrl;
    /**
     * @var string
     */
    private $tag;
    /**
     * @var string
     */
    private $redirectMethod;
    /**
     * @var string
     */
    private $redirectUrl;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $username;

    /**
     * Sets the username attribute for Redirect
     *
     * @param string $username The username for http authentication on the redirect callback url
     */
    public function username(string $username): static {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for Redirect
     *
     * @param string $password The password for http authentication on the redirect callback url
     */
    public function password(string $password): static {
        $this->password = $password;
        return $this;
    }

    /**
     * Sets the redirectUrl attribute for Redirect
     *
     * @param string $redirectUrl The url to receive the redirect callback 
     */
    public function redirectUrl(string $redirectUrl): static {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    /**
     * Sets the redirectMethod attribute for Redirect
     *
     * @param string $redirectMethod The http method to send the redirect callback 
     */
    public function redirectMethod(string $redirectMethod): static {
        $this->redirectMethod = $redirectMethod;
        return $this;
    }

    /**
     * Sets the tag attribute for Redirect
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag(string $tag): static {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the redirectFallbackUrl attribute for Redirect
     *
     * @param string $redirectFallbackUrl Fallback url for redirect events 
     */
    public function redirectFallbackUrl(string $redirectFallbackUrl): static {
        $this->redirectFallbackUrl = $redirectFallbackUrl;
        return $this;
    }

    /**
     * Sets the redirectFallbackMethod attribute for Redirect
     *
     * @param string $redirectFallbackMethod HTTP method for fallback events 
     */
    public function redirectFallbackMethod(string $redirectFallbackMethod): static {
        $this->redirectFallbackMethod = $redirectFallbackMethod;
        return $this;
    }

    /**
     * Sets the fallbackUsername attribute for Redirect
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events
     */
    public function fallbackUsername(string $fallbackUsername): static {
        $this->fallbackUsername = $fallbackUsername;
        return $this;
    }

    /**
     * Sets the fallbackPassword attribute for Redirect
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events 
     */
    public function fallbackPassword(string $fallbackPassword): static {
        $this->fallbackPassword = $fallbackPassword;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
        $element = $doc->createElement("Redirect");

        if(isset($this->username)) {
            $element->setAttribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setAttribute("password", $this->password);
        }

        if(isset($this->tag)) {
            $element->setAttribute("tag", $this->tag);
        }

        if(isset($this->redirectUrl)) {
            $element->setAttribute("redirectUrl", $this->redirectUrl);
        }

        if(isset($this->redirectMethod)) {
            $element->setAttribute("redirectMethod", $this->redirectMethod);
        }

        if(isset($this->redirectFallbackUrl)) {
            $element->setAttribute("redirectFallbackUrl", $this->redirectFallbackUrl);
        }

        if(isset($this->redirectFallbackMethod)) {
            $element->setAttribute("redirectFallbackMethod", $this->redirectFallbackMethod);
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
