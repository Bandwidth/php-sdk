<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\StopGather;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class StopGatherTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new StopGather());
    }

    public function testToBxml(): void
    {
        $this->assertSame('<StopGather/>', (new StopGather())->toBxml());
    }
}
