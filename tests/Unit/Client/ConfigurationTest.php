<?php
/**
 * ConfigurationTest
 *
 * PHP version 8.1
 *
 * @package  Bandwidth
 * @author   Bandwidth
 * @link     https://developer.bandwidth.com
 */

namespace Bandwidth\Test\Unit\Client;

use Bandwidth\Configuration;

use PHPUnit\Framework\TestCase;

/**
 * ConfigurationTest Class Doc Comment
 *
 * @description Covers OAuth token resolution that short-circuits before an HTTP
 * call, plus the default configuration singleton.
 * @package     Bandwidth
 * @author      Bandwidth
 * @link        https://developer.bandwidth.com
 */
class ConfigurationTest extends TestCase
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
     * A preset access token is returned as-is when no client credentials are set,
     * so the default getter never reaches its HTTP call.
     */
    public function testGetAccessTokenReturnsPresetTokenWithoutClientCredentials()
    {
        $config = (new Configuration())->setAccessToken('preset-token');

        $this->assertEquals('preset-token', $config->getAccessToken());
    }

    /**
     * With nothing configured the default getter falls through to the empty
     * static token rather than attempting a token fetch.
     */
    public function testGetAccessTokenReturnsEmptyStringWhenUnconfigured()
    {
        $this->assertEquals('', (new Configuration())->getAccessToken());
    }

    /**
     * Test that a caller-supplied getter replaces the default OAuth getter.
     */
    public function testSetAccessTokenGetterOverridesDefaultGetter()
    {
        $config = (new Configuration())->setAccessTokenGetter(fn () => 'injected-token');

        $this->assertEquals('injected-token', $config->getAccessToken());
    }

    /**
     * Test that clearing the getter falls back to the static access token.
     */
    public function testNullAccessTokenGetterFallsBackToStaticToken()
    {
        $config = (new Configuration())
            ->setAccessTokenGetter(null)
            ->setAccessToken('static-token');

        $this->assertEquals('static-token', $config->getAccessToken());
    }

    /**
     * Test the default configuration singleton is stable and replaceable.
     */
    public function testDefaultConfigurationSingleton()
    {
        $this->assertSame(
            Configuration::getDefaultConfiguration(),
            Configuration::getDefaultConfiguration()
        );

        $replacement = new Configuration();
        Configuration::setDefaultConfiguration($replacement);

        $this->assertSame($replacement, Configuration::getDefaultConfiguration());
    }
}
