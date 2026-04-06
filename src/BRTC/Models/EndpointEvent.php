<?php
/**
 * EndpointEvent.php
 *
 * Model representing an event for a BRTC Endpoint.
 * Matches the endpointEvent schema from the API spec.
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class EndpointEvent implements \JsonSerializable
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
    /** @var string */
    public $eventTime;
    /** @var string */
    public $eventType;
    /** @var Device|null */
    public $device;

    public function __construct(
        $endpointId = null,
        $type = null,
        $status = null,
        $creationTimestamp = null,
        $expirationTimestamp = null,
        $tag = null,
        $eventTime = null,
        $eventType = null,
        $device = null
    ) {
        $this->endpointId          = $endpointId;
        $this->type                = $type;
        $this->status              = $status;
        $this->creationTimestamp   = $creationTimestamp;
        $this->expirationTimestamp = $expirationTimestamp;
        $this->tag                 = $tag;
        $this->eventTime           = $eventTime;
        $this->eventType           = $eventType;
        $this->device              = $device;
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
        $json['eventTime']           = $this->eventTime;
        $json['eventType']           = $this->eventType;
        $json['device']              = $this->device;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
