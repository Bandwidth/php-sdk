<?php
/**
 * BRTCClient.php
 *
 * Client for BRTC (Bandwidth Real-Time Communications) API
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC;

use BandwidthLib\BRTC\Controllers;

class BRTCClient
{
    private $config;
    public function __construct($config)
    {
        $this->config = $config;
    }

    private $client;

    /**
     * Provides access to the BRTC API controller
     * @return Controllers\APIController
     */
    public function getClient()
    {
        if ($this->client == null) {
            $this->client = new Controllers\APIController($this->config);
        }
        return $this->client;
    }
}
