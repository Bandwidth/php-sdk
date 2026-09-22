<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\OutboundDestination;
use Bandwidth\Model\Bxml\SipUri;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class SipUriTest extends TestCase
{
    public function testInstance(): void
    {
        $verb = new SipUri('sip:user@example.com');

        $this->assertInstanceOf(Verb::class, $verb);
        $this->assertInstanceOf(OutboundDestination::class, $verb);
    }

    public function testAllAttributes(): void
    {
        $sipUri = new SipUri(
            'sip:user@example.com',
            uui: 'abc;encoding=base64',
            transferAnswerUrl: '/answer',
            transferAnswerMethod: HttpMethod::POST,
            transferAnswerFallbackUrl: '/answerFallback',
            transferAnswerFallbackMethod: HttpMethod::GET,
            transferDisconnectUrl: '/disconnect',
            transferDisconnectMethod: HttpMethod::POST,
            username: 'user',
            password: 'pass',
            fallbackUsername: 'fallbackUser',
            fallbackPassword: 'fallbackPass',
            tag: 'my-tag'
        );

        $this->assertSame(
            '<SipUri uui="abc;encoding=base64" transferAnswerUrl="/answer"'
            . ' transferAnswerMethod="POST" transferAnswerFallbackUrl="/answerFallback"'
            . ' transferAnswerFallbackMethod="GET" transferDisconnectUrl="/disconnect"'
            . ' transferDisconnectMethod="POST" username="user" password="pass"'
            . ' fallbackUsername="fallbackUser" fallbackPassword="fallbackPass"'
            . ' tag="my-tag">sip:user@example.com</SipUri>',
            $sipUri->toBxml()
        );
    }
}
