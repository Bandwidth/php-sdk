<?php
/**
 * Record.php
 *
 * Implementation of the BXML Record verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class Record extends Verb {

    /**
     * Sets the tag attribute for Record
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag($tag) {
        $this->tag = $tag;
    }

    /**
     * Sets the recordCompleteUrl attribute for Record
     *
     * @param string $recordCompleteUrl URL to send the record complete callback to
     */
    public function recordCompleteUrl($recordCompleteUrl) {
        $this->recordCompleteUrl = $recordCompleteUrl;
    }

    /**
     * Sets the recordCompleteMethod attribute for Record
     *
     * @param string $recordCompleteMethod HTTP method to send record complete
     * as ("GET" or "POST")
     */
    public function recordCompleteMethod($recordCompleteMethod) {
        $this->recordCompleteMethod = $recordCompleteMethod;
    }

    /**
     * Sets the recordingAvailableUrl attribute for Record
     *
     * @param string $recordingAvailableUrl URL to send the record available callback to
     */
    public function recordingAvailableUrl($recordingAvailableUrl) {
        $this->recordingAvailableUrl = $recordingAvailableUrl;
    }

    /**
     * Sets the recordingAvailableMethod attribute for Record
     *
     * @param string $recordingAvailableMethod HTTP method to send record available
     * as ("GET" or "POST")
     */
    public function recordingAvailableMethod($recordingAvailableMethod) {
        $this->recordingAvailableMethod = $recordingAvailableMethod;
    }

    /**
     * Sets the username attribute for Record
     *
     * @param string $username Username for basic auth for callbacks
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for Record
     *
     * @param string $password Password for basic auth for callbacks
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the terminatingDigits attribute for Record
     *
     * @param string $terminatingDigits Digits to terminate the recording
     */
    public function terminatingDigits($terminatingDigits) {
        $this->terminatingDigits = $terminatingDigits;
    }

    /**
     * Sets the maxDuration attribute for Record
     *
     * @param int $maxDuration Maximum length of the recording in secods
     */
    public function maxDuration($maxDuration) {
        $this->maxDuration = $maxDuration;
    }

    /**
     * Sets the fileFormat attribute for Record
     *
     * @param string $fileFormat Audio format of the recording ("mp3" or "wav")
     */
    public function fileFormat($fileFormat) {
        $this->fileFormat = $fileFormat;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("Record");

        if(isset($this->tag)) {
            $element->setattribute("tag", $this->tag);
        }

        if(isset($this->recordCompleteUrl)) {
            $element->setattribute("recordCompleteUrl", $this->recordCompleteUrl);
        }

        if(isset($this->recordCompleteMethod)) {
            $element->setattribute("recordCompleteMethod", $this->recordCompleteMethod);
        }

        if(isset($this->recordingAvailableUrl)) {
            $element->setattribute("recordingAvailableUrl", $this->recordingAvailableUrl);
        }

        if(isset($this->recordingAvailableMethod)) {
            $element->setattribute("recordingAvailableMethod", $this->recordingAvailableMethod);
        }

        if(isset($this->username)) {
            $element->setattribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setattribute("password", $this->password);
        }

        if(isset($this->terminatingDigits)) {
            $element->setattribute("terminatingDigits", $this->terminatingDigits);
        }

        if(isset($this->maxDuration)) {
            $element->setattribute("maxDuration", $this->maxDuration);
        }

        if(isset($this->fileFormat)) {
            $element->setattribute("fileFormat", $this->fileFormat);
        }

        return $element;
    }
}
