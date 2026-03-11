<?php
/**
 * Page.php
 *
 * Model for paginated responses
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class Page {
    /** @var int|null */
    public $page;
    /** @var int|null */
    public $size;
    /** @var int|null */
    public $total;
    /** @var int|null */
    public $totalPages;

    public function __construct($page = null, $size = null, $total = null, $totalPages = null) {
        $this->page = $page;
        $this->size = $size;
        $this->total = $total;
        $this->totalPages = $totalPages;
    }
}
