<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Endpoint;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class EndpointTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Endpoint('endpoint-1'));
    }

    public function testToBxml(): void
    {
        $this->assertSame('<Endpoint>endpoint-1</Endpoint>', (new Endpoint('endpoint-1'))->toBxml());
    }
}
