<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\DiversionReason;
use Bandwidth\Model\Bxml\DiversionTreatment;
use Bandwidth\Model\Bxml\FileFormat;
use Bandwidth\Model\Bxml\GatherInput;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\StreamMode;
use Bandwidth\Model\Bxml\Tracks;
use PHPUnit\Framework\TestCase;

class EnumTest extends TestCase
{
    public function testHttpMethodValues(): void
    {
        $this->assertSame('GET', HttpMethod::GET->value);
        $this->assertSame('POST', HttpMethod::POST->value);
    }

    public function testTracksValues(): void
    {
        $this->assertSame('inbound', Tracks::INBOUND->value);
        $this->assertSame('outbound', Tracks::OUTBOUND->value);
        $this->assertSame('both', Tracks::BOTH->value);
    }

    public function testGatherInputValues(): void
    {
        $this->assertSame('dtmf', GatherInput::DTMF->value);
        $this->assertSame('speech', GatherInput::SPEECH->value);
        $this->assertSame('dtmf_speech', GatherInput::DTMF_SPEECH->value);
    }

    public function testStreamModeValues(): void
    {
        $this->assertSame('unidirectional', StreamMode::UNIDIRECTIONAL->value);
        $this->assertSame('bidirectional', StreamMode::BIDIRECTIONAL->value);
    }

    public function testFileFormatValues(): void
    {
        $this->assertSame('mp3', FileFormat::MP3->value);
        $this->assertSame('wav', FileFormat::WAV->value);
    }

    public function testDiversionTreatmentValues(): void
    {
        $this->assertSame('none', DiversionTreatment::NONE->value);
        $this->assertSame('propagate', DiversionTreatment::PROPAGATE->value);
        $this->assertSame('stack', DiversionTreatment::STACK->value);
    }

    public function testDiversionReasonValues(): void
    {
        $this->assertSame('unknown', DiversionReason::UNKNOWN->value);
        $this->assertSame('user-busy', DiversionReason::USER_BUSY->value);
        $this->assertSame('no-answer', DiversionReason::NO_ANSWER->value);
        $this->assertSame('unavailable', DiversionReason::UNAVAILABLE->value);
        $this->assertSame('unconditional', DiversionReason::UNCONDITIONAL->value);
        $this->assertSame('time-of-day', DiversionReason::TIME_OF_DAY->value);
        $this->assertSame('do-not-disturb', DiversionReason::DO_NOT_DISTURB->value);
        $this->assertSame('deflection', DiversionReason::DEFLECTION->value);
        $this->assertSame('follow-me', DiversionReason::FOLLOW_ME->value);
        $this->assertSame('out-of-service', DiversionReason::OUT_OF_SERVICE->value);
        $this->assertSame('away', DiversionReason::AWAY->value);
    }
}
