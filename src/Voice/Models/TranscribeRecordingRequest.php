<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace BandwidthLib\Voice\Models;

/**
 * @todo Write general description for this model
 */
class TranscribeRecordingRequest implements \JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var string|null $callbackUrl public property
     */
    public $callbackUrl;

    /**
     * @todo Write general description for this property
     * @var string|null $callbackMethod public property
     */
    public $callbackMethod;

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
     * @var string|null $tag public property
     */
    public $tag;

    /**
     * @todo Write general description for this property
     * @var double|null $callbackTimeout public property
     */
    public $callbackTimeout;

    /**
     * @todo Write general description for this property
     * @var boolean|null $detectLanguage public property
     */
    public $detectLanguage;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->callbackUrl     = func_get_arg(0);
            $this->callbackMethod  = func_get_arg(1);
            $this->username        = func_get_arg(2);
            $this->password        = func_get_arg(3);
            $this->tag             = func_get_arg(4);
            $this->callbackTimeout = func_get_arg(5);
            $this->detectLanguage  = func_get_arg(6);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['callbackUrl']     = $this->callbackUrl;
        $json['callbackMethod']  = $this->callbackMethod;
        $json['username']        = $this->username;
        $json['password']        = $this->password;
        $json['tag']             = $this->tag;
        $json['callbackTimeout'] = $this->callbackTimeout;
        $json['detectLanguage']  = $this->detectlanguage;

        return array_filter($json);
    }
}
