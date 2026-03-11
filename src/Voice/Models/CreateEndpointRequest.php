<?php
/**
 * CreateEndpointRequest.php
 *
 * Model for creating a BRTC Endpoint
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class CreateEndpointRequest {
    /** @var string */
    public $type;
    /** @var string|null */
    public $direction;
    /** @var string|null */
    public $eventCallbackUrl;
    /** @var string|null */
    public $eventFallbackUrl;
    /** @var string|null */
    public $tag;
    /** @var array|null */
    public $connectionMetadata;

    public function __construct($type, $direction = null, $eventCallbackUrl = null, $eventFallbackUrl = null, $tag = null, $connectionMetadata = null) {
        $this->type = $type;
        $this->direction = $direction;
        $this->eventCallbackUrl = $eventCallbackUrl;
        $this->eventFallbackUrl = $eventFallbackUrl;
        $this->tag = $tag;
        $this->connectionMetadata = $connectionMetadata;
    }
}
