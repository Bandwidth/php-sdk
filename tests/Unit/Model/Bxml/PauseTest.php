<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Pause;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class PauseTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Pause());
    }

    public function testAllAttributes(): void
    {
        $pause = new Pause(5.5);

        $this->assertSame('<Pause duration="5.5"/>', $pause->toBxml());
    }
}
