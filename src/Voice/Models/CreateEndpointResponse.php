<?php
/**
 * CreateEndpointResponse.php
 *
 * Model for the response after creating a BRTC Endpoint
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class CreateEndpointResponse {
    /** @var string|null */
    public $endpointId;
    /** @var string|null */
    public $type;
    /** @var string|null */
    public $status;
    /** @var string|null */
    public $creationTimestamp;
    /** @var string|null */
    public $expirationTimestamp;
    /** @var string|null */
    public $tag;
    /** @var array|null */
    public $devices;
    /** @var string|null */
    public $token;

    public function __construct($endpointId = null, $type = null, $status = null, $creationTimestamp = null, $expirationTimestamp = null, $tag = null, $devices = null, $token = null) {
        $this->endpointId = $endpointId;
        $this->type = $type;
        $this->status = $status;
        $this->creationTimestamp = $creationTimestamp;
        $this->expirationTimestamp = $expirationTimestamp;
        $this->tag = $tag;
        $this->devices = $devices;
        $this->token = $token;
    }
}
