<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\OutboundDestination;
use Bandwidth\Model\Bxml\PhoneNumber;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{
    public function testInstance(): void
    {
        $verb = new PhoneNumber('+15555555555');

        $this->assertInstanceOf(Verb::class, $verb);
        $this->assertInstanceOf(OutboundDestination::class, $verb);
    }

    public function testAllAttributes(): void
    {
        $phoneNumber = new PhoneNumber(
            '+15555555555',
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
            tag: 'my-tag',
            uui: 'abc;encoding=base64'
        );

        $this->assertSame(
            '<PhoneNumber transferAnswerUrl="/answer" transferAnswerMethod="POST"'
            . ' transferAnswerFallbackUrl="/answerFallback" transferAnswerFallbackMethod="GET"'
            . ' transferDisconnectUrl="/disconnect" transferDisconnectMethod="POST"'
            . ' username="user" password="pass" fallbackUsername="fallbackUser"'
            . ' fallbackPassword="fallbackPass" tag="my-tag"'
            . ' uui="abc;encoding=base64">+15555555555</PhoneNumber>',
            $phoneNumber->toBxml()
        );
    }
}
