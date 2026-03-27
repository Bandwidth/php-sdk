<?php
/**
 * Endpoints.php
 *
 * Model representing an endpoint summary item in list responses.
 * Does not include devices (unlike the full Endpoint model).
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class Endpoints implements \JsonSerializable
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

    public function __construct(
        $endpointId = null,
        $type = null,
        $status = null,
        $creationTimestamp = null,
        $expirationTimestamp = null,
        $tag = null
    ) {
        $this->endpointId          = $endpointId;
        $this->type                = $type;
        $this->status              = $status;
        $this->creationTimestamp   = $creationTimestamp;
        $this->expirationTimestamp = $expirationTimestamp;
        $this->tag                 = $tag;
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

        return array_filter($json);
    }
}
