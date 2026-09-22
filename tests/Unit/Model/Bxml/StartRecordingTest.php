<?php

namespace Bandwidth\Test\Unit\Model\Bxml;

use Bandwidth\Model\Bxml\FileFormat;
use Bandwidth\Model\Bxml\HttpMethod;
use Bandwidth\Model\Bxml\StartRecording;
use Bandwidth\Model\Bxml\Verb;
use PHPUnit\Framework\TestCase;

class StartRecordingTest extends TestCase
{
    public function testInstance(): void
    {
        $this->assertInstanceOf(Verb::class, new StartRecording());
    }

    public function testAllAttributes(): void
    {
        $startRecording = new StartRecording(
            recordingAvailableUrl: '/available',
            recordingAvailableMethod: HttpMethod::POST,
            transcribe: false,
            detectLanguage: true,
            transcriptionAvailableUrl: '/transcription',
            transcriptionAvailableMethod: HttpMethod::GET,
            username: 'user',
            password: 'pass',
            tag: 'my-tag',
            fileFormat: FileFormat::WAV,
            multiChannel: true,
            recordingName: 'my-recording'
        );

        $this->assertSame(
            '<StartRecording recordingAvailableUrl="/available" recordingAvailableMethod="POST"'
            . ' transcribe="false" detectLanguage="true"'
            . ' transcriptionAvailableUrl="/transcription"'
            . ' transcriptionAvailableMethod="GET" username="user" password="pass" tag="my-tag"'
            . ' fileFormat="wav" multiChannel="true" recordingName="my-recording"/>',
            $startRecording->toBxml()
        );
    }
}
