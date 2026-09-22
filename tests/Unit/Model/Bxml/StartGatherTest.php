<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\StartGather;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class StartGatherTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new StartGather());
    }

    public function testAllAttributes(): void
    {
        $startGather = new StartGather(
            dtmfUrl: '/dtmf',
            dtmfMethod: HttpMethod::POST,
            username: 'user',
            password: 'pass',
            tag: 'my-tag'
        );

        $this->assertSame(
            '<StartGather dtmfUrl="/dtmf" dtmfMethod="POST" username="user" password="pass"'
            . ' tag="my-tag"/>',
            $startGather->toBxml()
        );
    }
}
