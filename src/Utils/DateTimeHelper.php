<?php

declare(strict_types=1);

/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace BandwidthLib\Utils;

use DateTime;
use DateTimeZone;
use Exception;

class DateTimeHelper
{
    /**
     * Match the pattern for a datetime string in simeple date format
     */
    public const SIMPLE_DATE = 'Y-m-d';

    /**
     * Match the pattern for a datetime string in Rfc1123 format
     */
    public const RFC1123 = 'D, d M Y H:i:s T';

    /**
     * Convert a DateTime object to a string in simple date format
     *
     * @param \DateTime|null $date The DateTime object to convert
     *
     * @return string|null The datetime as a string in simple date format
     */
    public static function toSimpleDate(?DateTime $date): ?string
    {
        if (is_null($date)) {
            return null;
        } elseif ($date instanceof DateTime) {
            return $date->format(DateTimeHelper::SIMPLE_DATE);
        } else {
            throw new Exception('Not a valid DateTime object.');
        }
    }

    /**
     * Convert an array of DateTime objects to an array of strings in simple date format
     *
     * @param array|null $dates The array of DateTime objects to convert
     *
     * @return array|null The array of datetime strings in simple date format
     */
    public static function toSimpleDateArray(?array $dates): ?array
    {
        if (is_null($dates)) {
            return null;
        } else {
            return array_map('static::toSimpleDate', $dates);
        }
    }

    /**
     * Parse a datetime string in simple date format to a DateTime object
     *
     * @param string|null $date A datetime string in simple date format
     *
     * @return \DateTime|null The parsed DateTime object
     */
    public static function fromSimpleDate(?string $date): ?DateTime
    {
        if (is_null($date)) {
            return null;
        } else {
            $x = DateTime::createFromFormat(static::SIMPLE_DATE, $date);

            if ($x instanceof DateTime) {
                return $x;
            } else {
                throw new Exception('Incorrect format.');
            }
        }
    }

    /**
     * Parse an array of datetime strings in simple date format to an array of DateTime objects
     *
     * @param array|null $dates An array of datetime strings in simple date format
     *
     * @return array|null An array of parsed DateTime objects
     */
    public static function fromSimpleDateArray(?array $dates): ?array
    {
        if (is_null($dates)) {
            return null;
        } else {
            return array_map('static::fromSimpleDate', $dates);
        }
    }


    /**
     * Convert a DateTime object to a string in Rfc1123 format
     *
     * @param \DateTime|null $datetime The DateTime object to convert
     *
     * @return string|null The datetime as a string in Rfc1123 format
     */
    public static function toRfc1123DateTime(?DateTime $datetime): ?string
    {
        if (is_null($datetime)) {
            return null;
        } elseif ($datetime instanceof DateTime) {
            return $datetime->setTimeZone(new DateTimeZone('GMT'))->format(static::RFC1123);
        } else {
            throw new Exception('Not a valid DateTime object.');
        }
    }

    /**
     * Convert an array of DateTime objects to an array of strings in Rfc1123 format
     *
     * @param array|null $datetimes The array of DateTime objects to convert
     *
     * @return array|null The array of datetime strings in Rfc1123 format
     */
    public static function toRfc1123DateTimeArray(?array $datetimes): ?array
    {
        if (is_null($datetimes)) {
            return null;
        } else {
            return array_map('static::toRfc1123DateTime', $datetimes);
        }
    }

    /**
     * Parse a datetime string in Rfc1123 format to a DateTime object
     *
     * @param string|null $datetime A datetime string in Rfc1123 format
     *
     * @return \DateTime|null The parsed DateTime object
     */
    public static function fromRfc1123DateTime(?string $datetime): ?DateTime
    {
        if (is_null($datetime)) {
            return null;
        } else {
            $x = DateTime::createFromFormat(DateTime::RFC1123, $datetime);

            if ($x instanceof DateTime) {
                return $x->setTimeZone(new DateTimeZone('GMT'));
            } else {
                throw new Exception('Incorrect format.');
            }
        }
    }

    /**
     * Parse an array of datetime strings in Rfc1123 format to an array of DateTime objects
     *
     * @param array|null $datetimes An array of datetime strings in Rfc1123 format
     *
     * @return array|null An array of parsed DateTime objects
     */
    public static function fromRfc1123DateTimeArray(?array $datetimes): ?array
    {
        if (is_null($datetimes)) {
            return null;
        } else {
            return array_map('static::fromRfc1123DateTime', $datetimes);
        }
    }


