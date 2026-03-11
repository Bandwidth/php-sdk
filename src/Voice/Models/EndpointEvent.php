<?php
/**
 * EndpointEvent.php
 *
 * Model representing an event for a BRTC Endpoint
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class EndpointEvent {
    /** @var string|null */
    public $eventType;
    /** @var string|null */
    public $endpointId;
    /** @var string|null */
    public $timestamp;
    /** @var string|null */
    public $status;
    /** @var string|null */
    public $reason;
    /** @var array|null */
    public $details;

    public function __construct($eventType = null, $endpointId = null, $timestamp = null, $status = null, $reason = null, $details = null) {
        $this->eventType = $eventType;
        $this->endpointId = $endpointId;
        $this->timestamp = $timestamp;
        $this->status = $status;
        $this->reason = $reason;
        $this->details = $details;
    }
}
