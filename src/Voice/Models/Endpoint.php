<?php
/**
 * Endpoint.php
 *
 * Model representing a BRTC Endpoint
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class Endpoint {
    /** @var string|null */
    public $endpointId;
    /** @var string|null */
    public $type;
    /** @var string|null */
    public $status;
    /** @var string|null */
    public $direction;
    /** @var string|null */
    public $eventCallbackUrl;
    /** @var string|null */
    public $eventFallbackUrl;
    /** @var string|null */
    public $tag;
    /** @var array|null */
    public $devices;
    /** @var string|null */
    public $creationTimestamp;
    /** @var string|null */
    public $expirationTimestamp;

    public function __construct($endpointId = null, $type = null, $status = null, $direction = null, $eventCallbackUrl = null, $eventFallbackUrl = null, $tag = null, $devices = null, $creationTimestamp = null, $expirationTimestamp = null) {
        $this->endpointId = $endpointId;
        $this->type = $type;
        $this->status = $status;
        $this->direction = $direction;
        $this->eventCallbackUrl = $eventCallbackUrl;
        $this->eventFallbackUrl = $eventFallbackUrl;
        $this->tag = $tag;
        $this->devices = $devices;
        $this->creationTimestamp = $creationTimestamp;
        $this->expirationTimestamp = $expirationTimestamp;
    }
}
