<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Phone Number Lookup Error
 */
class Error implements \JsonSerializable
{
    /**
     * Validation error code
     * @var string|null $code public property
     */
    public $code;

    /**
     * Description of validation error
     * @var string|null $description public property
     */
    public $description;

    /**
     * Type of validation error
     * @var string|null $type public property
     */
    public $type;

    /**
     * Additional meta information about the error
     * @var \BandwidthLib\PhoneNumberLookup\Models\ErrorMeta[]|null $meta public property
     */
    public $meta;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->code         = func_get_arg(0);
            $this->description  = func_get_arg(1);
            $this->type         = func_get_arg(2);
            $this->meta         = func_get_arg(3);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['code']           = $this->code;
        $json['description']    = $this->description;
        $json['type']           = $this->type;
        $json['meta']           = $this->meta;

        return array_filter($json);
    }
}
