<?php
/**
 * Record.php
 *
 * Implementation of the BXML Record verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class Record extends Verb {
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
    private $recordCompleteFallbackMethod;
    /**
     * @var string
     */
    private $recordCompleteFallbackUrl;
    /**
     * @var int
     */
    private $silenceTimeout;
    /**
     * @var string
     */
    private $transcriptionAvailableMethod;
    /**
     * @var string
     */
    private $transcriptionAvailableUrl;
    /**
     * @var bool
     */
    private $transcribe;
    /**
     * @var string
     */
    private $fileFormat;
    /**
     * @var int
     */
    private $maxDuration;
    /**
     * @var string
     */
    private $terminatingDigits;
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
    private $recordingAvailableMethod;
    /**
     * @var string
     */
    private $recordingAvailableUrl;
    /**
     * @var string
     */
    private $recordCompleteMethod;
    /**
     * @var string
     */
    private $recordCompleteUrl;
    /**
     * @var string
     */
    private $tag;

    /**
     * Sets the tag attribute for Record
     *
     * @param string $tag A custom string to be included in callbacks
     */
    public function tag(string $tag) {
        $this->tag = $tag;
    }

    /**
     * Sets the recordCompleteUrl attribute for Record
     *
     * @param string $recordCompleteUrl URL to send the record complete callback to
     */
    public function recordCompleteUrl(string $recordCompleteUrl) {
        $this->recordCompleteUrl = $recordCompleteUrl;
    }

    /**
     * Sets the recordCompleteMethod attribute for Record
     *
     * @param string $recordCompleteMethod HTTP method to send record complete
     * as ("GET" or "POST")
     */
    public function recordCompleteMethod(string $recordCompleteMethod) {
        $this->recordCompleteMethod = $recordCompleteMethod;
    }

    /**
     * Sets the recordingAvailableUrl attribute for Record
     *
     * @param string $recordingAvailableUrl URL to send the record available callback to
     */
    public function recordingAvailableUrl(string $recordingAvailableUrl) {
        $this->recordingAvailableUrl = $recordingAvailableUrl;
    }

    /**
     * Sets the recordingAvailableMethod attribute for Record
     *
     * @param string $recordingAvailableMethod HTTP method to send record available
     * as ("GET" or "POST")
     */
    public function recordingAvailableMethod(string $recordingAvailableMethod) {
        $this->recordingAvailableMethod = $recordingAvailableMethod;
    }

    /**
     * Sets the username attribute for Record
     *
     * @param string $username Username for basic auth for callbacks
     */
    public function username(string $username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for Record
     *
     * @param string $password Password for basic auth for callbacks
     */
    public function password(string $password) {
        $this->password = $password;
    }

    /**
     * Sets the terminatingDigits attribute for Record
     *
     * @param string $terminatingDigits Digits to terminate the recording
     */
    public function terminatingDigits(string $terminatingDigits) {
        $this->terminatingDigits = $terminatingDigits;
    }

    /**
     * Sets the maxDuration attribute for Record
     *
     * @param int $maxDuration Maximum length of the recording in secods
     */
    public function maxDuration(int $maxDuration) {
        $this->maxDuration = $maxDuration;
    }

    /**
     * Sets the fileFormat attribute for Record
     *
     * @param string $fileFormat Audio format of the recording ("mp3" or "wav")
     */
    public function fileFormat(string $fileFormat) {
        $this->fileFormat = $fileFormat;
    }

    /**
     * Sets the transcribe attribute for Record
     *
     * @param boolean $transcribe True to submit the recording for transcription, false otherwise
     */
    public function transcribe(bool $transcribe) {
        $this->transcribe = $transcribe;
    }

    /**
     * Sets the transcriptionAvailableUrl for Record
     *
     * @param string $transcriptionAvailableUrl URL to send transcription available events to
     */
    public function transcriptionAvailableUrl(string $transcriptionAvailableUrl) {
        $this->transcriptionAvailableUrl = $transcriptionAvailableUrl;
    }

    /**
     * Sets the transcriptionAvailableMethod for Record
     *
     * @param string $transcriptionAvailableMethod HTTP method (GET or POST) to send the transcription available event as
     */
    public function transcriptionAvailableMethod(string $transcriptionAvailableMethod) {
        $this->transcriptionAvailableMethod = $transcriptionAvailableMethod;
    }

    /**
     * Sets the silenceTimeout for Record
     *
     * @param int $silenceTimeout Number of seconds of silence that ends the recording
     */
    public function silenceTimeout(int $silenceTimeout) {
        $this->silenceTimeout = $silenceTimeout;
    }

    /**
     * Sets the recordCompleteFallbackUrl attribute for Record
     *
     * @param string $recordCompleteFallbackUrl Fallback URL for record complete events 
     */
    public function recordCompleteFallbackUrl(string $recordCompleteFallbackUrl) {
        $this->recordCompleteFallbackUrl = $recordCompleteFallbackUrl;
    }

    /**
     * Sets the recordCompleteFallbackMethod attribute for Record
     *
     * @param string $recordCompleteFallbackMethod HTTP method for fallback events 
     */
    public function recordCompleteFallbackMethod(string $recordCompleteFallbackMethod) {
        $this->recordCompleteFallbackMethod = $recordCompleteFallbackMethod;
    }

    /**
     * Sets the fallbackUsername attribute for Record
     *
     * @param string $fallbackUsername HTTP basic auth username for fallback events 
     */
    public function fallbackUsername(string $fallbackUsername) {
        $this->fallbackUsername = $fallbackUsername;
    }

    /**
     * Sets the fallbackPassword attribute for Record
     *
     * @param string $fallbackPassword HTTP basic auth password for fallback events 
     */
    public function fallbackPassword(string $fallbackPassword) {
        $this->fallbackPassword = $fallbackPassword;
    }

    public function toBxml(DOMDocument $doc) {
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

        if(isset($this->transcribe)) {
            if ($this->transcribe) {
                $element->setattribute("transcribe", "true");
            } else {
                $element->setattribute("transcribe", "false");
            }
        }

        if(isset($this->transcriptionAvailableUrl)) {
            $element->setattribute("transcriptionAvailableUrl", $this->transcriptionAvailableUrl);
        }

        if(isset($this->transcriptionAvailableMethod)) {
            $element->setattribute("transcriptionAvailableMethod", $this->transcriptionAvailableMethod);
        }

        if(isset($this->silenceTimeout)) {
            $element->setattribute("silenceTimeout", $this->silenceTimeout);
        }

        if(isset($this->recordCompleteFallbackUrl)) {
            $element->setattribute("recordCompleteFallbackUrl", $this->recordCompleteFallbackUrl);
        }

        if(isset($this->recordCompleteFallbackMethod)) {
            $element->setattribute("recordCompleteFallbackMethod", $this->recordCompleteFallbackMethod);
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
