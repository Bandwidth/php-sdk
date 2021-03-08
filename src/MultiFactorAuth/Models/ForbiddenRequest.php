<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\MultiFactorAuth\Models;

/**
 * @todo Write general description for this model
 */
class ForbiddenRequest implements \JsonSerializable
{
    /**
     * The message containing the reason behind the request being forbidden
     * @maps Message
     * @var string|null $message public property
     */
    public $message;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->message = func_get_arg(0);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['Message'] = $this->message;

        return array_filter($json);
    }
}
