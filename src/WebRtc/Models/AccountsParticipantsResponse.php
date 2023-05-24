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
class AccountsParticipantsResponse implements \JsonSerializable
{
    /**
     * A participant object
     * @var \BandwidthLib\WebRtc\Models\Participant|null $participant public property
     */
    public $participant;

    /**
     * Auth token for the returned participant
     *
     * This should be passed to the participant so that they can connect to the platform
     * @var string|null $token public property
     */
    public $token;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->participant = func_get_arg(0);
            $this->token       = func_get_arg(1);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['participant'] = $this->participant;
        $json['token']       = $this->token;

        return array_filter($json);
    }
}
