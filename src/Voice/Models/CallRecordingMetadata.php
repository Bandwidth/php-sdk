<?php

declare(strict_types=1);

/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\Voice\Models;

use BandwidthLib\Utils\DateTimeHelper;

class CallRecordingMetadata implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $applicationId;

    /**
     * @var string|null
     */
    private $accountId;

    /**
     * @var string|null
     */
    private $callId;

    /**
     * @var string|null
     */
    private $parentCallId;

    /**
     * @var string|null
     */
    private $recordingId;

    /**
     * @var string|null
     */
    private $to;

    /**
     * @var string|null
     */
    private $from;

    /**
     * @var string|null
     */
    private $transferCallerId;

    /**
     * @var string|null
     */
    private $transferTo;

    /**
     * @var string|null
     */
    private $duration;

    /**
     * @var string|null
     */
    private $direction;

    /**
     * @var int|null
     */
    private $channels;

    /**
     * @var \DateTime|null
     */
    private $startTime;

    /**
     * @var \DateTime|null
     */
    private $endTime;

    /**
     * @var string|null
     */
    private $fileFormat;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $mediaUrl;

    /**
     * @var TranscriptionMetadata|null
     */
    private $transcription;

    /**
     * Returns Application Id.
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * Sets Application Id.
     *
     * @maps applicationId
     */
    public function setApplicationId(?string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    /**
     * Returns Account Id.
     */
    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    /**
     * Sets Account Id.
     *
     * @maps accountId
     */
    public function setAccountId(?string $accountId): void
    {
        $this->accountId = $accountId;
    }

    /**
     * Returns Call Id.
     */
    public function getCallId(): ?string
    {
        return $this->callId;
    }

    /**
     * Sets Call Id.
     *
     * @maps callId
     */
    public function setCallId(?string $callId): void
    {
        $this->callId = $callId;
    }

    /**
     * Returns Parent Call Id.
     */
    public function getParentCallId(): ?string
    {
        return $this->parentCallId;
    }

    /**
     * Sets Parent Call Id.
     *
     * @maps parentCallId
     */
    public function setParentCallId(?string $parentCallId): void
    {
        $this->parentCallId = $parentCallId;
    }

    /**
     * Returns Recording Id.
     */
    public function getRecordingId(): ?string
    {
        return $this->recordingId;
    }

    /**
     * Sets Recording Id.
     *
     * @maps recordingId
     */
    public function setRecordingId(?string $recordingId): void
    {
        $this->recordingId = $recordingId;
    }

    /**
     * Returns To.
     */
    public function getTo(): ?string
    {
        return $this->to;
    }

    /**
     * Sets To.
     *
     * @maps to
     */
    public function setTo(?string $to): void
    {
        $this->to = $to;
    }

    /**
     * Returns From.
     */
    public function getFrom(): ?string
    {
        return $this->from;
    }

    /**
     * Sets From.
     *
     * @maps from
     */
    public function setFrom(?string $from): void
    {
        $this->from = $from;
    }

    /**
     * Returns Transfer Caller Id.
     */
    public function getTransferCallerId(): ?string
    {
        return $this->transferCallerId;
    }

    /**
     * Sets Transfer Caller Id.
     *
     * @maps transferCallerId
     */
    public function setTransferCallerId(?string $transferCallerId): void
    {
        $this->transferCallerId = $transferCallerId;
    }

    /**
     * Returns Transfer To.
     */
    public function getTransferTo(): ?string
    {
        return $this->transferTo;
    }

    /**
     * Sets Transfer To.
     *
     * @maps transferTo
     */
    public function setTransferTo(?string $transferTo): void
    {
        $this->transferTo = $transferTo;
    }

    /**
     * Returns Duration.
     *
     * Format is ISO-8601
     */
    public function getDuration(): ?string
    {
        return $this->duration;
    }

    /**
     * Sets Duration.
     *
     * Format is ISO-8601
     *
     * @maps duration
     */
    public function setDuration(?string $duration): void
    {
        $this->duration = $duration;
    }

    /**
     * Returns Direction.
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * Sets Direction.
     *
     * @maps direction
     */
    public function setDirection(?string $direction): void
    {
        $this->direction = $direction;
    }

    /**
     * Returns Channels.
     */
    public function getChannels(): ?int
    {
        return $this->channels;
    }

    /**
     * Sets Channels.
     *
     * @maps channels
     */
    public function setChannels(?int $channels): void
    {
        $this->channels = $channels;
    }

    /**
     * Returns Start Time.
     */
    public function getStartTime(): ?\DateTime
    {
        return $this->startTime;
    }

    /**
     * Sets Start Time.
     *
     * @maps startTime
     * @factory \BandwidthLib\Utils\DateTimeHelper::fromRfc3339DateTime
     */
    public function setStartTime(?\DateTime $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * Returns End Time.
     */
    public function getEndTime(): ?\DateTime
    {
        return $this->endTime;
    }

    /**
     * Sets End Time.
     *
     * @maps endTime
     * @factory \BandwidthLib\Utils\DateTimeHelper::fromRfc3339DateTime
     */
    public function setEndTime(?\DateTime $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * Returns File Format.
     */
    public function getFileFormat(): ?string
    {
        return $this->fileFormat;
    }

    /**
     * Sets File Format.
     *
     * @maps fileFormat
     */
    public function setFileFormat(?string $fileFormat): void
    {
        $this->fileFormat = $fileFormat;
    }

    /**
     * Returns Status.
     *
     * The current status of the recording. Current values are 'processing', 'partial', 'complete',
     * 'deleted' and 'error'. Additional states may be added in the future, so your application must be
     * tolerant of unknown values.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The current status of the recording. Current values are 'processing', 'partial', 'complete',
     * 'deleted' and 'error'. Additional states may be added in the future, so your application must be
     * tolerant of unknown values.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Media Url.
     */
    public function getMediaUrl(): ?string
    {
        return $this->mediaUrl;
    }

    /**
     * Sets Media Url.
     *
     * @maps mediaUrl
     */
    public function setMediaUrl(?string $mediaUrl): void
    {
        $this->mediaUrl = $mediaUrl;
    }

    /**
     * Returns Transcription.
     */
    public function getTranscription(): ?TranscriptionMetadata
    {
        return $this->transcription;
    }

    /**
     * Sets Transcription.
     *
     * @maps transcription
     */
    public function setTranscription(?TranscriptionMetadata $transcription): void
    {
        $this->transcription = $transcription;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['applicationId']    = $this->applicationId;
        $json['accountId']        = $this->accountId;
        $json['callId']           = $this->callId;
        $json['parentCallId']     = $this->parentCallId;
        $json['recordingId']      = $this->recordingId;
        $json['to']               = $this->to;
        $json['from']             = $this->from;
        $json['transferCallerId'] = $this->transferCallerId;
        $json['transferTo']       = $this->transferTo;
        $json['duration']         = $this->duration;
        $json['direction']        = $this->direction;
        $json['channels']         = $this->channels;
        $json['startTime']        =
            isset($this->startTime) ?
            DateTimeHelper::toRfc3339DateTime($this->startTime) : null;
        $json['endTime']          =
            isset($this->endTime) ?
            DateTimeHelper::toRfc3339DateTime($this->endTime) : null;
        $json['fileFormat']       = $this->fileFormat;
        $json['status']           = $this->status;
        $json['mediaUrl']         = $this->mediaUrl;
        $json['transcription']    = $this->transcription;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
