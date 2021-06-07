<?php

declare(strict_types=1);

/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\Voice;

use BandwidthLib\Voice\Controllers;

/**
 * BandwidthLib client class
 */
class VoiceClient
{
    private $client;
    private $config;

    public function __construct(\BandwidthLib\ConfigurationInterface $config)
    {
        $this->config = $config;
    }

    /**
     * Returns API Controller
     */
    public function getAPIController(): Controllers\APIController
    {
        if ($this->client == null) {
            $this->client = new Controllers\APIController($this->config);
        }
        return $this->client;
    }
}
