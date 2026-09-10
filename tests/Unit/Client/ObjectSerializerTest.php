<?php
/**
 * ObjectSerializerTest
 *
 * PHP version 8.1
 *
 * @package  Bandwidth
 * @author   Bandwidth
 * @link     https://developer.bandwidth.com
 */

namespace Bandwidth\Test\Unit\Client;

use Bandwidth\Configuration;
use Bandwidth\Model\ReferCallStatusEnum;
use Bandwidth\ObjectSerializer;
use DateTime;

use PHPUnit\Framework\TestCase;

/**
 * ObjectSerializerTest Class Doc Comment
 *
 * @description Covers the serializer branches the prism-backed API tests cannot
 * reach, since those only ever exchange valid, well-formed payloads.
 * @package     Bandwidth
 * @author      Bandwidth
 * @link        https://developer.bandwidth.com
 */
class ObjectSerializerTest extends TestCase
{
    private Configuration $originalDefault;

    protected function setUp(): void
    {
        $this->originalDefault = Configuration::getDefaultConfiguration();
    }

    protected function tearDown(): void
    {
        Configuration::setDefaultConfiguration($this->originalDefault);
    }

    /**
     * Test "sanitizeFilename"
     *
     * @dataProvider sanitizeFilenameProvider
     */
    public function testSanitizeFilename(string $filename, string $expected)
    {
        $this->assertEquals($expected, ObjectSerializer::sanitizeFilename($filename));
    }

    public static function sanitizeFilenameProvider(): array
    {
        return [
            'unix traversal' => ['../../sun.gif', 'sun.gif'],
            'windows path' => ['C:\\tmp\\bw.png', 'bw.png'],
            'bare filename' => ['bw.png', 'bw.png'],
        ];
    }

    /**
     * Test "sanitizeTimestamp" truncates sub-microsecond precision.
     */
    public function testSanitizeTimestampTruncatesToSixDigits()
    {
        $this->assertEquals(
            '2024-01-01T00:00:00.123456Z',
            ObjectSerializer::sanitizeTimestamp('2024-01-01T00:00:00.1234567890Z')
        );
    }

    /**
     * Test "convertBoolToQueryStringFormat" reads the default configuration.
     *
     * @dataProvider convertBoolProvider
     */
    public function testConvertBoolToQueryStringFormat(string $format, int|string $expected)
    {
        Configuration::setDefaultConfiguration(
            (new Configuration())->setBooleanFormatForQueryString($format)
        );

        $this->assertSame($expected, ObjectSerializer::convertBoolToQueryStringFormat(true));
    }

    public static function convertBoolProvider(): array
    {
        return [
            'int format' => [Configuration::BOOLEAN_FORMAT_INT, 1],
            'string format' => [Configuration::BOOLEAN_FORMAT_STRING, 'true'],
        ];
    }

    /**
     * Test "deserialize" for an associative array, whose inner type is parsed
     * out of the type string.
     */
    public function testDeserializeAssociativeArray()
    {
        $this->assertEquals(
            ['x-test-header' => 'value'],
            ObjectSerializer::deserialize(['x-test-header' => 'value'], 'array<string,string>')
        );
    }

    /**
     * An empty date-time string means a missing value, not the current time.
     */
    public function testDeserializeEmptyDateTimeReturnsNull()
    {
        $this->assertNull(ObjectSerializer::deserialize('', '\DateTime'));
    }

    /**
     * Test that an unknown enum value is rejected.
     */
    public function testDeserializeRejectsUnknownEnumValue()
    {
        $this->expectException(\InvalidArgumentException::class);

        ObjectSerializer::deserialize('nonsense', ReferCallStatusEnum::class);
    }

    /**
     * Test that a date-only format drops the time component.
     */
    public function testSanitizeForSerializationHonorsDateFormat()
    {
        $this->assertEquals(
            '2024-01-01',
            ObjectSerializer::sanitizeForSerialization(
                new DateTime('2024-01-01T12:34:56+00:00'),
                '\DateTime',
                'date'
            )
        );
    }
}
