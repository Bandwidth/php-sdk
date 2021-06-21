<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * @todo Write general description for this model
 */
class AccountsTnlookupResponse implements \JsonSerializable
{
    /**
     * The requestId.
     * @var string|null $requestId public property
     */
    public $requestId;

    /**
     * The status of the request.
     * @var string|null $status public property
     */
    public $status;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->requestId = func_get_arg(0);
            $this->status    = func_get_arg(1);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['requestId'] = $this->requestId;
        $json['status']    = $this->status;

        return array_filter($json);
    }
}
