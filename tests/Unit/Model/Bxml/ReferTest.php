<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\NestableVerb;
use Bandwidth\Model\Bxml\Refer;
use Bandwidth\Model\Bxml\SipUri;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use TypeError;

class ReferTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(NestableVerb::class, new Refer());
    }

    public function testAllAttributes(): void
    {
        $refer = new Refer(
            referCompleteUrl: '/complete',
            referCompleteMethod: HttpMethod::POST,
            tag: 'my-tag'
        );

        $this->assertSame(
            '<Refer referCompleteUrl="/complete" referCompleteMethod="POST" tag="my-tag"/>',
            $refer->toBxml()
        );
    }

    public function testWithNestedSipUri(): void
    {
        $refer = new Refer(new SipUri('sip:user@example.com'));

        $this->assertSame(
            '<Refer><SipUri>sip:user@example.com</SipUri></Refer>',
            $refer->toBxml()
        );
    }

    public function testAddVerb(): void
    {
        $refer = new Refer();
        $refer->addVerb(new SipUri('sip:user@example.com'));

        $this->assertSame(
            '<Refer><SipUri>sip:user@example.com</SipUri></Refer>',
            $refer->toBxml()
        );
    }

    public function testRejectsNonSipUri(): void
    {
        $this->expectException(TypeError::class);

        new Refer(new Hangup());
    }

    public function testAddVerbRejectsNonSipUri(): void
    {
        $refer = new Refer();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Refer accepts only SipUri; got Hangup at index 0');

        $refer->addVerb(new Hangup());
    }
}
