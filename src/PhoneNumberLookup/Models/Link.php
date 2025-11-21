<?php

namespace BandwidthLib\PhoneNumberLookup\Models;

/**
 * Phone Number Lookup Link
 */
class Link implements \JsonSerializable
{
    /**
     * URI of the link.
     * @var string|null $href public property
     */
    public $href;

    /**
     * Specifies the relationship between this link and the resource.
     * @var string|null $rel public property
     */
    public $rel;

    /**
     * HTTP method to be used.
     * @var string|null $method public property
     */
    public $method;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->href     = func_get_arg(0);
            $this->rel      = func_get_arg(1);
            $this->method   = func_get_arg(2);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize(): array
    {
        $json = array();
        $json['href']   = $this->href;
        $json['rel']    = $this->rel;
        $json['method'] = $this->method;

        return array_filter($json);
    }
}
