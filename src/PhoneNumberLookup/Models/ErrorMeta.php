<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Phone Number Lookup Error Metadata
 */
class ErrorMeta implements \JsonSerializable
{
    /**
     * Affected phone numbers
     * @var string[]|null $phoneNumbers public property
     */
    public $phoneNumbers;

    /**
     * Message describing the error
     * @var string|null $message public property
     */
    public $message;

    /**
     * Error code associated with the message
     * @var integer|null $code public property
     */
    public $code;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->phoneNumbers = func_get_arg(0);
            $this->message      = func_get_arg(1);
            $this->code         = func_get_arg(2);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['phoneNumbers']   = isset($this->phoneNumbers) ? array_values($this->phoneNumbers) : null;
        $json['message']        = $this->message;
        $json['code']           = $this->code;

        return array_filter($json);
    }
}
