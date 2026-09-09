<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Bridge;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Bridge('call-1'));
    }

    public function testAllAttributes(): void
    {
        $bridge = new Bridge(
            'call-1',
            bridgeCompleteUrl: '/complete',
            bridgeCompleteMethod: HttpMethod::POST,
            bridgeCompleteFallbackUrl: '/completeFallback',
            bridgeCompleteFallbackMethod: HttpMethod::GET,
            bridgeTargetCompleteUrl: '/targetComplete',
            bridgeTargetCompleteMethod: HttpMethod::POST,
            bridgeTargetCompleteFallbackUrl: '/targetCompleteFallback',
            bridgeTargetCompleteFallbackMethod: HttpMethod::GET,
            username: 'user',
            password: 'pass',
            fallbackUsername: 'fallbackUser',
            fallbackPassword: 'fallbackPass',
            tag: 'my-tag'
        );

        $this->assertSame(
            '<Bridge bridgeCompleteUrl="/complete" bridgeCompleteMethod="POST"'
            . ' bridgeCompleteFallbackUrl="/completeFallback" bridgeCompleteFallbackMethod="GET"'
            . ' bridgeTargetCompleteUrl="/targetComplete" bridgeTargetCompleteMethod="POST"'
            . ' bridgeTargetCompleteFallbackUrl="/targetCompleteFallback"'
            . ' bridgeTargetCompleteFallbackMethod="GET" username="user" password="pass"'
            . ' fallbackUsername="fallbackUser" fallbackPassword="fallbackPass"'
            . ' tag="my-tag">call-1</Bridge>',
            $bridge->toBxml()
        );
    }
}
