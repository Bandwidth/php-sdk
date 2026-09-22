<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\FileFormat;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\Record;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class RecordTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new Record());
    }

    public function testAllAttributes(): void
    {
        $record = new Record(
            recordCompleteUrl: '/complete',
            recordCompleteMethod: HttpMethod::POST,
            recordCompleteFallbackUrl: '/completeFallback',
            recordCompleteFallbackMethod: HttpMethod::GET,
            recordingAvailableUrl: '/available',
            recordingAvailableMethod: HttpMethod::POST,
            transcribe: false,
            detectLanguage: true,
            transcriptionAvailableUrl: '/transcription',
            transcriptionAvailableMethod: HttpMethod::GET,
            username: 'user',
            password: 'pass',
            fallbackUsername: 'fallbackUser',
            fallbackPassword: 'fallbackPass',
            tag: 'my-tag',
            terminatingDigits: '#',
            maxDuration: 120,
            silenceTimeout: 5.5,
            fileFormat: FileFormat::MP3,
            recordingName: 'my-recording'
        );

        $this->assertSame(
            '<Record recordCompleteUrl="/complete" recordCompleteMethod="POST"'
            . ' recordCompleteFallbackUrl="/completeFallback" recordCompleteFallbackMethod="GET"'
            . ' recordingAvailableUrl="/available" recordingAvailableMethod="POST"'
            . ' transcribe="false" detectLanguage="true"'
            . ' transcriptionAvailableUrl="/transcription"'
            . ' transcriptionAvailableMethod="GET" username="user" password="pass"'
            . ' fallbackUsername="fallbackUser" fallbackPassword="fallbackPass" tag="my-tag"'
            . ' terminatingDigits="#" maxDuration="120" silenceTimeout="5.5" fileFormat="mp3"'
            . ' recordingName="my-recording"/>',
            $record->toBxml()
        );
    }
}
