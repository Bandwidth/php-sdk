<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\StopRecording;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class StopRecordingTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new StopRecording());
    }

    public function testToBxml(): void
    {
        $this->assertSame('<StopRecording/>', (new StopRecording())->toBxml());
    }
}
