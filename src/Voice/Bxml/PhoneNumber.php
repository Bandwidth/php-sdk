<?php
/**
 * PhoneNumber.php
 *
 * Implementation of the BXML PhoneNumber tag
 *
 *  * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class PhoneNumber extends Verb {

    /**
     * Constructor for PhoneNumber
     *
     * @param string $phoneNumber The phone number for the tag
     */
    public function __construct($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Sets the username attribute for PhoneNumber
     *
     * @param string $username The username for http authentication on the audio url
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for PhoneNumber
     *
     * @param string $password The password for http authentication on the audio url
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the transferAnswerUrl attribute for PhoneNumber
     *
     * @param string $transferAnswerUrl The url to receive the transfer answered callback 
     */
    public function transferAnswerUrl($transferAnswerUrl) {
        $this->transferAnswerUrl = $transferAnswerUrl;
    }

    /**
     * Sets the transferAnswerMethod attribute for PhoneNumber
     *
     * @param string $transferAnswerMethod The http method to send the transfer answered callback 
     */
    public function transferAnswerMethod($transferAnswerMethod) {
        $this->transferAnswerMethod = $transferAnswerMethod;
    }

    /**
     * Sets the transferDisconnectUrl attribute for PhoneNumber
     *
     * @param string $transferDisconnectUrl The url to receive the transfer disconnect callback 
     */
    public function transferDisconnectUrl($transferDisconnectUrl) {
        $this->transferDisconnectUrl = $transferDisconnectUrl;
    }

    /**
     * Sets the transferDisconnectMethod attribute for PhoneNumber
     *
     * @param string $transferDisconnectMethod The http method to send the transfer disconnect callback 
     */
    public function transferDisconnectMethod($transferDisconnectMethod) {
        $this->transferDisconnectMethod = $transferDisconnectMethod;
    }

    /**
     * Sets the tag attribute for PhoneNumber
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag($tag) {
        $this->tag = $tag;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("PhoneNumber", $this->phoneNumber);

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

        return $element;
    }
}
