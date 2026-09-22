<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\StreamParam;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class StreamParamTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new StreamParam());
    }

    public function testAllAttributes(): void
    {
        $streamParam = new StreamParam(
            name: 'key',
            value: 'val'
        );

        $this->assertSame('<StreamParam name="key" value="val"/>', $streamParam->toBxml());
    }
}
