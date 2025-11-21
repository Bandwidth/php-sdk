<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Lookup Response Data for Sync and Async Bulk Phone Number Lookup
 */
class LookupResponseData implements \JsonSerializable
{
    /**
     * The phone number lookup request ID from Bandwidth.
     * @var string|null $requestId public property
     */
    public $requestId;

    /**
     * Lookup Status. Enum Values Are: "IN_PROGRESS" "COMPLETE" "PARTIAL_COMPLETE" "FAILED"
     * Will always be "COMPLETE" for Sync TN Lookup.
     * @var string|null $status public property
     */
    public $status;

    /**
     * The carrier information results for the specified telephone numbers.
     * @var \BandwidthLib\PhoneNumberLookup\Models\LookupResult[]|null $results public property
     */
    public $results;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->requestId    = func_get_arg(0);
            $this->status       = func_get_arg(1);
            $this->results      = func_get_arg(2);
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
        $json['results']    = isset($this->results) ? array_values($this->results) : null;

        return array_filter($json);
    }
}
