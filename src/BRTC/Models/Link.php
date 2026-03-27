<?php
/**
 * Link.php
 *
 * Model representing a link in API responses
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class Link implements \JsonSerializable
{
    /** @var string|null */
    public $rel;
    /** @var string|null */
    public $href;

    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->rel  = func_get_arg(0);
            $this->href = func_get_arg(1);
        }
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['rel']  = $this->rel;
        $json['href'] = $this->href;

        return array_filter($json);
    }
}
