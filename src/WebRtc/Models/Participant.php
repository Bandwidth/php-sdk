<?php

declare(strict_types=1);

/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\WebRtc\Models;

/**
 * A participant object
 */
class Participant implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $callbackUrl;

    /**
     * @var string[]|null
     */
    private $publishPermissions;

    /**
     * @var string[]|null
     */
    private $sessions;

    /**
     * @var Subscriptions|null
     */
    private $subscriptions;

    /**
     * @var string|null
     */
    private $tag;

    /**
     * @var string|null
     */
    private $deviceApiVersion;

    /**
     * Returns Id.
     *
     * Unique id of the participant
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * Unique id of the participant
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Callback Url.
     *
     * Full callback url to use for notifications about this participant
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }

    /**
     * Sets Callback Url.
     *
     * Full callback url to use for notifications about this participant
     *
     * @maps callbackUrl
     */
    public function setCallbackUrl(?string $callbackUrl): void
    {
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * Returns Publish Permissions.
     *
     * Defines if this participant can publish audio or video
     *
     * @return string[]|null
     */
    public function getPublishPermissions(): ?array
    {
        return $this->publishPermissions;
    }

    /**
     * Sets Publish Permissions.
     *
     * Defines if this participant can publish audio or video
     *
     * @maps publishPermissions
     *
     * @param string[]|null $publishPermissions
     */
    public function setPublishPermissions(?array $publishPermissions): void
    {
        $this->publishPermissions = $publishPermissions;
    }

    /**
     * Returns Sessions.
     *
     * List of session ids this participant is associated with
     *
     * Capped to one
     *
     * @return string[]|null
     */
    public function getSessions(): ?array
    {
        return $this->sessions;
    }

    /**
     * Sets Sessions.
     *
     * List of session ids this participant is associated with
     *
     * Capped to one
     *
     * @maps sessions
     *
     * @param string[]|null $sessions
     */
    public function setSessions(?array $sessions): void
    {
        $this->sessions = $sessions;
    }

    /**
     * Returns Subscriptions.
     */
    public function getSubscriptions(): ?Subscriptions
    {
        return $this->subscriptions;
    }

    /**
     * Sets Subscriptions.
     *
     * @maps subscriptions
     */
    public function setSubscriptions(?Subscriptions $subscriptions): void
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * Returns Tag.
     *
     * User defined tag to associate with the participant
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * Sets Tag.
     *
     * User defined tag to associate with the participant
     *
     * @maps tag
     */
    public function setTag(?string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * Returns Device Api Version.
     *
     * Optional field to define the device api version of this participant
     */
    public function getDeviceApiVersion(): ?string
    {
        return $this->deviceApiVersion;
    }

    /**
     * Sets Device Api Version.
     *
     * Optional field to define the device api version of this participant
     *
     * @maps deviceApiVersion
     */
    public function setDeviceApiVersion(?string $deviceApiVersion): void
    {
        $this->deviceApiVersion = $deviceApiVersion;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                 = $this->id;
        $json['callbackUrl']        = $this->callbackUrl;
        $json['publishPermissions'] = $this->publishPermissions;
        $json['sessions']           = $this->sessions;
        $json['subscriptions']      = $this->subscriptions;
        $json['tag']                = $this->tag;
        $json['deviceApiVersion']   = $this->deviceApiVersion;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
