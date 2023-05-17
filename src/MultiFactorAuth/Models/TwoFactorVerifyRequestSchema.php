<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace BandwidthLib\MultiFactorAuth\Models;

/**
 * @todo Write general description for this model
 */
class TwoFactorVerifyRequestSchema implements \JsonSerializable
{
    /**
     * The phone number to send the 2fa code to.
     * @required
     * @var string $to public property
     */
    public $to;

    /**
     * The application unique ID, obtained from Bandwidth.
     * @required
     * @var string $applicationId public property
     */
    public $applicationId;

    /**
     * An optional field to denote what scope or action the 2fa code is addressing.  If not supplied,
     * defaults to "2FA".
     * @var string|null $scope public property
     */
    public $scope;

    /**
     * The time period, in minutes, to validate the 2fa code.  By setting this to 3 minutes, it will mean
     * any code generated within the last 3 minutes are still valid.  The valid range for expiration time
     * is between 0 and 15 minutes, exclusively and inclusively, respectively.
     * @required
     * @var double $expirationTimeInMinutes public property
     */
    public $expirationTimeInMinutes;

    /**
     * The generated 2fa code to check if valid
     * @required
     * @var string $code public property
     */
    public $code;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->to                      = func_get_arg(0);
            $this->applicationId           = func_get_arg(1);
            $this->scope                   = func_get_arg(2);
            $this->expirationTimeInMinutes = func_get_arg(3);
            $this->code                    = func_get_arg(4);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['to']                      = $this->to;
        $json['applicationId']           = $this->applicationId;
        $json['scope']                   = $this->scope;
        $json['expirationTimeInMinutes'] = $this->expirationTimeInMinutes;
        $json['code']                    = $this->code;

        return array_filter($json);
    }
}
