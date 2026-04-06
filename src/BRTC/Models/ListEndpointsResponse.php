<?php
/**
 * ListEndpointsResponse.php
 *
 * Wrapper model for the list endpoints API response,
 * containing links, page, data (array of Endpoints), and errors.
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class ListEndpointsResponse implements \JsonSerializable
{
    /** @var Link[] */
    public $links;
    /** @var Page|null */
    public $page;
    /** @var Endpoints[] */
    public $data;
    /** @var ErrorObject[] */
    public $errors;

    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->links  = func_get_arg(0);
            $this->page   = func_get_arg(1);
            $this->data   = func_get_arg(2);
            $this->errors = func_get_arg(3);
        }
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['links']  = isset($this->links) ? array_values($this->links) : null;
        $json['page']   = $this->page;
        $json['data']   = isset($this->data) ? array_values($this->data) : null;
        $json['errors'] = isset($this->errors) ? array_values($this->errors) : null;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
