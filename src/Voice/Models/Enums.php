<?php
/**
 * Enums.php
 *
 * Enum types for BRTC Endpoints
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class EndpointTypeEnum {
    const WEBRTC = 'WEBRTC';
    // Add SIP when supported
}

class EndpointStatusEnum {
    const ACTIVE = 'ACTIVE';
    const INACTIVE = 'INACTIVE';
    const DELETED = 'DELETED';
}

class EndpointDirectionEnum {
    const INBOUND = 'INBOUND';
    const OUTBOUND = 'OUTBOUND';
}

class DeviceStatusEnum {
    const ONLINE = 'ONLINE';
    const OFFLINE = 'OFFLINE';
}

class EndpointEventTypeEnum {
    const CREATED = 'CREATED';
    const UPDATED = 'UPDATED';
    const DELETED = 'DELETED';
    const STATUS_CHANGED = 'STATUS_CHANGED';
}
