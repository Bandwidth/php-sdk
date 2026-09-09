<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\SendDtmf;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class SendDtmfTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new SendDtmf('123'));
    }

    public function testAllAttributes(): void
    {
        $sendDtmf = new SendDtmf(
            '123',
            toneDuration: 200,
            toneInterval: 400
        );

        $this->assertSame(
            '<SendDtmf toneDuration="200" toneInterval="400">123</SendDtmf>',
            $sendDtmf->toBxml()
        );
    }
}
