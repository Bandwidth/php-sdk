<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Ring;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class RingTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Ring());
    }

    public function testAllAttributes(): void
    {
        $ring = new Ring(
            duration: 5.5,
            answerCall: false
        );

        $this->assertSame('<Ring duration="5.5" answerCall="false"/>', $ring->toBxml());
    }
}
