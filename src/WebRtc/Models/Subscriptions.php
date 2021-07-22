<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace BandwidthLib\WebRtc\Models;

/**
 * @todo Write general description for this model
 */
class Subscriptions implements \JsonSerializable
{
    /**
     * Session the subscriptions are associated with
     *
     * If this is the only field, the subscriber will be subscribed to all participants in the session
     * (including any participants that are later added to the session)
     * @required
     * @var string $sessionId public property
     */
    public $sessionId;

    /**
     * Subset of participants to subscribe to in the session. Optional.
     * @var \BandwidthLib\WebRtc\Models\ParticipantSubscription[]|null $participants public property
     */
    public $participants;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->sessionId    = func_get_arg(0);
            $this->participants = func_get_arg(1);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['sessionId']    = $this->sessionId;
        $json['participants'] = isset($this->participants) ?
            array_values($this->participants) : null;

        return array_filter($json);
    }
}
