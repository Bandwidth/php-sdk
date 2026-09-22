<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\StopTranscription;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class StopTranscriptionTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new StopTranscription());
    }

    public function testAllAttributes(): void
    {
        $stopTranscription = new StopTranscription(name: 'my-transcription');

        $this->assertSame(
            '<StopTranscription name="my-transcription"/>',
            $stopTranscription->toBxml()
        );
    }
}
