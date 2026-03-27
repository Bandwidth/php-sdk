<?php
/**
 * ErrorObject.php
 *
 * Model representing an individual error item in API responses
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class ErrorObject implements \JsonSerializable
{
    /** @var string */
    public $type;
    /** @var string */
    public $description;

    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->type        = func_get_arg(0);
            $this->description = func_get_arg(1);
        }
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['type']        = $this->type;
        $json['description'] = $this->description;

        return array_filter($json);
    }
}
