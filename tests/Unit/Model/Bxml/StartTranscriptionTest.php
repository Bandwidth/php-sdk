<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\CustomParam;
use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\NestableVerb;
use Bandwidth\Model\Bxml\StartTranscription;
use Bandwidth\Model\Bxml\Tracks;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class StartTranscriptionTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(NestableVerb::class, new StartTranscription());
    }

    public function testAllAttributes(): void
    {
        $startTranscription = new StartTranscription(
            name: 'my-transcription',
            tracks: Tracks::INBOUND,
            transcriptionEventUrl: '/events',
            transcriptionEventMethod: HttpMethod::POST,
            username: 'user',
            password: 'pass',
            destination: 'wss://example.com',
            stabilized: false,
            detectLanguage: false,
            preferredLanguages: 'en-US,fr-FR'
        );

        $this->assertSame(
            '<StartTranscription name="my-transcription" tracks="inbound"'
            . ' transcriptionEventUrl="/events" transcriptionEventMethod="POST" username="user"'
            . ' password="pass" destination="wss://example.com" stabilized="false"'
            . ' detectLanguage="false" preferredLanguages="en-US,fr-FR"/>',
            $startTranscription->toBxml()
        );
    }

    public function testWithNestedCustomParams(): void
    {
        $startTranscription = new StartTranscription([
            new CustomParam(name: 'key1', value: 'val1'),
            new CustomParam(name: 'key2', value: 'val2'),
        ]);

        $this->assertSame(
            '<StartTranscription><CustomParam name="key1" value="val1"/>'
            . '<CustomParam name="key2" value="val2"/></StartTranscription>',
            $startTranscription->toBxml()
        );
    }

    public function testAddVerb(): void
    {
        $startTranscription = new StartTranscription();
        $startTranscription->addVerb(new CustomParam(name: 'key1', value: 'val1'));

        $this->assertSame(
            '<StartTranscription><CustomParam name="key1" value="val1"/></StartTranscription>',
            $startTranscription->toBxml()
        );
    }

    public function testRejectsNonCustomParam(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('StartTranscription accepts only CustomParam; got Hangup at index 0');

        new StartTranscription([new Hangup()]);
    }

    public function testAddVerbRejectsNonCustomParam(): void
    {
        $startTranscription = new StartTranscription();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('StartTranscription accepts only CustomParam; got Hangup at index 0');

        $startTranscription->addVerb(new Hangup());
    }
}
