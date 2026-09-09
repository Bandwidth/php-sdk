<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Bxml;
use Bandwidth\Model\Bxml\Gather;
use Bandwidth\Model\Bxml\Hangup;
use Bandwidth\Model\Bxml\Pause;
use Bandwidth\Model\Bxml\Response;
use Bandwidth\Model\Bxml\Root;
use Bandwidth\Model\Bxml\SpeakSentence;
use PHPUnit\Framework\TestCase;

class RootTest extends TestCase
{
    private const DECLARATION = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

    public function testInstance(): void
    {
        $this->assertInstanceOf(Root::class, new Response());
        $this->assertInstanceOf(Root::class, new Bxml());
    }

    public function testEmpty(): void
    {
        $this->assertSame(self::DECLARATION . '<Response/>', (new Response())->toBxml());
        $this->assertSame(self::DECLARATION . '<Bxml/>', (new Bxml())->toBxml());
    }

    public function testConstructorWithVerbs(): void
    {
        $response = new Response([new Hangup()]);

        $this->assertSame(
            self::DECLARATION . '<Response><Hangup/></Response>',
            $response->toBxml()
        );
    }

    public function testAddVerb(): void
    {
        $response = new Response();
        $response->addVerb(new Pause(duration: 3));
        $response->addVerb(new SpeakSentence('Goodbye'), new Hangup());

        $this->assertSame(
            self::DECLARATION . '<Response><Pause duration="3"/>'
            . '<SpeakSentence>Goodbye</SpeakSentence><Hangup/></Response>',
            $response->toBxml()
        );
    }

    public function testNestedVerbs(): void
    {
        $response = new Response([
            new Gather([new SpeakSentence('Press 1')], gatherUrl: '/gather'),
            new Hangup(),
        ]);

        $this->assertSame(
            self::DECLARATION . '<Response><Gather gatherUrl="/gather">'
            . '<SpeakSentence>Press 1</SpeakSentence></Gather><Hangup/></Response>',
            $response->toBxml()
        );
    }
}
