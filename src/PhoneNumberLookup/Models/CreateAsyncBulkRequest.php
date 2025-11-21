<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Create Async Bulk TN Lookup Request
 */
class CreateAsyncBulkRequest implements \JsonSerializable
{
    /**
     * List of TNs to lookup max 15000 TNs
     * @var array|null $phoneNumbers public property
     */
    public $phoneNumbers;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->phoneNumbers = func_get_arg(0);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['phoneNumbers'] = isset($this->phoneNumbers) ? array_values($this->phoneNumbers) : null;

        return array_filter($json);
    }
}
