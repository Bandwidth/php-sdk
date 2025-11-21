<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Phone Number Carrier Information
 */
class LookupResult implements \JsonSerializable
{
    /**
     * The telephone number in E.164 format.
     * @var string|null $phoneNumber public property
     */
    public $phoneNumber;

    /**
     * Line Type. Enum Values Are: "FIXED" "VOIP-FIXED" "MOBILE" "VOIP"
     * @var string|null $lineType public property
     */
    public $lineType;

    /**
     * Messaging Provider Name
     * @var string|null $messagingProvider public property
     */
    public $messagingProvider;

    /**
     * Voice Provider Name
     * @var string|null $voiceProvider public property
     */
    public $voiceProvider;

    /**
     * The country code of the telephone number in ISO 3166-1 alpha-3 format.
     * @var string|null $countryCodeA3 public property
     */
    public $countryCodeA3;

    /**
     * The carrier that reported a deactivation event for this phone number (if applicable).
     * @var string|null $deactivationReporter public property
     */
    public $deactivationReporter;

    /**
     * The datetime the carrier reported a deactivation event (if applicable).
     * @var string|null $deactivationDate public property
     */
    public $deactivationDate;

    /**
     * "DEACTIVATED" if the carrier reported a deactivation event for this phone number.
     * @var string|null $deactivationEvent public property
     */
    public $deactivationEvent;

    /**
     * The latest message delivery status for this phone number.
     * Enum Values Are: "ACTIVE" "DEACTIVATED" "UNKNOWN"
     * @var string|null $latestMessageDeliveryStatus public property
     */
    public $latestMessageDeliveryStatus;

    /**
     * The date the phone number entered the status described in latestMessageDeliveryStatus
     * @var \DateTime|null $initialMessageDeliveryStatusDate public property
     */
    public $initialMessageDeliveryStatusDate;

    /**
     * The date bandwidth last received delivery status information for this phone number.
     * @var \DateTime|null $latestMessageDeliveryStatusDate public property
     */
    public $latestMessageDeliveryStatusDate;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->phoneNumber                      = func_get_arg(0);
            $this->lineType                         = func_get_arg(1);
            $this->messagingProvider                = func_get_arg(2);
            $this->voiceProvider                    = func_get_arg(3);
            $this->countryCodeA3                    = func_get_arg(4);
            $this->deactivationReporter             = func_get_arg(5);
            $this->deactivationDate                 = func_get_arg(6);
            $this->deactivationEvent                = func_get_arg(7);
            $this->latestMessageDeliveryStatus      = func_get_arg(8);
            $this->initialMessageDeliveryStatusDate = func_get_arg(9);
            $this->latestMessageDeliveryStatusDate  = func_get_arg(10);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['phoneNumber']                      = $this->phoneNumber;
        $json['lineType']                         = $this->lineType;
        $json['messagingProvider']                = $this->messagingProvider;
        $json['voiceProvider']                    = $this->voiceProvider;
        $json['countryCodeA3']                    = $this->countryCodeA3;
        $json['deactivationReporter']             = $this->deactivationReporter;
        $json['deactivationDate']                 = $this->deactivationDate;
        $json['deactivationEvent']                = $this->deactivationEvent;
        $json['latestMessageDeliveryStatus']      = $this->latestMessageDeliveryStatus;
        $json['initialMessageDeliveryStatusDate'] = isset($this->initialMessageDeliveryStatusDate) ?
            DateTimeHelper::toRfc3339DateTime($this->initialMessageDeliveryStatusDate) : null;
        $json['latestMessageDeliveryStatusDate']  = isset($this->latestMessageDeliveryStatusDate) ?
            DateTimeHelper::toRfc3339DateTime($this->latestMessageDeliveryStatusDate) : null;

        return array_filter($json);
    }
}
