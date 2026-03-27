<?php
/**
 * CreateEndpointRequest.php
 *
 * Model for creating a BRTC Endpoint
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class CreateEndpointRequest implements \JsonSerializable
{
    /** @var string */
    public $type;
    /** @var string */
    public $direction;
    /** @var string|null */
    public $eventCallbackUrl;
    /** @var string|null */
    public $eventFallbackUrl;
    /** @var string|null */
    public $tag;
    /** @var array|null */
    public $connectionMetadata;

    public function __construct(
        $type,
        $direction,
        $eventCallbackUrl = null,
        $eventFallbackUrl = null,
        $tag = null,
        $connectionMetadata = null
    ) {
        $this->type               = $type;
        $this->direction          = $direction;
        $this->eventCallbackUrl   = $eventCallbackUrl;
        $this->eventFallbackUrl   = $eventFallbackUrl;
        $this->tag                = $tag;
        $this->connectionMetadata = $connectionMetadata;
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['type']               = $this->type;
        $json['direction']          = $this->direction;
        $json['eventCallbackUrl']   = $this->eventCallbackUrl;
        $json['eventFallbackUrl']   = $this->eventFallbackUrl;
        $json['tag']                = $this->tag;
        $json['connectionMetadata'] = $this->connectionMetadata;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
