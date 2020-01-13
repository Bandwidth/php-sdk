<?php
/**
 * StartRecording.php
 *
 * Implementation of the BXML StartRecording verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class StartRecording extends Verb {

    /**
     * Sets the tag attribute for StartRecording
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag($tag) {
        $this->tag = $tag;
    }

    /**
     * Sets the recordingAvailableUrl attribute for StartRecording
     *
     * @param string $recordingAvailableUrl URL to send the record available callback to
     */
    public function recordingAvailableUrl($recordingAvailableUrl) {
        $this->recordingAvailableUrl = $recordingAvailableUrl;
    }

    /**
     * Sets the recordingAvailableMethod attribute for StartRecording
     *
     * @param string $recordingAvailableMethod HTTP method to send record available
     * as ("GET" or "POST")
     */
    public function recordingAvailableMethod($recordingAvailableMethod) {
        $this->recordingAvailableMethod = $recordingAvailableMethod;
    }

    /**
     * Sets the username attribute for StartRecording
     *
     * @param string $username Username for basic auth for callbacks
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for StartRecording
     *
     * @param string $password Password for basic auth for callbacks
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the fileFormat attribute for StartRecording
     *
     * @param string $fileFormat Audio format of the recording ("mp3" or "wav")
     */
    public function fileFormat($fileFormat) {
        $this->fileFormat = $fileFormat;
    }

    /**
     * Sets the multiChannel attribute for StartRecording
     *
     * @param bool $multiChannel True to record the audio as 2 channels, false otherwise
     */
    public function multiChannel($multiChannel) {
        $this->multiChannel = $multiChannel;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("StartRecording");

        if(isset($this->tag)) {
            $element->setattribute("tag", $this->tag);
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

        if(isset($this->fileFormat)) {
            $element->setattribute("fileFormat", $this->fileFormat);
        }

        if(isset($this->multiChannel)) {
            if ($this->multiChannel) {
                $element->setattribute("multiChannel", "true");
            } else {
                $element->setattribute("multiChannel", "false");
            }
        }

        return $element;
    }
}
