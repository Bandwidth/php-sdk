<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib;

/**
 * All configuration including auth info and base URI for the API access
 * are configured in this class.
 */
class Configuration
{
    /**
     * Timeout to use for endpoint calls
     * @var int
     */
    private $timeout = 0;

    /**
     * The username to use with basic authentication
     * @var string
     */
    private $messagingBasicAuthUserName = 'TODO: Replace';

    /**
     * The password to use with basic authentication
     * @var string
     */
    private $messagingBasicAuthPassword = 'TODO: Replace';

    /**
     * The username to use with basic authentication
     * @var string
     */
    private $twoFactorAuthBasicAuthUserName = 'TODO: Replace';

    /**
     * The password to use with basic authentication
     * @var string
     */
    private $twoFactorAuthBasicAuthPassword = 'TODO: Replace';

    /**
     * The username to use with basic authentication
     * @var string
     */
    private $voiceBasicAuthUserName = 'TODO: Replace';

    /**
     * The password to use with basic authentication
     * @var string
     */
    private $voiceBasicAuthPassword = 'TODO: Replace';

    /**
     * The username to use with basic authentication
     * @var string
     */
    private $webRtcBasicAuthUserName = 'TODO: Replace';

    /**
     * The password to use with basic authentication
     * @var string
     */
    private $webRtcBasicAuthPassword = 'TODO: Replace';

    /**
     * Current API environment
     * @var Environments
     */
    private $environment = Environments::PRODUCTION;

    /**
     * @todo Add description for parameter
     * @var string
     */
    private $baseUrl = 'https://www.example.com';

