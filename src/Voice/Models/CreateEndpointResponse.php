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
    public $createdTime;
    /** @var string|null */
    public $updatedTime;
    /** @var string|null */
    public $tag;
    /** @var array|null */
    public $devices;
    /** @var string|null */
    public $token;

    public function __construct($endpointId = null, $type = null, $status = null, $createdTime = null, $updatedTime = null, $tag = null, $devices = null, $token = null) {
        $this->endpointId = $endpointId;
        $this->type = $type;
        $this->status = $status;
        $this->createdTime = $createdTime;
        $this->updatedTime = $updatedTime;
        $this->tag = $tag;
        $this->devices = $devices;
        $this->token = $token;
    }
}
