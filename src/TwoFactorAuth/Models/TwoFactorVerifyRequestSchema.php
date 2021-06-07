<?php

declare(strict_types=1);

/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\TwoFactorAuth\Models;

class TwoFactorVerifyRequestSchema implements \JsonSerializable
{
    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $applicationId;

    /**
     * @var string|null
     */
    private $scope;

    /**
     * @var float
     */
    private $expirationTimeInMinutes;

    /**
     * @var string
     */
    private $code;

    /**
     * @param string $to
     * @param string $applicationId
     * @param float $expirationTimeInMinutes
     * @param string $code
     */
    public function __construct(string $to, string $applicationId, float $expirationTimeInMinutes, string $code)
    {
        $this->to = $to;
        $this->applicationId = $applicationId;
        $this->expirationTimeInMinutes = $expirationTimeInMinutes;
        $this->code = $code;
    }

    /**
     * Returns To.
     *
     * The phone number to send the 2fa code to.
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * Sets To.
     *
     * The phone number to send the 2fa code to.
     *
     * @required
     * @maps to
     */
    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    /**
     * Returns Application Id.
     *
     * The application unique ID, obtained from Bandwidth.
     */
    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    /**
     * Sets Application Id.
     *
     * The application unique ID, obtained from Bandwidth.
     *
     * @required
     * @maps applicationId
     */
    public function setApplicationId(string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * Returns Scope.
     *
     * An optional field to denote what scope or action the 2fa code is addressing.  If not supplied,
     * defaults to "2FA".
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * Sets Scope.
     *
     * An optional field to denote what scope or action the 2fa code is addressing.  If not supplied,
     * defaults to "2FA".
     *
     * @maps scope
     */
    public function setScope(?string $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * Returns Expiration Time in Minutes.
     *
     * The time period, in minutes, to validate the 2fa code.  By setting this to 3 minutes, it will mean
     * any code generated within the last 3 minutes are still valid.  The valid range for expiration time
     * is between 0 and 15 minutes, exclusively and inclusively, respectively.
     */
    public function getExpirationTimeInMinutes(): float
    {
        return $this->expirationTimeInMinutes;
    }

    /**
     * Sets Expiration Time in Minutes.
     *
     * The time period, in minutes, to validate the 2fa code.  By setting this to 3 minutes, it will mean
     * any code generated within the last 3 minutes are still valid.  The valid range for expiration time
     * is between 0 and 15 minutes, exclusively and inclusively, respectively.
     *
     * @required
     * @maps expirationTimeInMinutes
     */
    public function setExpirationTimeInMinutes(float $expirationTimeInMinutes): void
    {
        $this->expirationTimeInMinutes = $expirationTimeInMinutes;
    }

    /**
     * Returns Code.
     *
     * The generated 2fa code to check if valid
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Sets Code.
     *
     * The generated 2fa code to check if valid
     *
     * @required
     * @maps code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['to']                      = $this->to;
        $json['applicationId']           = $this->applicationId;
        $json['scope']                   = $this->scope;
        $json['expirationTimeInMinutes'] = $this->expirationTimeInMinutes;
        $json['code']                    = $this->code;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
