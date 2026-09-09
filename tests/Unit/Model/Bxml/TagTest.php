<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Tag;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Tag('my-tag'));
    }

    public function testToBxml(): void
    {
        $this->assertSame('<Tag>my-tag</Tag>', (new Tag('my-tag'))->toBxml());
    }
}
