<?php

declare(strict_types=1);

/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\Voice\Models;

class Transcript implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $text;

    /**
     * @var float|null
     */
    private $confidence;

    /**
     * Returns Text.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Sets Text.
     *
     * @maps text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * Returns Confidence.
     */
    public function getConfidence(): ?float
    {
        return $this->confidence;
    }

    /**
     * Sets Confidence.
     *
     * @maps confidence
     */
    public function setConfidence(?float $confidence): void
    {
        $this->confidence = $confidence;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['text']       = $this->text;
        $json['confidence'] = $this->confidence;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