    public function __construct($configOptions = null)
    {
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }
        if (isset($configOptions['messagingBasicAuthUserName'])) {
            $this->messagingBasicAuthUserName = $configOptions['messagingBasicAuthUserName'];
        }
        if (isset($configOptions['messagingBasicAuthPassword'])) {
            $this->messagingBasicAuthPassword = $configOptions['messagingBasicAuthPassword'];
        }
        if (isset($configOptions['twoFactorAuthBasicAuthUserName'])) {
            $this->twoFactorAuthBasicAuthUserName = $configOptions['twoFactorAuthBasicAuthUserName'];
        }
        if (isset($configOptions['twoFactorAuthBasicAuthPassword'])) {
            $this->twoFactorAuthBasicAuthPassword = $configOptions['twoFactorAuthBasicAuthPassword'];
        }
        if (isset($configOptions['voiceBasicAuthUserName'])) {
            $this->voiceBasicAuthUserName = $configOptions['voiceBasicAuthUserName'];
        }
        if (isset($configOptions['voiceBasicAuthPassword'])) {
            $this->voiceBasicAuthPassword = $configOptions['voiceBasicAuthPassword'];
        }
        if (isset($configOptions['webRtcBasicAuthUserName'])) {
            $this->webRtcBasicAuthUserName = $configOptions['webRtcBasicAuthUserName'];
        }
        if (isset($configOptions['webRtcBasicAuthPassword'])) {
            $this->webRtcBasicAuthPassword = $configOptions['webRtcBasicAuthPassword'];
        }
        if (isset($configOptions['environment'])) {
            $this->environment = $configOptions['environment'];
        }
        if (isset($configOptions['baseUrl'])) {
            $this->baseUrl = $configOptions['baseUrl'];
        }
    }

    public function getConfigurationMap()
    {
        $configMap = array();

        if (isset($this->timeout)) {
            $configMap['timeout'] = $this->timeout;
        }
        if (isset($this->messagingBasicAuthUserName)) {
            $configMap['messagingBasicAuthUserName'] = $this->messagingBasicAuthUserName;
        }
        if (isset($this->messagingBasicAuthPassword)) {
            $configMap['messagingBasicAuthPassword'] = $this->messagingBasicAuthPassword;
        }
        if (isset($this->twoFactorAuthBasicAuthUserName)) {
            $configMap['twoFactorAuthBasicAuthUserName'] = $this->twoFactorAuthBasicAuthUserName;
        }
        if (isset($this->twoFactorAuthBasicAuthPassword)) {
            $configMap['twoFactorAuthBasicAuthPassword'] = $this->twoFactorAuthBasicAuthPassword;
        }
        if (isset($this->voiceBasicAuthUserName)) {
            $configMap['voiceBasicAuthUserName'] = $this->voiceBasicAuthUserName;
        }
        if (isset($this->voiceBasicAuthPassword)) {
            $configMap['voiceBasicAuthPassword'] = $this->voiceBasicAuthPassword;
        }
        if (isset($this->webRtcBasicAuthUserName)) {
            $configMap['webRtcBasicAuthUserName'] = $this->webRtcBasicAuthUserName;
        }
        if (isset($this->webRtcBasicAuthPassword)) {
            $configMap['webRtcBasicAuthPassword'] = $this->webRtcBasicAuthPassword;
        }
        if (isset($this->environment)) {
            $configMap['environment'] = $this->environment;
        }
        if (isset($this->baseUrl)) {
            $configMap['baseUrl'] = $this->baseUrl;
        }

        return $configMap;
    }

    // Getter for timeout
    public function getTimeout()
    {
        return $this->timeout;
    }

    // Getter for messagingBasicAuthUserName
    public function getMessagingBasicAuthUserName()
    {
        return $this->messagingBasicAuthUserName;
    }

    // Getter for messagingBasicAuthPassword
    public function getMessagingBasicAuthPassword()
    {
        return $this->messagingBasicAuthPassword;
    }

    // Getter for twoFactorAuthBasicAuthUserName
    public function getTwoFactorAuthBasicAuthUserName()
    {
        return $this->twoFactorAuthBasicAuthUserName;
    }

    // Getter for twoFactorAuthBasicAuthPassword
    public function getTwoFactorAuthBasicAuthPassword()
    {
        return $this->twoFactorAuthBasicAuthPassword;
    }

    // Getter for voiceBasicAuthUserName
    public function getVoiceBasicAuthUserName()
    {
        return $this->voiceBasicAuthUserName;
    }

    // Getter for voiceBasicAuthPassword
    public function getVoiceBasicAuthPassword()
    {
        return $this->voiceBasicAuthPassword;
    }

    // Getter for webRtcBasicAuthUserName
    public function getWebRtcBasicAuthUserName()
    {
        return $this->webRtcBasicAuthUserName;
    }

    // Getter for webRtcBasicAuthPassword
    public function getWebRtcBasicAuthPassword()
    {
        return $this->webRtcBasicAuthPassword;
    }

    // Getter for environment
    public function getEnvironment()
    {
        return $this->environment;
    }

    // Getter for baseUrl
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * Get the base uri for a given server in the current environment
     * @param  string $server Server name
     * @return string         Base URI
     */
    public function getBaseUri($server = Servers::DEFAULT_)
    {
        return APIHelper::appendUrlWithTemplateParameters(
            static::$environmentsMap[$this->environment][$server],
            array(
                'base_url' => $this->baseUrl,
            ),
            false
        );
    }

    /**
     * A map of all baseurls used in different environments and servers
     * @var array
     */
    private static $environmentsMap = array(
        Environments::PRODUCTION => array(
            Servers::DEFAULT_ => 'api.bandwidth.com',
            Servers::MESSAGINGDEFAULT => 'https://messaging.bandwidth.com/api/v2',
            Servers::TWOFACTORAUTHDEFAULT => 'https://mfa.bandwidth.com/api/v1',
            Servers::VOICEDEFAULT => 'https://voice.bandwidth.com',
            Servers::WEBRTCDEFAULT => 'https://api.webrtc.bandwidth.com/v1',
        ),
        Environments::CUSTOM => array(
            Servers::DEFAULT_ => '{base_url}',
            Servers::MESSAGINGDEFAULT => '{base_url}',
            Servers::TWOFACTORAUTHDEFAULT => '{base_url}',
            Servers::VOICEDEFAULT => '{base_url}',
            Servers::WEBRTCDEFAULT => '{base_url}',
        ),
    );
}
