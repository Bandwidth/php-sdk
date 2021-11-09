<?php

/**
 * BxmlTest.php
 *
 * A simple php integration test class for BXML
 *
 * @copyright Bandwidth INC
 */

use PHPUnit\Framework\TestCase;

final class BxmlTest extends TestCase
{
    public function testForward() {
        $forward = new BandwidthLib\Voice\Bxml\Forward();
        $forward->to("+18888888888");
        $forward->from("+18889999999");
        $forward->callTimeout(3);
        $forward->diversionTreatment("none");
        $forward->diversionReason("away");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($forward);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Forward to="+18888888888" from="+18889999999" callTimeout="3" diversionTreatment="none" diversionReason="away"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testGatherNoNestedTag() {
        $gather = new BandwidthLib\Voice\Bxml\Gather();
        $gather->gatherUrl("https://test.com");
        $gather->gatherMethod("GET");
        $gather->username("user");
        $gather->password("pass");
        $gather->tag("tag");
        $gather->terminatingDigits("123");
        $gather->maxDigits(3);
        $gather->interDigitTimeout(4);
        $gather->firstDigitTimeout(5);
        $gather->repeatCount(3);
        $gather->gatherFallbackUrl("https://test.com");
        $gather->gatherFallbackMethod("GET");
        $gather->fallbackUsername("fuser");
        $gather->fallbackPassword("fpass");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($gather);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Gather username="user" password="pass" tag="tag" gatherUrl="https://test.com" gatherMethod="GET" terminatingDigits="123" maxDigits="3" interDigitTimeout="4" firstDigitTimeout="5" repeatCount="3" gatherFallbackUrl="https://test.com" gatherFallbackMethod="GET" fallbackUsername="fuser" fallbackPassword="fpass"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testGatherNestedSpeakSentence() {
        $gather = new BandwidthLib\Voice\Bxml\Gather();
        $speakSentence = new BandwidthLib\Voice\Bxml\SpeakSentence("Test");
        $speakSentence->voice("susan");
        $speakSentence->locale("en_US");
        $speakSentence->gender("female");
        $gather = new BandwidthLib\Voice\Bxml\Gather();
        $gather->gatherUrl("https://test.com");
        $gather->gatherMethod("GET");
        $gather->username("user");
        $gather->password("pass");
        $gather->tag("tag");
        $gather->terminatingDigits("123");
        $gather->maxDigits(3);
        $gather->interDigitTimeout(4);
        $gather->firstDigitTimeout(5);
        $gather->speakSentence($speakSentence);
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($gather);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Gather username="user" password="pass" tag="tag" gatherUrl="https://test.com" gatherMethod="GET" terminatingDigits="123" maxDigits="3" interDigitTimeout="4" firstDigitTimeout="5"><SpeakSentence locale="en_US" gender="female" voice="susan">Test</SpeakSentence></Gather></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testGatherNestedPlayAudio() {
        $gather = new BandwidthLib\Voice\Bxml\Gather();
        $playAudio = new BandwidthLib\Voice\Bxml\PlayAudio("https://test.com");
        $playAudio->username("user");
        $playAudio->password("pass");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $gather = new BandwidthLib\Voice\Bxml\Gather();
        $gather->gatherUrl("https://test.com");
        $gather->gatherMethod("GET");
        $gather->username("user");
        $gather->password("pass");
        $gather->tag("tag");
        $gather->terminatingDigits("123");
        $gather->maxDigits(3);
        $gather->interDigitTimeout(4);
        $gather->firstDigitTimeout(5);
        $gather->playAudio($playAudio);
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($gather);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Gather username="user" password="pass" tag="tag" gatherUrl="https://test.com" gatherMethod="GET" terminatingDigits="123" maxDigits="3" interDigitTimeout="4" firstDigitTimeout="5"><PlayAudio username="user" password="pass">https://test.com</PlayAudio></Gather></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testGatherNestedVerbs() {
        $speakSentence1 = new BandwidthLib\Voice\Bxml\SpeakSentence("First Sentence");
        $playAudio1 = new BandwidthLib\Voice\Bxml\PlayAudio("https://audio1.com");
        $playAudio2 = new BandwidthLib\Voice\Bxml\PlayAudio("https://audio2.com");
        $speakSentence2 = new BandwidthLib\Voice\Bxml\SpeakSentence("Second Sentence");

        $gather = new BandwidthLib\Voice\Bxml\Gather();
        $gather->gatherUrl("https://gather.url/nextBXML");
        $gather->speakSentence($speakSentence1);
        $gather->playAudio($playAudio1);
        $gather->playAudio($playAudio2);
        $gather->speakSentence($speakSentence2);

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($gather);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Gather gatherUrl="https://gather.url/nextBXML"><SpeakSentence>First Sentence</SpeakSentence><PlayAudio>https://audio1.com</PlayAudio><PlayAudio>https://audio2.com</PlayAudio><SpeakSentence>Second Sentence</SpeakSentence></Gather></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testHangup() {
        $hangup = new BandwidthLib\Voice\Bxml\Hangup();
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($hangup);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Hangup/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testRedirect() {
        $redirect = new BandwidthLib\Voice\Bxml\Redirect();
        $redirect->username("user");
        $redirect->password("pass");
        $redirect->redirectUrl("https://test.com");
        $redirect->redirectMethod("GET");
        $redirect->tag("tag");
        $redirect->redirectFallbackUrl("https://test2.com");
        $redirect->redirectFallbackMethod("POST");
        $redirect->fallbackUsername("fuser");
        $redirect->fallbackPassword("fpass");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($redirect);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Redirect username="user" password="pass" tag="tag" redirectUrl="https://test.com" redirectMethod="GET" redirectFallbackUrl="https://test2.com" redirectFallbackMethod="POST" fallbackUsername="fuser" fallbackPassword="fpass"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testPause() {
        $pause = new BandwidthLib\Voice\Bxml\Pause();
        $pause->duration("3");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($pause);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Pause duration="3"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testSendDtmf() {
        $sendDtmf = new BandwidthLib\Voice\Bxml\SendDtmf("123");
        $sendDtmf->toneDuration("65");
        $sendDtmf->toneInterval(75);
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($sendDtmf);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><SendDtmf toneDuration="65" toneInterval="75">123</SendDtmf></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testSpeakSentence() {
        $speakSentence = new BandwidthLib\Voice\Bxml\SpeakSentence("Test");
        $speakSentence->voice("susan");
        $speakSentence->locale("en_US");
        $speakSentence->gender("female");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($speakSentence);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><SpeakSentence locale="en_US" gender="female" voice="susan">Test</SpeakSentence></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testSpeakSentenceEncode() {
        $speakSentence = new BandwidthLib\Voice\Bxml\SpeakSentence("These characters cause problems < > &");
        $speakSentence->voice("susan");
        $speakSentence->locale("en_US");
        $speakSentence->gender("female");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($speakSentence);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><SpeakSentence locale="en_US" gender="female" voice="susan">These characters cause problems &lt; &gt; &amp;</SpeakSentence></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testSpeakSentenceSSML() {
        $speakSentence = new BandwidthLib\Voice\Bxml\SpeakSentence('Hello, you have reached the home of <lang xml:lang="es-MX">Antonio Mendoza</lang>.Please leave a message.');
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($speakSentence);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><SpeakSentence>Hello, you have reached the home of <lang xml:lang="es-MX">Antonio Mendoza</lang>.Please leave a message.</SpeakSentence></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testPlayAudio() {
        $playAudio = new BandwidthLib\Voice\Bxml\PlayAudio("https://test.com");
        $playAudio->username("user");
        $playAudio->password("pass");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($playAudio);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><PlayAudio username="user" password="pass">https://test.com</PlayAudio></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testTransfer() {
        $number1 = new BandwidthLib\Voice\Bxml\PhoneNumber("+17777777777");
        $number1->transferAnswerUrl("https://test.com");
        $number1->transferAnswerMethod("GET");
        $number1->username("user");
        $number1->password("pass");
        $number1->tag("tag");
        $number2 = new BandwidthLib\Voice\Bxml\PhoneNumber("+17777777779");
        $number2->transferAnswerUrl("https://test2.com");
        $number2->transferAnswerMethod("GET");
        $number2->username("user2");
        $number2->password("pass2");
        $number2->tag("tag2");
        $number2->transferAnswerFallbackUrl("https://test3.com");
        $number2->transferAnswerFallbackMethod("POST");
        $number2->fallbackUsername("fuser");
        $number2->fallbackPassword("fpass");
        $transfer = new BandwidthLib\Voice\Bxml\Transfer();
        $transfer->transferCallerId("+18999999999");
        $transfer->transferCompleteUrl("https://test.com");
        $transfer->transferCompleteMethod("GET");
        $transfer->username("user");
        $transfer->password("pass");
        $transfer->tag("tag");
        $transfer->callTimeout(3);
        $transfer->diversionTreatment("none");
        $transfer->diversionReason("away");
        $transfer->phoneNumbers(array($number1, $number2));
        $transfer->transferCompleteFallbackUrl("https://test3.com");
        $transfer->transferCompleteFallbackMethod("POST");
        $transfer->fallbackUsername("fusern");
        $transfer->fallbackPassword("fpassw");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($transfer);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Transfer username="user" password="pass" tag="tag" transferCompleteUrl="https://test.com" transferCompleteMethod="GET" transferCallerId="+18999999999" callTimeout="3" diversionTreatment="none" diversionReason="away" transferCompleteFallbackUrl="https://test3.com" transferCompleteFallbackMethod="POST" fallbackUsername="fusern" fallbackPassword="fpassw"><PhoneNumber username="user" password="pass" tag="tag" transferAnswerUrl="https://test.com" transferAnswerMethod="GET">+17777777777</PhoneNumber><PhoneNumber username="user2" password="pass2" tag="tag2" transferAnswerUrl="https://test2.com" transferAnswerMethod="GET" transferAnswerFallbackUrl="https://test3.com" transferAnswerFallbackMethod="POST" fallbackUsername="fuser" fallbackPassword="fpass">+17777777779</PhoneNumber></Transfer></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testPauseRecording() {
        $pauseRecording = new BandwidthLib\Voice\Bxml\PauseRecording();

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($pauseRecording);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><PauseRecording/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testResumeRecording() {
        $resumeRecording = new BandwidthLib\Voice\Bxml\ResumeRecording();

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($resumeRecording);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><ResumeRecording/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testStartRecording() {
        $startRecording = new BandwidthLib\Voice\Bxml\StartRecording();
        $startRecording->tag("tag");
        $startRecording->recordingAvailableUrl("https://myapp.com/noBXML");
        $startRecording->recordingAvailableMethod("POST");
        $startRecording->username("user");
        $startRecording->password("pass");
        $startRecording->fileFormat("wav");
        $startRecording->multiChannel(true);
        $startRecording->transcribe(false);
        $startRecording->transcriptionAvailableUrl("https://available.com");
        $startRecording->transcriptionAvailableMethod("GET");

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($startRecording);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><StartRecording tag="tag" recordingAvailableUrl="https://myapp.com/noBXML" recordingAvailableMethod="POST" username="user" password="pass" fileFormat="wav" multiChannel="true" transcribe="false" transcriptionAvailableUrl="https://available.com" transcriptionAvailableMethod="GET"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testStopRecording() {
        $stopRecording = new BandwidthLib\Voice\Bxml\StopRecording();

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($stopRecording);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><StopRecording/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testRecord() {
        $record = new BandwidthLib\Voice\Bxml\Record();
        $record->recordCompleteUrl("https://myapp.com/nextBXML");
        $record->maxDuration(10);
        $record->recordCompleteFallbackUrl("https://test.com");
        $record->recordCompleteFallbackMethod("GET");
        $record->fallbackUsername("fuser");
        $record->fallbackPassword("fpass");

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($record);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Record recordCompleteUrl="https://myapp.com/nextBXML" maxDuration="10" recordCompleteFallbackUrl="https://test.com" recordCompleteFallbackMethod="GET" fallbackUsername="fuser" fallbackPassword="fpass"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testConference() {
        $conference = new BandwidthLib\Voice\Bxml\Conference("conference-name");
        $conference->mute(true);
        $conference->hold(false);
        $conference->callIdsToCoach("c-abc,c-def");
        $conference->conferenceEventUrl("https://test.com");
        $conference->conferenceEventMethod("GET");
        $conference->username("user");
        $conference->password("pass");
        $conference->tag("tag");
        $conference->conferenceEventFallbackUrl("https://test2.com");
        $conference->conferenceEventFallbackMethod("POST");
        $conference->fallbackUsername("fuser");
        $conference->fallbackPassword("fpass");

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($conference);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Conference username="user" password="pass" tag="tag" mute="true" hold="false" callIdsToCoach="c-abc,c-def" conferenceEventUrl="https://test.com" conferenceEventMethod="GET" conferenceEventFallbackUrl="https://test2.com" conferenceEventFallbackMethod="POST" fallbackUsername="fuser" fallbackPassword="fpass">conference-name</Conference></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testConferenceCallIdsToCoachArray() {
        $conference = new BandwidthLib\Voice\Bxml\Conference("conference-name");
        $conference->callIdsToCoachArray(["c-abc", "c-def"]);

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($conference);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Conference callIdsToCoach="c-abc,c-def">conference-name</Conference></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testBridge() {
        $bridge = new BandwidthLib\Voice\Bxml\Bridge("c-95ac8d6e-1a31c52e-b38f-4198-93c1-51633ec68f8d");
        $bridge->bridgeCompleteUrl("https://test.com");
        $bridge->bridgeCompleteMethod("GET");
        $bridge->bridgeTargetCompleteUrl("https://test2.com");
        $bridge->bridgeTargetCompleteMethod("POST");
        $bridge->username("user");
        $bridge->password("pass");
        $bridge->tag("custom tag");
        $bridge->bridgeCompleteFallbackUrl("https://test3.com");
        $bridge->bridgeCompleteFallbackMethod("GET");
        $bridge->bridgeTargetCompleteFallbackUrl("https://test4.com");
        $bridge->bridgeTargetCompleteFallbackMethod("POST");
        $bridge->fallbackUsername("fuser");
        $bridge->fallbackPassword("fpass");

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($bridge);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Bridge bridgeCompleteUrl="https://test.com" bridgeCompleteMethod="GET" bridgeTargetCompleteUrl="https://test2.com" bridgeTargetCompleteMethod="POST" username="user" password="pass" tag="custom tag" bridgeCompleteFallbackUrl="https://test3.com" bridgeCompleteFallbackMethod="GET" bridgeTargetCompleteFallbackUrl="https://test4.com" bridgeTargetCompleteFallbackMethod="POST" fallbackUsername="fuser" fallbackPassword="fpass">c-95ac8d6e-1a31c52e-b38f-4198-93c1-51633ec68f8d</Bridge></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testRing() {
        $ring = new BandwidthLib\Voice\Bxml\Ring();
        $ring->duration(5);
        $ring->answerCall(false);

        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($ring);

        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><Ring duration="5" answerCall="false"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testStartGather() {
        $startGather = new BandwidthLib\Voice\Bxml\StartGather();
        $startGather->username("user");
        $startGather->password("pass");
        $startGather->dtmfUrl("https://test.com");
        $startGather->dtmfMethod("GET");
        $startGather->tag("custom tag");
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($startGather);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><StartGather username="user" password="pass" tag="custom tag" dtmfUrl="https://test.com" dtmfMethod="GET"/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }

    public function testStopGather() {
        $stopGather = new BandwidthLib\Voice\Bxml\StopGather();
        $response = new BandwidthLib\Voice\Bxml\Response();
        $response->addVerb($stopGather);
        $expectedXml = '<?xml version="1.0" encoding="UTF-8"?><Response><StopGather/></Response>';
        $responseXml = $response->toBxml();
        $this->assertEquals($expectedXml, $responseXml);
    }
}
