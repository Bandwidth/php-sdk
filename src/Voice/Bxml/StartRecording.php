<?php
/**
 * StartRecording.php
 *
 * Implementation of the BXML StartRecording verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;
use DOMElement;

require_once "Verb.php";

class StartRecording extends Verb {
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
     * @var bool
     */
    private $multiChannel;
    /**
     * @var string
     */
    private $fileFormat;
    /**
     * @var bool
     */
    private $detectLanguage;
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
    private $tag;

    /**
     * Sets the tag attribute for StartRecording
     *
     * @param string $tag A custom string to be included in callbacks 
     */
    public function tag(string $tag): StartRecording {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Sets the recordingAvailableUrl attribute for StartRecording
     *
     * @param string $recordingAvailableUrl URL to send the record available callback to
     */
    public function recordingAvailableUrl(string $recordingAvailableUrl): StartRecording {
        $this->recordingAvailableUrl = $recordingAvailableUrl;
        return $this;
    }

    /**
     * Sets the recordingAvailableMethod attribute for StartRecording
     *
     * @param string $recordingAvailableMethod HTTP method to send record available
     * as ("GET" or "POST")
     */
    public function recordingAvailableMethod(string $recordingAvailableMethod): StartRecording {
        $this->recordingAvailableMethod = $recordingAvailableMethod;
        return $this;
    }

    /**
     * Sets the username attribute for StartRecording
     *
     * @param string $username Username for basic auth for callbacks
     */
    public function username(string $username): StartRecording {
        $this->username = $username;
        return $this;
    }

    /**
     * Sets the password attribute for StartRecording
     *
     * @param string $password Password for basic auth for callbacks
     */
    public function password(string $password): StartRecording {
        $this->password = $password;
        return $this;
    }

    /**
     * Sets the fileFormat attribute for StartRecording
     *
     * @param string $fileFormat Audio format of the recording ("mp3" or "wav")
     */
    public function fileFormat(string $fileFormat): StartRecording {
        $this->fileFormat = $fileFormat;
        return $this;
    }

    /**
     * Sets the detectLanguage attribute for Record
     *
     * @param boolean $detectLanguage Indicates that the recording may not be in English, and the transcription service will need to detect the dominant language the recording is in and transcribe accordingly. Current supported languages are English, French, and Spanish.
     */
    public function detectLanguage($detectLanguage): StartRecording {
        $this->detectLanguage = $detectLanguage;
        return $this;
    }


    /**
     * Sets the multiChannel attribute for StartRecording
     *
     * @param bool $multiChannel True to record the audio as 2 channels, false otherwise
     */
    public function multiChannel(bool $multiChannel): StartRecording {
        $this->multiChannel = $multiChannel;
        return $this;
    }

    /**
     * Sets the transcribe attribute for StartRecording
     *
     * @param boolean $transcribe True to submit the recording for transcription, false otherwise
     */
    public function transcribe(bool $transcribe): StartRecording {
        $this->transcribe = $transcribe;
        return $this;
    }

    /**
     * Sets the transcriptionAvailableUrl for StartRecording
     *
     * @param string $transcriptionAvailableUrl URL to send transcription available events to
     */
    public function transcriptionAvailableUrl(string $transcriptionAvailableUrl): StartRecording {
        $this->transcriptionAvailableUrl = $transcriptionAvailableUrl;
        return $this;
    }

    /**
     * Sets the transcriptionAvailableMethod for StartRecording
     *
     * @param string $transcriptionAvailableMethod HTTP method (GET or POST) to send the transcription available event as
     */
    public function transcriptionAvailableMethod(string $transcriptionAvailableMethod): StartRecording {
        $this->transcriptionAvailableMethod = $transcriptionAvailableMethod;
        return $this;
    }

    public function toBxml(DOMDocument $doc): DOMElement {
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

        if(isset($this->detectLanguage)) {
            if ($this->detectLanguage) {
                $element->setattribute("detectLanguage", "true");
            } else {
                $element->setattribute("detectLanguage", "false");
            }
        }

        if(isset($this->multiChannel)) {
            if ($this->multiChannel) {
                $element->setattribute("multiChannel", "true");
            } else {
                $element->setattribute("multiChannel", "false");
            }
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

        return $element;
    }
}
