<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\CustomParam;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class CustomParamTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new CustomParam());
    }

    public function testAllAttributes(): void
    {
        $customParam = new CustomParam(
            name: 'key',
            value: 'val'
        );

        $this->assertSame('<CustomParam name="key" value="val"/>', $customParam->toBxml());
    }
}
