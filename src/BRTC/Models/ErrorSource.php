<?php
/**
 * ErrorSource.php
 *
 * Model representing the source of an error in API responses
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class ErrorSource implements \JsonSerializable
{
    /** @var string|null */
    public $parameter;
    /** @var string|null */
    public $field;
    /** @var string|null */
    public $header;
    /** @var string|null */
    public $reference;

    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->parameter = func_get_arg(0);
            $this->field     = func_get_arg(1);
            $this->header    = func_get_arg(2);
            $this->reference = func_get_arg(3);
        }
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['parameter'] = $this->parameter;
        $json['field']     = $this->field;
        $json['header']    = $this->header;
        $json['reference'] = $this->reference;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
