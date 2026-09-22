<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Gather;
use Bandwidth\Model\Bxml\GatherInput;
use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\NestableVerb;
use Bandwidth\Model\Bxml\PlayAudio;
use Bandwidth\Model\Bxml\SpeakSentence;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GatherTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(NestableVerb::class, new Gather());
    }

    public function testAllAttributes(): void
    {
        $gather = new Gather(
            gatherUrl: '/gather',
            gatherMethod: HttpMethod::POST,
            gatherFallbackUrl: '/fallback',
            gatherFallbackMethod: HttpMethod::GET,
            username: 'user',
            password: 'pass',
            fallbackUsername: 'fbuser',
            fallbackPassword: 'fbpass',
            tag: 'my-tag',
            terminatingDigits: '#',
            maxDigits: 5,
            interDigitTimeout: 3.5,
            firstDigitTimeout: 5.5,
            repeatCount: 2,
            input: GatherInput::DTMF_SPEECH,
            hints: 'yes, no',
            language: 'en-US',
            partialResultCallback: '/partial',
            partialResultCallbackMethod: HttpMethod::POST,
            profanityFilter: false,
            speechModel: 'default',
            speechTimeout: 10,
        );

        $this->assertSame(
            '<Gather gatherUrl="/gather" gatherMethod="POST" gatherFallbackUrl="/fallback"'
            . ' gatherFallbackMethod="GET" username="user" password="pass"'
            . ' fallbackUsername="fbuser" fallbackPassword="fbpass" tag="my-tag"'
            . ' terminatingDigits="#" maxDigits="5" interDigitTimeout="3.5"'
            . ' firstDigitTimeout="5.5" repeatCount="2" input="dtmf_speech" hints="yes, no"'
            . ' language="en-US" partialResultCallback="/partial"'
            . ' partialResultCallbackMethod="POST" profanityFilter="false" speechModel="default"'
            . ' speechTimeout="10"/>',
            $gather->toBxml()
        );
    }

    public function testWithNestedAudioVerbs(): void
    {
        $gather = new Gather([
            new SpeakSentence('Press 1'),
            new PlayAudio('https://example.com/a.wav'),
        ]);

        $this->assertSame(
            '<Gather><SpeakSentence>Press 1</SpeakSentence>'
            . '<PlayAudio>https://example.com/a.wav</PlayAudio></Gather>',
            $gather->toBxml()
        );
    }

    public function testAddVerb(): void
    {
        $gather = new Gather();
        $gather->addVerb(new SpeakSentence('Press 1'));

        $this->assertSame(
            '<Gather><SpeakSentence>Press 1</SpeakSentence></Gather>',
            $gather->toBxml()
        );
    }

    public function testRejectsNonAudioVerb(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Gather accepts only SpeakSentence, PlayAudio; got Hangup at index 1');

        new Gather([new SpeakSentence('Press 1'), new Hangup()]);
    }

    public function testAddVerbRejectsNonAudioVerb(): void
    {
        $gather = new Gather();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Gather accepts only SpeakSentence, PlayAudio; got Hangup at index 0');

        $gather->addVerb(new Hangup());
    }
}
