<?php
/**
 * StartStream.php
 *
 * Implementation of the BXML StartStream verb
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Bxml;

require_once "Verb.php";

class StartStream extends Verb {

    /**
     * Sets the destination attribute for StartStream
     *
     * @param string $destination A websocket URI to send the stream to. The audio from the specified tracks will be sent via websocket to this URL encoded as base64 encoded PCMU/G711 audio. See below for more details on the websocket packet format.
     */
    public function destination($destination) {
        $this->destination = $destination;
    }

    /**
     * Sets the name attribute for StartStream
     *
     * @param string $name A name to refer to this stream by. Used when sending [`<StopStream>`][1]. If not provided, a random name will be generated and sent in the [`Media Stream Started`][2] webook
     */
    public function name($name) {
        $this->name = $name;
    }

    /**
     * Sets the tracks attribute for StartStream
     *
     * @param string $tracks The part of the call to send a stream from. `inbound`, `outbound` or `both`. Default is `inbound`. 
     * 
     */
    public function tracks($tracks) {
        $this->tracks = $tracks;
    }

    /**
     * Sets the username attribute for StartStream
     *
     * @param string $username The username to send in the HTTP request to `streamEventUrl`. If specified, the URLs must be TLS-encrypted (i.e., `https`). 
     */
    public function username($username) {
        $this->username = $username;
    }

    /**
     * Sets the password attribute for StartStream
     *
     * @param string $password The password to send in the HTTP request to `streamEventUrl`. If specified, the URLs must be TLS-encrypted (i.e., `https`).    
     */
    public function password($password) {
        $this->password = $password;
    }

    /**
     * Sets the streamEventUrl attribute for StartStream
     *
     * @param string $streamEventUrl URL to send the associated Webhook events to during this stream's lifetime. Does not accept BXML. May be a relative URL. 
     */
    public function streamEventUrl($streamEventUrl) {
        $this->streamEventUrl = $streamEventUrl;
    }

    /**
     * Sets the streamEventMethod attribute for StartStream
     *
     * @param bool $streamEventMethod The HTTP method to use for the request to `streamEventUrl`. GET or POST. Default value is POST. 
     */
    public function streamEventMethod($streamEventMethod) {
        $this->streamEventMethod = $streamEventMethod;
    }

    /**
     * Sets the <StreamParam/> tag. You may specify up to 12 <StreamParam/> elements nested within a <StartStream> tag. These elements define optional user specified parameters that will be sent to the destination URL when the stream is first started.
     *
     * @param list<StreamParam> $streamParams The list of StreamParam tags
     */
    public function streamParams($streamParams) {
        $this->streamParams = $streamParams;
    }

    public function toBxml($doc) {
        $element = $doc->createElement("StartStream");

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

        if(isset($this->streamEventUrl)) {
            $element->setattribute("streamEventUrl", $this->streamEventUrl);
        }

        if(isset($this->streamEventMethod)) {
            $element->setattribute("streamEventMethod", $this->streamEventMethod);
        }

        if(isset($this->streamParams)) {
            foreach ($this->streamParams as $streamParam) {
                $element->appendChild($streamParam->toBxml($doc));
            }
        }

        return $element;
    }
}
