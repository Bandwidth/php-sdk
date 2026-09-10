<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class HangupTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Hangup());
    }

    public function testToBxml(): void
    {
        $this->assertSame('<Hangup/>', (new Hangup())->toBxml());
    }
}
