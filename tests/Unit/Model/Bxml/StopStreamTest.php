<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\StopStream;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class StopStreamTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new StopStream());
    }

    public function testAllAttributes(): void
    {
        $stopStream = new StopStream(
            name: 'my-stream',
            wait: true
        );

        $this->assertSame('<StopStream name="my-stream" wait="true"/>', $stopStream->toBxml());
    }
}
