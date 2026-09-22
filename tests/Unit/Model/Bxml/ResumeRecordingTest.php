<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\ResumeRecording;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class ResumeRecordingTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new ResumeRecording());
    }

    public function testToBxml(): void
    {
        $this->assertSame('<ResumeRecording/>', (new ResumeRecording())->toBxml());
    }
}
