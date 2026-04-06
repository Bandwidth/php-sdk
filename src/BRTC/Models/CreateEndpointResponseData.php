<?php
/**
 * CreateEndpointResponseData.php
 *
 * Model for the data portion of a create endpoint response
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class CreateEndpointResponseData implements \JsonSerializable
{
    /** @var string */
    public $endpointId;
    /** @var string */
    public $type;
    /** @var string */
    public $status;
    /** @var string */
    public $creationTimestamp;
    /** @var string */
    public $expirationTimestamp;
    /** @var string|null */
    public $tag;
    /** @var Device[]|null */
    public $devices;
    /** @var string */
    public $token;

    public function __construct(
        $endpointId = null,
        $type = null,
        $status = null,
        $creationTimestamp = null,
        $expirationTimestamp = null,
        $tag = null,
        $devices = null,
        $token = null
    ) {
        $this->endpointId          = $endpointId;
        $this->type                = $type;
        $this->status              = $status;
        $this->creationTimestamp   = $creationTimestamp;
        $this->expirationTimestamp = $expirationTimestamp;
        $this->tag                 = $tag;
        $this->devices             = $devices;
        $this->token               = $token;
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['endpointId']          = $this->endpointId;
        $json['type']                = $this->type;
        $json['status']              = $this->status;
        $json['creationTimestamp']   = $this->creationTimestamp;
        $json['expirationTimestamp'] = $this->expirationTimestamp;
        $json['tag']                 = $this->tag;
        $json['devices']             = $this->devices;
        $json['token']               = $this->token;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
