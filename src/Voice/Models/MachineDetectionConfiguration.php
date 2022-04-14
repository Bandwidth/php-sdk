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
class MachineDetectionConfiguration implements \JsonSerializable
{
    /**
     * The machine detection mode. If set to 'async', the detection result will be sent in a
     * 'machineDetectionComplete' callback. If set to 'sync', the 'answer' callback will wait for the
     * machine detection to complete and will include its result. Default is 'async'.
     * @var string|null $mode public property
     */
    public $mode;

    /**
     * Total amount of time (in seconds) before giving up.
     * @var double|null $detectionTimeout public property
     */
    public $detectionTimeout;

    /**
     * If no speech is detected in this period, a callback with a 'silence' result is sent. Default is 10
     * seconds.
     * @var double|null $silenceTimeout public property
     */
    public $silenceTimeout;

    /**
     * When speech has ended and a result couldn't be determined based on the audio content itself, this
     * value is used to determine if the speaker is a machine based on the speech duration. If the length
     * of the speech detected is greater than or equal to this threshold, the result will be 'answering-
     * machine'. If the length of speech detected is below this threshold, the result will be 'human'.
     * Default is 10 seconds.
     * @var double|null $speechThreshold public property
     */
    public $speechThreshold;

    /**
     * Amount of silence (in seconds) before assuming the callee has finished speaking.
     * @var double|null $speechEndThreshold public property
     */
    public $speechEndThreshold;

    /**
     * If set to 'true' and if an answering machine is detected, the 'answering-machine' callback will be
     * delayed until the machine is done speaking or until the 'detectionTimeout' is exceeded. If false,
     * the 'answering-machine' result is sent immediately. Default is 'false'.
     * @var bool|null $delayResult public property
     */
    public $delayResult;

    /**
     * The URL to send the 'machineDetectionComplete' callback when the detection is completed. Only for
     * 'async' mode.
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
     * @var string|null $fallbackUrl public property
     */
    public $fallbackUrl;

    /**
     * @todo Write general description for this property
     * @var string|null $fallbackMethod public property
     */
    public $fallbackMethod;

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
     * When an answering machine is detected, the amount of silence (in seconds) 
     * before assuming the message has finished playing.
     * @var double|null $machineSpeechEndThreshold public property
     */
    public $machineSpeechEndThreshold;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (15 == func_num_args()) {
            $this->mode                         = func_get_arg(0);
            $this->detectionTimeout             = func_get_arg(1);
            $this->silenceTimeout               = func_get_arg(2);
            $this->speechThreshold              = func_get_arg(3);
            $this->speechEndThreshold           = func_get_arg(4);
            $this->delayResult                  = func_get_arg(5);
            $this->callbackUrl                  = func_get_arg(6);
            $this->callbackMethod               = func_get_arg(7);
            $this->fallbackUrl                  = func_get_arg(8);
            $this->fallbackMethod               = func_get_arg(9);
            $this->username                     = func_get_arg(10);
            $this->password                     = func_get_arg(11);
            $this->fallbackUsername             = func_get_arg(12);
            $this->fallbackPassword             = func_get_arg(13);
            $this->machineSpeechEndThreshold    = func_get_arg(14);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['mode']                       = $this->mode;
        $json['detectionTimeout']           = $this->detectionTimeout;
        $json['silenceTimeout']             = $this->silenceTimeout;
        $json['speechThreshold']            = $this->speechThreshold;
        $json['speechEndThreshold']         = $this->speechEndThreshold;
        $json['delayResult']                = $this->delayResult;
        $json['callbackUrl']                = $this->callbackUrl;
        $json['callbackMethod']             = $this->callbackMethod;
        $json['fallbackUrl']                = $this->fallbackUrl;
        $json['fallbackMethod']             = $this->fallbackMethod;
        $json['username']                   = $this->username;
        $json['password']                   = $this->password;
        $json['fallbackUsername']           = $this->fallbackUsername;
        $json['fallbackPassword']           = $this->fallbackPassword;
        $json['machineSpeechEndThreshold']  = $this->machineSpeechEndThreshold;

        return array_filter($json);
    }
}
