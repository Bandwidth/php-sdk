<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Create Sync and Async Bulk TN Lookup Request
 */
class CreateLookupRequest implements \JsonSerializable
{
    /**
     * List of TNs to lookup.
     * Max 15000 TNs for Async Bulk Lookup.
     * Max 100 TNs for Sync Lookup.
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
