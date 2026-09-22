<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Connect;
use Bandwidth\Model\Bxml\Endpoint;
use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\NestableVerb;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ConnectTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(NestableVerb::class, new Connect());
    }

    public function testAllAttributes(): void
    {
        $connect = new Connect(
            eventCallbackUrl: '/events',
            eventFallbackUrl: '/eventsFallback'
        );

        $this->assertSame(
            '<Connect eventCallbackUrl="/events" eventFallbackUrl="/eventsFallback"/>',
            $connect->toBxml()
        );
    }

    public function testWithNestedEndpoints(): void
    {
        $connect = new Connect([
            new Endpoint('endpoint-1'),
            new Endpoint('endpoint-2'),
        ]);

        $this->assertSame(
            '<Connect><Endpoint>endpoint-1</Endpoint><Endpoint>endpoint-2</Endpoint></Connect>',
            $connect->toBxml()
        );
    }

    public function testAddVerb(): void
    {
        $connect = new Connect();
        $connect->addVerb(new Endpoint('endpoint-1'));

        $this->assertSame(
            '<Connect><Endpoint>endpoint-1</Endpoint></Connect>',
            $connect->toBxml()
        );
    }

    public function testRejectsNonEndpoint(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Connect accepts only Endpoint; got Hangup at index 0');

        new Connect([new Hangup()]);
    }

    public function testAddVerbRejectsNonEndpoint(): void
    {
        $connect = new Connect();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Connect accepts only Endpoint; got Hangup at index 0');

        $connect->addVerb(new Hangup());
    }
}
