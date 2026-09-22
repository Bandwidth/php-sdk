<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\AudioProducer;
use Bandwidth\Model\Bxml\PlayAudio;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class PlayAudioTest extends TestCase
{
    public function testInstance(): void
    {
        $verb = new PlayAudio('https://example.com/a.wav');

        $this->assertInstanceOf(Verb::class, $verb);
        $this->assertInstanceOf(AudioProducer::class, $verb);
    }

    public function testAllAttributes(): void
    {
        $playAudio = new PlayAudio(
            'https://example.com/a.wav',
            username: 'user',
            password: 'pass'
        );

        $this->assertSame(
            '<PlayAudio username="user" password="pass">https://example.com/a.wav</PlayAudio>',
            $playAudio->toBxml()
        );
    }

    public function testUrlWithQueryStringIsEscaped(): void
    {
        $playAudio = new PlayAudio('https://example.com/audio.wav?greeting=hi&lang=en');

        $this->assertSame(
            '<PlayAudio>https://example.com/audio.wav?greeting=hi&amp;lang=en</PlayAudio>',
            $playAudio->toBxml()
        );
    }
}
