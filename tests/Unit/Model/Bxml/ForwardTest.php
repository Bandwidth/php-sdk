<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\DiversionReason;
use Bandwidth\Model\Bxml\DiversionTreatment;
use Bandwidth\Model\Bxml\Forward;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class ForwardTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Forward());
    }

    public function testAllAttributes(): void
    {
        $forward = new Forward(
            to: '+15555555555',
            from: '+15551234567',
            privacy: true,
            callerDisplayName: 'Anonymous',
            callTimeout: 30.5,
            diversionTreatment: DiversionTreatment::STACK,
            diversionReason: DiversionReason::USER_BUSY,
            uui: 'abc;encoding=base64'
        );

        $this->assertSame(
            '<Forward to="+15555555555" from="+15551234567" privacy="true"'
            . ' callerDisplayName="Anonymous" callTimeout="30.5"'
            . ' diversionTreatment="stack" diversionReason="user-busy"'
            . ' uui="abc;encoding=base64"/>',
            $forward->toBxml()
        );
    }
}
