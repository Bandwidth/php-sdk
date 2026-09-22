<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\AudioProducer;
use Bandwidth\Model\Bxml\Response;
use Bandwidth\Model\Bxml\SpeakSentence;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class SpeakSentenceTest extends TestCase
{
    public function testInstance(): void
    {
        $verb = new SpeakSentence('Hello');

        $this->assertInstanceOf(Verb::class, $verb);
        $this->assertInstanceOf(AudioProducer::class, $verb);
    }

    public function testAllAttributes(): void
    {
        $verb = new SpeakSentence(
            text: 'Hello',
            voice: 'julie',
            gender: 'female',
            locale: 'en_US',
        );

        $this->assertSame(
            '<SpeakSentence voice="julie" gender="female" locale="en_US">Hello</SpeakSentence>',
            $verb->toBxml()
        );
    }

    public function testSsmlIsPreserved(): void
    {
        $verb = new SpeakSentence(
            'Hello <break time="3s"/> your number is'
            . ' <say-as interpret-as="telephone">5555555555</say-as>.'
        );

        $this->assertSame(
            '<SpeakSentence>Hello <break time="3s"/> your number is'
            . ' <say-as interpret-as="telephone">5555555555</say-as>.</SpeakSentence>',
            $verb->toBxml()
        );
    }

    public function testSpecialCharactersAreEscaped(): void
    {
        $verb = new SpeakSentence('Tom & Jerry: x <y and z> w, prices from <100 to 50');

        $this->assertSame(
            '<SpeakSentence>Tom &amp; Jerry: x &lt;y and z&gt; w,'
            . ' prices from &lt;100 to 50</SpeakSentence>',
            $verb->toBxml()
        );
    }

    public function testSsmlInsideResponse(): void
    {
        $response = new Response([new SpeakSentence('Hi <break time="1s"/>', voice: 'julie')]);

        $this->assertSame(
            '<?xml version="1.0" encoding="UTF-8"?>' . "\n"
            . '<Response><SpeakSentence voice="julie">Hi <break time="1s"/></SpeakSentence></Response>',
            $response->toBxml()
        );
    }
}
