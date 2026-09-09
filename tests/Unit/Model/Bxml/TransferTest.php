<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\DiversionReason;
use Bandwidth\Model\Bxml\DiversionTreatment;
use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\NestableVerb;
use Bandwidth\Model\Bxml\PhoneNumber;
use Bandwidth\Model\Bxml\SipUri;
use Bandwidth\Model\Bxml\Transfer;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TransferTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(NestableVerb::class, new Transfer());
    }

    public function testAllAttributes(): void
    {
        $transfer = new Transfer(
            transferCallerId: '+15551234567',
            privacy: true,
            transferCallerDisplayName: 'Support',
            callTimeout: 30.5,
            transferCompleteUrl: '/complete',
            transferCompleteMethod: HttpMethod::POST,
            transferCompleteFallbackUrl: '/completeFallback',
            transferCompleteFallbackMethod: HttpMethod::GET,
            username: 'user',
            password: 'pass',
            fallbackUsername: 'fallbackUser',
            fallbackPassword: 'fallbackPass',
            tag: 'my-tag',
            diversionTreatment: DiversionTreatment::PROPAGATE,
            diversionReason: DiversionReason::NO_ANSWER
        );

        $this->assertSame(
            '<Transfer transferCallerId="+15551234567" privacy="true"'
            . ' transferCallerDisplayName="Support"'
            . ' callTimeout="30.5" transferCompleteUrl="/complete" transferCompleteMethod="POST"'
            . ' transferCompleteFallbackUrl="/completeFallback"'
            . ' transferCompleteFallbackMethod="GET" username="user" password="pass"'
            . ' fallbackUsername="fallbackUser" fallbackPassword="fallbackPass" tag="my-tag"'
            . ' diversionTreatment="propagate" diversionReason="no-answer"/>',
            $transfer->toBxml()
        );
    }

    public function testWithNestedDestinations(): void
    {
        $transfer = new Transfer([
            new PhoneNumber('+15555555555'),
            new SipUri('sip:user@example.com'),
        ]);

        $this->assertSame(
            '<Transfer><PhoneNumber>+15555555555</PhoneNumber>'
            . '<SipUri>sip:user@example.com</SipUri></Transfer>',
            $transfer->toBxml()
        );
    }

    public function testAddVerb(): void
    {
        $transfer = new Transfer();
        $transfer->addVerb(new PhoneNumber('+15555555555'));

        $this->assertSame(
            '<Transfer><PhoneNumber>+15555555555</PhoneNumber></Transfer>',
            $transfer->toBxml()
        );
    }

    public function testRejectsNonDestination(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Transfer accepts only PhoneNumber, SipUri; got Hangup at index 0');

        new Transfer([new Hangup()]);
    }

    public function testAddVerbRejectsNonDestination(): void
    {
        $transfer = new Transfer();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Transfer accepts only PhoneNumber, SipUri; got Hangup at index 0');

        $transfer->addVerb(new Hangup());
    }
}
