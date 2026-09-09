<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\Redirect;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class RedirectTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Redirect());
    }

    public function testAllAttributes(): void
    {
        $redirect = new Redirect(
            redirectUrl: '/next',
            redirectMethod: HttpMethod::POST,
            redirectFallbackUrl: '/fallback',
            redirectFallbackMethod: HttpMethod::GET,
            username: 'user',
            password: 'pass',
            fallbackUsername: 'fallbackUser',
            fallbackPassword: 'fallbackPass',
            tag: 'my-tag'
        );

        $this->assertSame(
            '<Redirect redirectUrl="/next" redirectMethod="POST" redirectFallbackUrl="/fallback"'
            . ' redirectFallbackMethod="GET" username="user" password="pass"'
            . ' fallbackUsername="fallbackUser" fallbackPassword="fallbackPass" tag="my-tag"/>',
            $redirect->toBxml()
        );
    }
}
