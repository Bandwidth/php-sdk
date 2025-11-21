<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Create Async Bulk TN Lookup Response
 */
class CreateAsyncBulkResponse implements \JsonSerializable
{
    /**
     * Links for pagination (if applicable)
     * @var \BandwidthLib\PhoneNumberLookup\Models\Link[]|null $links public property
     */
    public $links;

    /**
     * The phone number lookup response data
     * @var \BandwidthLib\PhoneNumberLookup\Models\CreateAsyncBulkResponseData|null $data public property
     */
    public $data;

    /**
     * Lookup errors
     * @var \BandwidthLib\PhoneNumberLookup\Models\Error[]|null $errors public property
     */
    public $errors;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->links    = func_get_arg(0);
            $this->data     = func_get_arg(1);
            $this->errors   = func_get_arg(2);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['links']  = isset($this->links) ? array_values($this->links) : null;
        $json['data']   = $this->data;
        $json['errors'] = isset($this->errors) ? array_values($this->errors) : null;

        return array_filter($json);
    }
}
