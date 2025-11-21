<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Create Async Bulk Phone Number Lookup Response Data
 */
class CreateAsyncBulkResponseData implements \JsonSerializable
{
    /**
     * The phone number lookup request ID from Bandwidth.
     * @var string|null $requestId public property
     */
    public $requestId;

    /**
     * Lookup Status. Enum Values Are: "IN_PROGRESS" "COMPLETE" "PARTIAL_COMPLETE" "FAILED"
     * @var string|null $status public property
     */
    public $status;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->requestId    = func_get_arg(0);
            $this->status       = func_get_arg(1);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['requestId']  = $this->requestId;
        $json['status']     = $this->status;

        return array_filter($json);
    }
}