    /**
     * Convert a DateTime object to a string in Rfc3339 format
     *
     * @param \DateTime|null $datetime The DateTime object to convert
     *
     * @return string|null The datetime as a string in Rfc3339 format
     */
    public static function toRfc3339DateTime(?DateTime $datetime): ?string
    {
        if (is_null($datetime)) {
            return null;
        } elseif ($datetime instanceof DateTime) {
            return $datetime->setTimeZone(new DateTimeZone('UTC'))->format(DateTime::RFC3339);
        } else {
            throw new Exception('Not a valid DateTime object.');
        }
    }

    /**
     * Convert an array of DateTime objects to an array of strings in Rfc3339 format
     *
     * @param array|null $datetimes The array of DateTime objects to convert
     *
     * @return array|null The array of datetime strings in Rfc3339 format
     */
    public static function toRfc3339DateTimeArray(?array $datetimes): ?array
    {
        if (is_null($datetimes)) {
            return null;
        } else {
            return array_map('static::toRfc3339DateTime', $datetimes);
        }
    }

    /**
     * Parse a datetime string in Rfc3339 format to a DateTime object
     *
     * @param string|null $datetime A datetime string in Rfc3339 format
     *
     * @return \DateTime|null The parsed DateTime object
     */
    public static function fromRfc3339DateTime(?string $datetime): ?DateTime
    {
        if (is_null($datetime)) {
            return null;
        } else {
            // Check for timezone information and append it if missing
            if (!(substr($datetime, strlen($datetime) - 1) == 'Z' || strpos($datetime, '+') !== false)) {
                $datetime .= 'Z';
            }

            $x = DateTime::createFromFormat(DateTime::RFC3339, $datetime);

            if ($x instanceof DateTime) {
                return $x->setTimeZone(new DateTimeZone('UTC'));
            } else {
                $x = DateTime::createFromFormat("Y-m-d\TH:i:s.uP", $datetime); // parse with up to 6 microseconds
                if ($x instanceof DateTime) {
                    return $x->setTimeZone(new DateTimeZone('UTC'));
                } else {
                    $x = DateTime::createFromFormat("Y-m-d\TH:i:s.uuP", $datetime); // parse with up to 12 microseconds
                    if ($x instanceof DateTime) {
                        return $x->setTimeZone(new DateTimeZone('UTC'));
                    } else {
                        throw new Exception('Incorrect format.');
                    }
                }
            }
        }
    }

    /**
     * Parse an array of datetime strings in Rfc3339 format to an array of DateTime objects
     *
     * @param array|null $datetimes An array of datetime strings in Rfc3339 format
     *
     * @return array|null An array of parsed DateTime objects
     */
    public static function fromRfc3339DateTimeArray(?array $datetimes): ?array
    {
        if (is_null($datetimes)) {
            return null;
        } else {
            return array_map('static::fromRfc3339DateTime', $datetimes);
        }
    }


    /**
     * Convert a DateTime object to a Unix Timestamp
     *
     * @param \DateTime|null $datetime The DateTime object to convert
     *
     * @return int|null The converted Unix Timestamp
     */
    public static function toUnixTimestamp(?DateTime $datetime): ?int
    {
        if (is_null($datetime)) {
            return null;
        } elseif ($datetime instanceof DateTime) {
            return $datetime->getTimestamp();
        } else {
            throw new Exception('Not a valid DateTime object.');
        }
    }

    /**
     * Convert an array of DateTime objects to an array of Unix timestamps
     *
     * @param array|null $datetimes The array of DateTime objects to convert
     *
     * @return array|null The array of integers representing date-time in Unix timestamp
     */
    public static function toUnixTimestampArray(?array $datetimes): ?array
    {
        if (is_null($datetimes)) {
            return null;
        } else {
            return array_map('static::toUnixTimestamp', $datetimes);
        }
    }

    /**
     * Parse a Unix Timestamp to a DateTime object
     *
     * @param string|null $datetime The Unix Timestamp
     *
     * @return \DateTime|null The parsed DateTime object
     */
    public static function fromUnixTimestamp(?string $datetime): ?DateTime
    {
        if (is_null($datetime)) {
            return null;
        } else {
            $x = DateTime::createFromFormat("U", $datetime);

            if ($x instanceof DateTime) {
                return $x;
            } else {
                throw new Exception('Incorrect format.');
            }
        }
    }

    /**
     * Parse an array of Unix Timestamps to an array of DateTime objects
     *
     * @param array|null $datetimes An array of Unix Timestamps
     *
     * @return array|null An array of parsed DateTime objects
     */
    public static function fromUnixTimestampArray(?array $datetimes): ?array
    {
        if (is_null($datetimes)) {
            return null;
        } else {
            return array_map('static::fromUnixTimestamp', array_map('strval', $datetimes));
        }
    }
}
