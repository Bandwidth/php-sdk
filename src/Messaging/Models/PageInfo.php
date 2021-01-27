<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\Messaging\Models;

/**
 * @todo Write general description for this model
 */
class PageInfo implements \JsonSerializable
{
    /**
     * The link to the previous page for pagination
     * @var string|null $prevPage public property
     */
    public $prevPage;

    /**
     * The link to the next page for pagination
     * @var string|null $nextPage public property
     */
    public $nextPage;

    /**
     * The isolated pagination token for the previous page
     * @var string|null $prevPageToken public property
     */
    public $prevPageToken;

    /**
     * The isolated pagination token for the next page
     * @var string|null $nextPageToken public property
     */
    public $nextPageToken;

    /**
     * Constructor to set initial or default values of member properties
     */
    public function __construct()
    {
        if (4 == func_num_args()) {
            $this->prevPage      = func_get_arg(0);
            $this->nextPage      = func_get_arg(1);
            $this->prevPageToken = func_get_arg(2);
            $this->nextPageToken = func_get_arg(3);
        }
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['prevPage']      = $this->prevPage;
        $json['nextPage']      = $this->nextPage;
        $json['prevPageToken'] = $this->prevPageToken;
        $json['nextPageToken'] = $this->nextPageToken;

        return array_filter($json);
    }
}
