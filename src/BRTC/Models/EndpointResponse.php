<?php
/**
 * EndpointResponse.php
 *
 * Wrapper model for the get endpoint API response,
 * containing links, data (Endpoint), and errors.
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class EndpointResponse implements \JsonSerializable
{
    /** @var Link[] */
    public $links;
    /** @var Endpoint */
    public $data;
    /** @var ErrorObject[] */
    public $errors;

    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->links  = func_get_arg(0);
            $this->data   = func_get_arg(1);
            $this->errors = func_get_arg(2);
        }
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['links']  = isset($this->links) ? array_values($this->links) : null;
        $json['data']   = $this->data;
        $json['errors'] = isset($this->errors) ? array_values($this->errors) : null;

        return array_filter($json);
    }
}
