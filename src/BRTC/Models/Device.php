<?php
/**
 * Device.php
 *
 * Model representing a device associated with a BRTC Endpoint
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class Device implements \JsonSerializable
{
    /** @var string */
    public $deviceId;
    /** @var string|null */
    public $deviceName;
    /** @var string */
    public $status;
    /** @var string */
    public $creationTimestamp;

    public function __construct($deviceId = null, $deviceName = null, $status = null, $creationTimestamp = null)
    {
        $this->deviceId          = $deviceId;
        $this->deviceName        = $deviceName;
        $this->status            = $status;
        $this->creationTimestamp = $creationTimestamp;
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['deviceId']          = $this->deviceId;
        $json['deviceName']        = $this->deviceName;
        $json['status']            = $this->status;
        $json['creationTimestamp'] = $this->creationTimestamp;

        return array_filter($json);
    }
}
