<?php

/**
 * ApiTest.php
 *
 * A simple php integration test class for API requests and responses
 *
 * @copyright Bandwidth INC
 */

use PHPUnit\Framework\TestCase;

final class ApiTest extends TestCase
{
    protected $bandwidthClient;

    protected function setUp(): void {
        $config = new BandwidthLib\Configuration(
            array(
                'messagingBasicAuthUserName' => getenv("BW_USERNAME"),
                'messagingBasicAuthPassword' => getenv("BW_PASSWORD"),
                'voiceBasicAuthUserName' => getenv("BW_USERNAME"),
                'voiceBasicAuthPassword' => getenv("BW_PASSWORD"),
                'multiFactorAuthBasicAuthUserName' => getenv("BW_USERNAME"),
                'multiFactorAuthBasicAuthPassword' => getenv("BW_PASSWORD"),
                'phoneNumberLookupBasicAuthUserName' => getenv("BW_USERNAME"),
                'phoneNumberLookupBasicAuthPassword' => getenv("BW_PASSWORD")
            )
        );
        $this->bandwidthClient = new BandwidthLib\BandwidthClient($config);
    }

    public function testCreateMessage() {
        $body = new BandwidthLib\Messaging\Models\MessageRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = [getenv("USER_NUMBER")];
        $body->applicationId = getenv("BW_MESSAGING_APPLICATION_ID");
        $body->text = "PHP Monitoring";

        $response = $this->bandwidthClient->getMessaging()->getClient()->createMessage(getenv("BW_ACCOUNT_ID"), $body);

        $this->assertTrue(strlen($response->getResult()->id) > 0); //validate that _some_ id was returned
    }

    public function testCreateMessageInvalidPhoneNumber() {
        $body = new BandwidthLib\Messaging\Models\MessageRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = ["+1invalid"];
        $body->applicationId = getenv("BW_MESSAGING_APPLICATION_ID");
        $body->text = "PHP Monitoring";

        try {
            $this->bandwidthClient->getMessaging()->getClient()->createMessage(getenv("BW_ACCOUNT_ID"), $body);
            //workaround to make sure that if the above error is not raised, the build will fail
            $this->assertTrue(false);
        } catch (BandwidthLib\Messaging\Exceptions\MessagingException $e) {
            $this->assertTrue(strlen($e->description) > 0);
        }
    }

    public function testUploadDownloadMedia() {
        //constants
        $mediaId = "text-media-id-" . uniqid();
        $content = "Hello world";
        
        //media upload
        $this->bandwidthClient->getMessaging()->getClient()->uploadMedia(getenv("BW_ACCOUNT_ID"), $mediaId, $content);

        //media download
        $downloadedContent = $this->bandwidthClient->getMessaging()->getClient()->getMedia(getenv("BW_ACCOUNT_ID"), $mediaId)->getResult();

        //media delete
        $this->bandwidthClient->getMessaging()->getClient()->deleteMedia(getenv("BW_ACCOUNT_ID"), $mediaId);

        //validate that response is the same
        $this->assertEquals($downloadedContent, $content);
    }

    public function testCreateCallAndGetCallState() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = getenv("USER_NUMBER");
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("BASE_CALLBACK_URL");
        $response = $this->bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
        $callId = $response->getResult()->callId;
        $this->assertTrue(strlen($callId) > 0);
        $this->assertTrue(is_a($response->getResult()->enqueuedTime, 'DateTime'));

        sleep(1);

