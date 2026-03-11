<?php
/**
 * Device.php
 *
 * Model representing a device associated with a BRTC Endpoint
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class Device {
    /** @var string|null */
    public $id;
    /** @var string|null */
    public $status;
    /** @var string|null */
    public $type;
    /** @var string|null */
    public $createdTime;
    /** @var string|null */
    public $updatedTime;

    public function __construct($id = null, $status = null, $type = null, $createdTime = null, $updatedTime = null) {
        $this->id = $id;
        $this->status = $status;
        $this->type = $type;
        $this->createdTime = $createdTime;
        $this->updatedTime = $updatedTime;
    }
}
