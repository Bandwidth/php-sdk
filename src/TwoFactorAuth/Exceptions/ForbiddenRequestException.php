<?php

declare(strict_types=1);

/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\TwoFactorAuth\Exceptions;

class ForbiddenRequestException extends \BandwidthLib\Exceptions\ApiException
{
    /**
     * @var string|null
     */
    private $messageProperty;

    /**
     * Returns Message Property.
     *
     * The message containing the reason behind the request being forbidden
     */
    public function getMessageProperty(): ?string
    {
        return $this->messageProperty;
    }

    /**
     * Sets Message Property.
     *
     * The message containing the reason behind the request being forbidden
     *
     * @maps Message
     */
    public function setMessageProperty(?string $messageProperty): void
    {
        $this->messageProperty = $messageProperty;
    }
}
