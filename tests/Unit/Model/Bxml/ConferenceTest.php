<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\Conference;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class ConferenceTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Conference('my-conference'));
    }

    public function testAllAttributes(): void
    {
        $conference = new Conference(
            'my-conference',
            mute: true,
            hold: false,
            callIdsToCoach: 'call-1,call-2',
            conferenceEventUrl: '/event',
            conferenceEventMethod: HttpMethod::POST,
            conferenceEventFallbackUrl: '/eventFallback',
            conferenceEventFallbackMethod: HttpMethod::GET,
            username: 'user',
            password: 'pass',
            fallbackUsername: 'fallbackUser',
            fallbackPassword: 'fallbackPass',
            tag: 'my-tag',
            callbackTimeout: 12.5
        );

        $this->assertSame(
            '<Conference mute="true" hold="false" callIdsToCoach="call-1,call-2"'
            . ' conferenceEventUrl="/event" conferenceEventMethod="POST"'
            . ' conferenceEventFallbackUrl="/eventFallback" conferenceEventFallbackMethod="GET"'
            . ' username="user" password="pass" fallbackUsername="fallbackUser"'
            . ' fallbackPassword="fallbackPass" tag="my-tag"'
            . ' callbackTimeout="12.5">my-conference</Conference>',
            $conference->toBxml()
        );
    }
}
