<?php
/**
 * Page.php
 *
 * Model for pagination info in list responses
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Models;

class Page implements \JsonSerializable
{
    /** @var int|null */
    public $pageSize;
    /** @var int|null */
    public $totalElements;
    /** @var int|null */
    public $totalPages;
    /** @var int|null */
    public $pageNumber;

    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->pageSize      = func_get_arg(0);
            $this->totalElements = func_get_arg(1);
            $this->totalPages    = func_get_arg(2);
            $this->pageNumber    = func_get_arg(3);
        }
    }

    public function jsonSerialize(): array
    {
        $json = array();
        $json['pageSize']      = $this->pageSize;
        $json['totalElements'] = $this->totalElements;
        $json['totalPages']    = $this->totalPages;
        $json['pageNumber']    = $this->pageNumber;

        return array_filter($json);
    }
}
