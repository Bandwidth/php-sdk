<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\NestableVerb;
use Bandwidth\Model\Bxml\StartStream;
use Bandwidth\Model\Bxml\StreamMode;
use Bandwidth\Model\Bxml\StreamParam;
use Bandwidth\Model\Bxml\Tracks;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class StartStreamTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(NestableVerb::class, new StartStream());
    }

    public function testAllAttributes(): void
    {
        $startStream = new StartStream(
            name: 'my-stream',
            mode: StreamMode::BIDIRECTIONAL,
            tracks: Tracks::BOTH,
            destination: 'wss://example.com',
            destinationUsername: 'destUser',
            destinationPassword: 'destPass',
            streamEventUrl: '/events',
            streamEventMethod: HttpMethod::POST,
            username: 'user',
            password: 'pass'
        );

        $this->assertSame(
            '<StartStream name="my-stream" mode="bidirectional" tracks="both"'
            . ' destination="wss://example.com" destinationUsername="destUser"'
            . ' destinationPassword="destPass" streamEventUrl="/events"'
            . ' streamEventMethod="POST" username="user" password="pass"/>',
            $startStream->toBxml()
        );
    }

    public function testWithNestedStreamParams(): void
    {
        $startStream = new StartStream([
            new StreamParam(name: 'key1', value: 'val1'),
            new StreamParam(name: 'key2', value: 'val2'),
        ]);

        $this->assertSame(
            '<StartStream><StreamParam name="key1" value="val1"/>'
            . '<StreamParam name="key2" value="val2"/></StartStream>',
            $startStream->toBxml()
        );
    }

    public function testAddVerb(): void
    {
        $startStream = new StartStream();
        $startStream->addVerb(new StreamParam(name: 'key1', value: 'val1'));

        $this->assertSame(
            '<StartStream><StreamParam name="key1" value="val1"/></StartStream>',
            $startStream->toBxml()
        );
    }

    public function testRejectsNonStreamParam(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('StartStream accepts only StreamParam; got Hangup at index 0');

        new StartStream([new Hangup()]);
    }

    public function testAddVerbRejectsNonStreamParam(): void
    {
        $startStream = new StartStream();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('StartStream accepts only StreamParam; got Hangup at index 0');

        $startStream->addVerb(new Hangup());
    }
}
