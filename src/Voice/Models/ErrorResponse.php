<?php
/**
 * ErrorResponse.php
 *
 * Model for standardized error responses
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Models;

class ErrorResponse {
    /** @var string|null */
    public $message;
    /** @var string|null */
    public $code;
    /** @var array|null */
    public $details;

    public function __construct($message = null, $code = null, $details = null) {
        $this->message = $message;
        $this->code = $code;
        $this->details = $details;
    }
}
