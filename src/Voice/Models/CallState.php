<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace BandwidthLib\Voice\Models;

use BandwidthLib\Utils\DateTimeHelper;

/**
 * @todo Write general description for this model
 */
class CallState implements \JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var string|null $callId public property
     */
    public $callId;

    /**
     * @todo Write general description for this property
     * @var string|null $parentCallId public property
     */
    public $parentCallId;

    /**
     * @todo Write general description for this property
     * @var string|null $applicationId public property
     */
    public $applicationId;

    /**
     * @todo Write general description for this property
     * @var string|null $accountId public property
     */
    public $accountId;

    /**
     * @todo Write general description for this property
     * @var string|null $to public property
     */
    public $to;

    /**
     * @todo Write general description for this property
     * @var string|null $from public property
     */
    public $from;

    /**
     * @todo Write general description for this property
     * @var string|null $direction public property
     */
    public $direction;

    /**
     * The current state of the call. Current possible values are 'initiated', 'answered' and
     * 'disconnected'. Additional states may be added in the future, so your application must be tolerant
     * of unknown values.
     * @var string|null $state public property
     */
    public $state;

    /**
     * @todo Write general description for this property
     * @var string|null $identity public property
     */
    public $identity;

    /**
     * @todo Write general description for this property
     * @var array|null $stirShaken public property
     */
    public $stirShaken;

    /**
     * @todo Write general description for this property
     * @factory \BandwidthLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $startTime public property
     */
    public $startTime;

    /**
     * @todo Write general description for this property
     * @factory \BandwidthLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $enqueuedTime public property
     */
    public $enqueuedTime;

    /**
     * @todo Write general description for this property
     * @factory \BandwidthLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $answerTime public property
     */
    public $answerTime;

    /**
     * @todo Write general description for this property
     * @factory \BandwidthLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $endTime public property
     */
    public $endTime;

    /**
     * The reason the call was disconnected, or null if the call is still active. Current values are
     * 'cancel', 'timeout', 'busy', 'rejected', 'hangup', 'invalid-bxml', 'callback-error', 'application-
     * error', 'error', 'account-limit', 'node-capacity-exceeded' and 'unknown'. Additional causes may be
     * added in the future, so your application must be tolerant of unknown values.
     * @var string|null $disconnectCause public property
     */
    public $disconnectCause;

    /**
     * @todo Write general description for this property
     * @var string|null $errorMessage public property
     */
    public $errorMessage;

    /**
     * @todo Write general description for this property
     * @var string|null $errorId public property
     */
    public $errorId;

    /**
     * @todo Write general description for this property
     * @factory \BandwidthLib\Utils\DateTimeHelper::fromRfc3339DateTime
     * @var \DateTime|null $lastUpdate public property
     */
    public $lastUpdate;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (17 == func_num_args()) {
            $this->callId          = func_get_arg(0);
            $this->parentCallId    = func_get_arg(1);
            $this->applicationId   = func_get_arg(2);
            $this->accountId       = func_get_arg(3);
            $this->to              = func_get_arg(4);
            $this->from            = func_get_arg(5);
            $this->direction       = func_get_arg(6);
            $this->state           = func_get_arg(7);
            $this->identity        = func_get_arg(8);
            $this->stirShaken      = func_get_arg(9);
            $this->startTime       = func_get_arg(10);
            $this->enqueuedTime    = func_get_arg(11);
            $this->answerTime      = func_get_arg(12);
            $this->endTime         = func_get_arg(13);
            $this->disconnectCause = func_get_arg(14);
            $this->errorMessage    = func_get_arg(15);
            $this->errorId         = func_get_arg(16);
            $this->lastUpdate      = func_get_arg(17);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['callId']          = $this->callId;
        $json['parentCallId']    = $this->parentCallId;
        $json['applicationId']   = $this->applicationId;
        $json['accountId']       = $this->accountId;
        $json['to']              = $this->to;
        $json['from']            = $this->from;
        $json['direction']       = $this->direction;
        $json['state']           = $this->state;
        $json['identity']        = $this->identity;
        $json['stirShaken']      = $this->stirShaken;
        $json['startTime']       =
            isset($this->startTime) ?
            DateTimeHelper::toRfc3339DateTime($this->startTime) : null;
        $json['enqueuedTime']       =
            isset($this->enqueuedTime) ?
            DateTimeHelper::toRfc3339DateTime($this->enqueuedTime) : null;
        $json['answerTime']      =
            isset($this->answerTime) ?
            DateTimeHelper::toRfc3339DateTime($this->answerTime) : null;
        $json['endTime']         =
            isset($this->endTime) ?
            DateTimeHelper::toRfc3339DateTime($this->endTime) : null;
        $json['disconnectCause'] = $this->disconnectCause;
        $json['errorMessage']    = $this->errorMessage;
        $json['errorId']         = $this->errorId;
        $json['lastUpdate']      =
            isset($this->lastUpdate) ?
            DateTimeHelper::toRfc3339DateTime($this->lastUpdate) : null;

        return array_filter($json);
    }
}
