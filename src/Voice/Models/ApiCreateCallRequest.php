<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\Voice\Models;

/**
 * @todo Write general description for this model
 */
class ApiCreateCallRequest implements \JsonSerializable
{
    /**
     * Format is E164
     * @required
     * @var string $from public property
     */
    public $from;

    /**
     * Format is E164 or SIP URI
     * @required
     * @var string $to public property
     */
    public $to;

    /**
     * When calling a SIP URI, this will be sent as the 'User-To-User' header within the initial INVITE. An
     * 'encoding' parameter must be specified as described in https://tools.ietf.org/html/rfc7433. This
     * header cannot exceed 256 characters, including the encoding parameter.
     * @var string|null $uui public property
     */
    public $uui;

    /**
     * @todo Write general description for this property
     * @var double|null $callTimeout public property
     */
    public $callTimeout;

    /**
     * @todo Write general description for this property
     * @var double|null $callbackTimeout public property
     */
    public $callbackTimeout;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $answerUrl public property
     */
    public $answerUrl;

    /**
     * @todo Write general description for this property
     * @var string|null $answerFallbackUrl public property
     */
    public $answerFallbackUrl;

    /**
     * @todo Write general description for this property
     * @var string|null $username public property
     */
    public $username;

    /**
     * @todo Write general description for this property
     * @var string|null $password public property
     */
    public $password;

    /**
     * @todo Write general description for this property
     * @var string|null $fallbackUsername public property
     */
    public $fallbackUsername;

    /**
     * @todo Write general description for this property
     * @var string|null $fallbackPassword public property
     */
    public $fallbackPassword;

    /**
     * @todo Write general description for this property
     * @var string|null $answerMethod public property
     */
    public $answerMethod;

    /**
     * @todo Write general description for this property
     * @var string|null $answerFallbackMethod public property
     */
    public $answerFallbackMethod;

    /**
     * @todo Write general description for this property
     * @var string|null $disconnectUrl public property
     */
    public $disconnectUrl;

    /**
     * @todo Write general description for this property
     * @var string|null $disconnectMethod public property
     */
    public $disconnectMethod;

    /**
     * @todo Write general description for this property
     * @var string|null $tag public property
     */
    public $tag;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $applicationId public property
     */
    public $applicationId;

    /**
     * @todo Write general description for this property
     * @var string|null $obfuscatedTo public property
     */
    public $obfuscatedTo;

    /**
     * @todo Write general description for this property
     * @var string|null $obfuscatedFrom public property
     */
    public $obfuscatedFrom;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (19 == func_num_args()) {
            $this->from                 = func_get_arg(0);
            $this->to                   = func_get_arg(1);
            $this->uui                  = func_get_arg(2);
            $this->callTimeout          = func_get_arg(3);
            $this->callbackTimeout      = func_get_arg(4);
            $this->answerUrl            = func_get_arg(5);
            $this->answerFallbackUrl    = func_get_arg(6);
            $this->username             = func_get_arg(7);
            $this->password             = func_get_arg(8);
            $this->fallbackUsername     = func_get_arg(9);
            $this->fallbackPassword     = func_get_arg(10);
            $this->answerMethod         = func_get_arg(11);
            $this->answerFallbackMethod = func_get_arg(12);
            $this->disconnectUrl        = func_get_arg(13);
            $this->disconnectMethod     = func_get_arg(14);
            $this->tag                  = func_get_arg(15);
            $this->applicationId        = func_get_arg(16);
            $this->obfuscatedTo         = func_get_arg(17);
            $this->obfuscatedFrom       = func_get_arg(18);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['from']                 = $this->from;
        $json['to']                   = $this->to;
        $json['uui']                  = $this->uui;
        $json['callTimeout']          = $this->callTimeout;
        $json['callbackTimeout']      = $this->callbackTimeout;
        $json['answerUrl']            = $this->answerUrl;
        $json['answerFallbackUrl']    = $this->answerFallbackUrl;
        $json['username']             = $this->username;
        $json['password']             = $this->password;
        $json['fallbackUsername']     = $this->fallbackUsername;
        $json['fallbackPassword']     = $this->fallbackPassword;
        $json['answerMethod']         = $this->answerMethod;
        $json['answerFallbackMethod'] = $this->answerFallbackMethod;
        $json['disconnectUrl']        = $this->disconnectUrl;
        $json['disconnectMethod']     = $this->disconnectMethod;
        $json['tag']                  = $this->tag;
        $json['applicationId']        = $this->applicationId;
        $json['obfuscatedTo']         = $this->obfuscatedTo;
        $json['obfuscatedFrom']       = $this->obfuscatedFrom;

        return array_filter($json);
    }
}
