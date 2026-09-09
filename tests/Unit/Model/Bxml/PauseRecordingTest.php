<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\PauseRecording;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class PauseRecordingTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new PauseRecording());
    }

    public function testToBxml(): void
    {
        $this->assertSame('<PauseRecording/>', (new PauseRecording())->toBxml());
    }
}
