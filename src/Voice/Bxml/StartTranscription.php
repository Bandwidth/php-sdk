<?php
/**
 * StartTranscription.php
 *
 * Implementation of the BXML StartTranscription verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

use DOMDocument;

require_once "Verb.php";

class StartTranscription extends Verb {
    private $customParams;
    /**
     * @var bool
     */
    private $transcriptionEventMethod;
    /**
     * @var string
     */
    private $transcriptionEventUrl;
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
    private $tracks;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $destination;
    /**
     * @var bool
     */
    private $stability;

    /**
     * Sets the destination attribute for StartTranscription
     *
     * @param string $destination A websocket URI to send the real-time transcription to. The audio from the specified tracks will be sent via websocket to this URL encoded as base64 encoded PCMU/G711 audio. See below for more details on the websocket packet format.
     */
    public function destination(string $destination) {
        $this->destination = $destination;
    }

    /**
     * Sets the name attribute for StartTranscription
     *
     * @param string $name A name to refer to this transcription by. Used when sending <StopTranscription>. If not provided, it will default to the generated transcription id as sent in the real-time Transcription Started webhook.
     */
    public function name(string $name) {
        $this->name = $name;
    }

    /**
     * Sets the tracks attribute for StartTranscription
     *
     * @param string $tracks The part of the call to send a real-time transcription from. `inbound`, `outbound` or `both`. Default is `inbound`. 
     * 
     */
    public function tracks(string $tracks) {
        $this->tracks = $tracks;
    }

    /**
     * Sets the username attribute for StartTranscription
     *
     * @param string $username The username to send in the HTTP request to `transcriptionEventUrl`. If specified, the URLs must be TLS-encrypted (i.e., `https`). 
     */
    public function username(string $username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for StartTranscription
     *
     * @param string $password The password to send in the HTTP request to `transcriptionEventUrl`. If specified, the URLs must be TLS-encrypted (i.e., `https`).    
     */
    public function password(string $password) {
        $this->password = $password;
    }

    /**
     * Sets the transcriptionEventUrl attribute for StartTranscription
     *
     * @param string $transcriptionEventUrl URL to send the associated Webhook events to during this stream's lifetime. Does not accept BXML. May be a relative URL. 
     */
    public function transcriptionEventUrl(string $transcriptionEventUrl) {
        $this->transcriptionEventUrl = $transcriptionEventUrl;
    }

    /**
     * Sets the transcriptionEventMethod attribute for StartTranscription
     *
     * @param bool $transcriptionEventMethod The HTTP method to use for the request to `transcriptionEventUrl`. GET or POST. Default value is POST. 
     */
    public function transcriptionEventMethod(string $transcriptionEventMethod) {
        $this->transcriptionEventMethod = $transcriptionEventMethod;
    }

    /**
     * Sets the stability attribute for StartTranscription
     *
     * @param bool Whether to send transcription update events to the specified destination only after they have become stable. Requires destination. Defaults to true.
     * 
     */
    public function stability( bool $stability) {
        $this->stability = $stability;
    }

    /**
     * Sets the <CustomParam/> tag. You may specify up to 12 <CustomParam/> elements nested within a <StartTranscription> tag. These elements define optional user specified parameters that will be sent to the destination URL when the real-time transcription is first started.
     *
     * @param list<CustomParam> $customParams The list of CustomParam tags
     */
    public function customParams($customParams) {
        $this->customParams = $customParams;
    }

    public function toBxml(DOMDocument $doc) {
        $element = $doc->createElement("StartTranscription");

        if(isset($this->destination)) {
            $element->setattribute("destination", $this->destination);
        }

        if(isset($this->name)) {
            $element->setattribute("name", $this->name);
        }

        if(isset($this->tracks)) {
            $element->setattribute("tracks", $this->tracks);
        }

        if(isset($this->username)) {
            $element->setattribute("username", $this->username);
        }

        if(isset($this->password)) {
            $element->setattribute("password", $this->password);
        }

        if(isset($this->transcriptionEventUrl)) {
            $element->setattribute("transcriptionEventUrl", $this->transcriptionEventUrl);
        }

        if(isset($this->transcriptionEventMethod)) {
            $element->setattribute("transcriptionEventMethod", $this->transcriptionEventMethod);
        }

        if(isset($this->stability)) {
            $element->setattribute("stablilty", $this->stability);
        }

        if(isset($this->customParams)) {
            foreach ($this->customParams as $customParam) {
                $element->appendChild($customParam->toBxml($doc));
            }
        }

        return $element;
    }
}
