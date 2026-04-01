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
    public $id;
    /** @var string */
    public $type;
    /** @var string */
    public $description;
    /** @var string */
    public $code;
    /** @var ErrorSource|null */
    public $source;

    public function __construct()
    {
        if (5 == func_num_args()) {
            $this->id          = func_get_arg(0);
            $this->type        = func_get_arg(1);
            $this->description = func_get_arg(2);
            $this->code        = func_get_arg(3);
            $this->source      = func_get_arg(4);
        }
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['id']          = $this->id;
        $json['type']        = $this->type;
        $json['description'] = $this->description;
        $json['code']        = $this->code;
        $json['source']      = $this->source;

        return array_filter($json);
    }
}