        //get phone call information
        $response = $this->bandwidthClient->getVoice()->getClient()->getCall(getenv("BW_ACCOUNT_ID"), $callId);
        $this->assertTrue(strlen($response->getResult()->state) > 0);
        $this->assertTrue(is_a($response->getResult()->enqueuedTime, 'DateTime'));

    }

    public function testCreateCallWithAmdAndGetCallState() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $machineDetection = new BandwidthLib\Voice\Models\MachineDetectionConfiguration();

        $machineDetection->mode = BandwidthLib\Voice\Models\ModeEnum::ASYNC;
        $machineDetection->detectionTimeout = 5.0;
        $machineDetection->silenceTimeout = 5.0;
        $machineDetection->speechThreshold = 5.0;
        $machineDetection->speechEndThreshold = 5.0;
        $machineDetection->delayResult = true;
        $machineDetection->callbackUrl = getenv("BASE_CALLBACK_URL") . "/callbacks/machine-detection";
        $machineDetection->callbackMethod = "POST";
        $machineDetection->machineSpeechEndThreshold = 3.2;

        $body->from = getenv("BW_NUMBER");
        $body->to = getenv("USER_NUMBER");
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("BASE_CALLBACK_URL");
        $body->machineDetection = $machineDetection;
        $response = $this->bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
        $callId = $response->getResult()->callId;
        $this->assertTrue(strlen($callId) > 0);

        sleep(1);

        //get phone call information
        $response = $this->bandwidthClient->getVoice()->getClient()->getCall(getenv("BW_ACCOUNT_ID"), $callId);
        $this->assertTrue(strlen($response->getResult()->state) > 0);
    }

    public function testCreateCallWithPriority() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = getenv("USER_NUMBER");
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("BASE_CALLBACK_URL");
        $body->priority = 1;
        $response = $this->bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
        $callId = $response->getResult()->callId;
        $this->assertTrue(strlen($callId) > 0);
        $this->assertTrue($response->getResult()->priority == $body->priority);
    }

    public function testCreateCallInvalidPhoneNumber() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = "+1invalid";
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("BASE_CALLBACK_URL");

        try {
            $this->bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
            //workaround to make sure that if the above error is not raised, the build will fail
            $this->assertTrue(false);
        } catch (BandwidthLib\Voice\Exceptions\ApiErrorException $e) {
            $this->assertTrue(strlen($e->description) > 0);
        }
    }

    public function testMfaMessaging() {
        $body = new BandwidthLib\MultiFactorAuth\Models\TwoFactorCodeRequestSchema();
        $body->from = getenv("BW_NUMBER");
        $body->to = getenv("USER_NUMBER");
        $body->applicationId = getenv("BW_MESSAGING_APPLICATION_ID");
        $body->scope = "scope";
        $body->digits = 6;
        $body->message = "Your temporary {NAME} {SCOPE} code is {CODE}";

        $response = $this->bandwidthClient->getMultiFactorAuth()->getMFA()->createMessagingTwoFactor(getenv("BW_ACCOUNT_ID"), $body);
        $this->assertTrue(strlen($response->getResult()->messageId) > 0); //validate that _some_ id was returned
    }

    public function testMfaVoice() {
        $body = new BandwidthLib\MultiFactorAuth\Models\TwoFactorCodeRequestSchema();
        $body->from = getenv("BW_NUMBER");
        $body->to = getenv("USER_NUMBER");
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->scope = "scope";
        $body->digits = 6;
        $body->message = "Your temporary {NAME} {SCOPE} code is {CODE}";

        $response = $this->bandwidthClient->getMultiFactorAuth()->getMFA()->createVoiceTwoFactor(getenv("BW_ACCOUNT_ID"), $body);
        $this->assertTrue(strlen($response->getResult()->callId) > 0); //validate that _some_ id was returned
    }

    public function testMfaVerify() {
        $body = new BandwidthLib\MultiFactorAuth\Models\TwoFactorVerifyRequestSchema();
        $body->to = "+".rand(10000000000, 19999999999);
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->scope = "scope";
        $body->code = "123456";
        $body->digits = 6;
        $body->expirationTimeInMinutes = 3;

        $response = $this->bandwidthClient->getMultiFactorAuth()->getMFA()->createVerifyTwoFactor(getenv("BW_ACCOUNT_ID"), $body);
        $this->assertTrue(is_bool($response->getResult()->valid));
    }

    public function testTnLookup() {
        $body = new BandwidthLib\PhoneNumberLookup\Models\OrderRequest();
        $body->tns = [getenv("USER_NUMBER")];
        $createResponse = $this->bandwidthClient->getPhoneNumberLookup()->getClient()->createLookupRequest(getenv("BW_ACCOUNT_ID"), $body);
        $this->assertTrue(strlen($createResponse->getResult()->requestId) > 0);

        $requestId = $createResponse->getResult()->requestId;
        $getResponse = $this->bandwidthClient->getPhoneNumberLookup()->getClient()->getLookupRequestStatus(getenv("BW_ACCOUNT_ID"), $requestId);
        $this->assertTrue(strlen($getResponse->getResult()->status) > 0);
    }
}
