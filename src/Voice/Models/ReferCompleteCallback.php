<?php
/*
 * BandwidthLib
 *
 * This file was manually added to support the Refer BXML verb.
 */

namespace BandwidthLib\Voice\Models;

/**
 * This object represents fields included in callbacks related to refer complete events.
 * Fired when the REFER flow completes (success or failure), only if referCompleteUrl is set.
 */
class ReferCompleteCallback implements \JsonSerializable
{
    /**
     * The event type of the callback. Always "referComplete".
     * @var string|null $eventType public property
     */
    public $eventType;

    /**
     * The time the event occurred, in ISO 8601 format.
     * @var string|null $eventTime public property
     */
    public $eventTime;

    /**
     * The user's Bandwidth account ID.
     * @var string|null $accountId public property
     */
    public $accountId;

    /**
     * The ID of the application associated with the call.
     * @var string|null $applicationId public property
     */
    public $applicationId;

    /**
     * The phone number that received the call, in E.164 format.
     * @var string|null $from public property
     */
    public $from;

    /**
     * The phone number that made the call, in E.164 format.
     * @var string|null $to public property
     */
    public $to;

    /**
     * The direction of the call. Always "inbound" for refer events.
     * @var string|null $direction public property
     */
    public $direction;

    /**
     * The unique ID of the call.
     * @var string|null $callId public property
     */
    public $callId;

    /**
     * The full URL of the call resource.
     * @var string|null $callUrl public property
     */
    public $callUrl;

    /**
     * The time the call started, in ISO 8601 format.
     * @var string|null $startTime public property
     */
    public $startTime;

    /**
     * The time the call was answered, in ISO 8601 format.
     * @var string|null $answerTime public property
     */
    public $answerTime;

    /**
     * The outcome of the REFER operation. Either "success" or "failure".
     * @var string|null $referCallStatus public property
     */
    public $referCallStatus;

    /**
     * The SIP response code for the REFER request (e.g. 202, 405).
     * Absent when the REFER was not sent. Present on both success and failure.
     * @var int|null $referSipResponseCode public property
     */
    public $referSipResponseCode;

    /**
     * The SIP response code from the NOTIFY (e.g. 200, 404, 486).
     * Absent on REFER rejection or NOTIFY timeout.
     * @var int|null $notifySipResponseCode public property
     */
    public $notifySipResponseCode;

    /**
     * A custom string provided in the Refer BXML tag, if any.
     * @var string|null $tag public property
     */
    public $tag;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (15 == func_num_args()) {
            $this->eventType             = func_get_arg(0);
            $this->eventTime             = func_get_arg(1);
            $this->accountId             = func_get_arg(2);
            $this->applicationId         = func_get_arg(3);
            $this->from                  = func_get_arg(4);
            $this->to                    = func_get_arg(5);
            $this->direction             = func_get_arg(6);
            $this->callId                = func_get_arg(7);
            $this->callUrl               = func_get_arg(8);
            $this->startTime             = func_get_arg(9);
            $this->answerTime            = func_get_arg(10);
            $this->referCallStatus       = func_get_arg(11);
            $this->referSipResponseCode  = func_get_arg(12);
            $this->notifySipResponseCode = func_get_arg(13);
            $this->tag                   = func_get_arg(14);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['eventType']             = $this->eventType;
        $json['eventTime']             = $this->eventTime;
        $json['accountId']             = $this->accountId;
        $json['applicationId']         = $this->applicationId;
        $json['from']                  = $this->from;
        $json['to']                    = $this->to;
        $json['direction']             = $this->direction;
        $json['callId']                = $this->callId;
        $json['callUrl']               = $this->callUrl;
        $json['startTime']             = $this->startTime;
        $json['answerTime']            = $this->answerTime;
        $json['referCallStatus']       = $this->referCallStatus;
        $json['referSipResponseCode']  = $this->referSipResponseCode;
        $json['notifySipResponseCode'] = $this->notifySipResponseCode;
        $json['tag']                   = $this->tag;

        return array_filter($json);
    }
}
