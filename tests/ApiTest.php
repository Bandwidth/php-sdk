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
    protected static $bandwidthClient;
    protected static $messagingMFAClient;
    public static function setUpBeforeClass(): void {
        $config = new BandwidthLib\Configuration(
            array(
                'voiceBasicAuthUserName' => getenv("BW_USERNAME"),
                'voiceBasicAuthPassword' => getenv("BW_PASSWORD"),
                'phoneNumberLookupBasicAuthUserName' => getenv("BW_USERNAME"),
                'phoneNumberLookupBasicAuthPassword' => getenv("BW_PASSWORD"),
                'clientId' => getenv("BW_CLIENT_ID"),
                'clientSecret' => getenv("BW_CLIENT_SECRET"),
            )
        );
        self::$bandwidthClient = new BandwidthLib\BandwidthClient($config);

        $messagingMFAConfig = new BandwidthLib\Configuration(
            array(
                'messagingBasicAuthUserName' => getenv("BW_USERNAME"),
                'messagingBasicAuthPassword' => getenv("BW_PASSWORD"),
                'multiFactorAuthBasicAuthUserName' => getenv("BW_USERNAME"),
                'multiFactorAuthBasicAuthPassword' => getenv("BW_PASSWORD"),
            )
        );
        self::$messagingMFAClient = new BandwidthLib\BandwidthClient($messagingMFAConfig);
    }

    public function testCreateMessage() {
        $body = new BandwidthLib\Messaging\Models\MessageRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = [getenv("USER_NUMBER")];
        $body->applicationId = getenv("BW_MESSAGING_APPLICATION_ID");
        $body->text = "PHP Monitoring";

        $response = self::$messagingMFAClient->getMessaging()->getClient()->createMessage(getenv("BW_ACCOUNT_ID"), $body);

        $this->assertTrue(strlen($response->getResult()->id) > 0); //validate that _some_ id was returned
    }

    public function testCreateMessageInvalidPhoneNumber() {
        $body = new BandwidthLib\Messaging\Models\MessageRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = ["+1invalid"];
        $body->applicationId = getenv("BW_MESSAGING_APPLICATION_ID");
        $body->text = "PHP Monitoring";

        try {
            self::$messagingMFAClient->getMessaging()->getClient()->createMessage(getenv("BW_ACCOUNT_ID"), $body);
            //workaround to make sure that if the above error is not raised, the build will fail
            $this->assertTrue(false);
        } catch (BandwidthLib\Messaging\Exceptions\MessagingException $e) {
            $this->assertTrue(strlen($e->description) > 0);
        }
    }

    public function testUploadDownloadMedia() {
        //constants
        $mediaId = "text-media-id-" . uniqid() . ".txt";
        $content = "Hello world";
        $contentType = 'text/plain';

        //media upload
        self::$messagingMFAClient->getMessaging()->getClient()->uploadMedia(getenv("BW_ACCOUNT_ID"), $mediaId, $content, $contentType);

        //media download
        $downloadedContent = self::$messagingMFAClient->getMessaging()->getClient()->getMedia(getenv("BW_ACCOUNT_ID"), $mediaId)->getResult();

        //media delete
        self::$messagingMFAClient->getMessaging()->getClient()->deleteMedia(getenv("BW_ACCOUNT_ID"), $mediaId);

        //validate that response is the same
        $this->assertEquals($downloadedContent, $content);
    }

    public function testCreateCallAndGetCallState() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = getenv("USER_NUMBER");
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("BASE_CALLBACK_URL");
        $response = self::$bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
        $callId = $response->getResult()->callId;
        $this->assertTrue(strlen($callId) > 0);
        $this->assertTrue(is_a($response->getResult()->enqueuedTime, 'DateTime'));

        //get phone call information (This is commented out until voice fixes their latency issues
        // $response = self::$bandwidthClient->getVoice()->getClient()->getCall(getenv("BW_ACCOUNT_ID"), $callId);
        // $this->assertTrue(is_a($response->getResult()->enqueuedTime, 'DateTime'));

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
        $response = self::$bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
        $callId = $response->getResult()->callId;
        $this->assertTrue(strlen($callId) > 0);

        sleep(25);

        //get phone call information
    //     $response = self::$bandwidthClient->getVoice()->getClient()->getCall(getenv("BW_ACCOUNT_ID"), $callId);
    //     if (($response->getStatus() == 404) ) {
    //     $this->assertTrue(is_a($response->getResult()->enqueuedTime, 'DateTime'));
    // }
    }
    public function testCreateCallWithPriority() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $body->from = getenv("BW_NUMBER");
        $body->to = getenv("USER_NUMBER");
        $body->applicationId = getenv("BW_VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("BASE_CALLBACK_URL");
        $body->priority = 1;
        $response = self::$bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
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
            self::$bandwidthClient->getVoice()->getClient()->createCall(getenv("BW_ACCOUNT_ID"), $body);
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

        $response = self::$messagingMFAClient->getMultiFactorAuth()->getMFA()->createMessagingTwoFactor(getenv("BW_ACCOUNT_ID"), $body);
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

        $response = self::$messagingMFAClient->getMultiFactorAuth()->getMFA()->createVoiceTwoFactor(getenv("BW_ACCOUNT_ID"), $body);
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

        $response = self::$messagingMFAClient->getMultiFactorAuth()->getMFA()->createVerifyTwoFactor(getenv("BW_ACCOUNT_ID"), $body);
        $this->assertTrue(is_bool($response->getResult()->valid));
    }

    public function testAsyncTnLookup() {
        $body = new BandwidthLib\PhoneNumberLookup\Models\CreateLookupRequest();
        $body->phoneNumbers = [getenv("USER_NUMBER")];
        $createResponse = self::$bandwidthClient->getPhoneNumberLookup()->getClient()->createAsyncBulkLookupRequest(getenv("BW_ACCOUNT_ID"), $body);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\CreateAsyncBulkResponse::class, $createResponse->getResult());
        $this->assertIsArray($createResponse->getResult()->links);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\CreateAsyncBulkResponseData::class, $createResponse->getResult()->data);
        $this->assertIsString($createResponse->getResult()->data->requestId);
        $this->assertIsString($createResponse->getResult()->data->status);
        $this->assertIsArray($createResponse->getResult()->errors);

        sleep(30);

        $statusResponse = self::$bandwidthClient->getPhoneNumberLookup()->getClient()->getAsyncLookupRequestStatus(getenv("BW_ACCOUNT_ID"), $createResponse->getResult()->data->requestId);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\LookupResponse::class, $statusResponse->getResult());
        $this->assertIsArray($statusResponse->getResult()->links);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\LookupResponseData::class, $statusResponse->getResult()->data);
        $this->assertIsString($statusResponse->getResult()->data->requestId);
        $this->assertIsString($statusResponse->getResult()->data->status);
        $this->assertIsArray($statusResponse->getResult()->data->results);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\LookupResult::class, $statusResponse->getResult()->data->results[0]);
        $this->assertIsString($statusResponse->getResult()->data->results[0]->phoneNumber);
        $this->assertIsString($statusResponse->getResult()->data->results[0]->lineType);
        $this->assertIsString($statusResponse->getResult()->data->results[0]->messagingProvider);
        $this->assertIsString($statusResponse->getResult()->data->results[0]->voiceProvider);
        $this->assertIsString($statusResponse->getResult()->data->results[0]->countryCodeA3);
        $this->assertIsArray($statusResponse->getResult()->errors);
    }

    public function testSyncTnLookup() {
        $body = new BandwidthLib\PhoneNumberLookup\Models\CreateLookupRequest();
        $body->phoneNumbers = [getenv("USER_NUMBER")];
        $response = self::$bandwidthClient->getPhoneNumberLookup()->getClient()->createSyncLookupRequest(getenv("BW_ACCOUNT_ID"), $body);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\LookupResponse::class, $response->getResult());
        $this->assertIsArray($response->getResult()->links);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\Link::class, $response->getResult()->links[0]);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\LookupResponseData::class, $response->getResult()->data);
        $this->assertIsString($response->getResult()->data->requestId);
        $this->assertIsString($response->getResult()->data->status);
        $this->assertEquals("COMPLETE", $response->getResult()->data->status);
        $this->assertIsArray($response->getResult()->data->results);
        $this->assertInstanceOf(BandwidthLib\PhoneNumberLookup\Models\LookupResult::class, $response->getResult()->data->results[0]);
        $this->assertIsString($response->getResult()->data->results[0]->phoneNumber);
        $this->assertIsString($response->getResult()->data->results[0]->lineType);
        // $this->assertIsString($response->getResult()->data->results[0]->messagingProvider);
        $this->assertIsString($response->getResult()->data->results[0]->voiceProvider);
        $this->assertIsString($response->getResult()->data->results[0]->countryCodeA3);
        $this->assertIsArray($response->getResult()->errors);
    }

    public function testCreateListGetDeleteEndpoint() {
        $accountId = getenv("BW_ACCOUNT_ID");
        $brtcClient = self::$bandwidthClient->getBRTC()->getClient();

        // Create endpoint
        $createReq = new BandwidthLib\BRTC\Models\CreateEndpointRequest(
            'WEBRTC',
            'INBOUND',
            getenv("BASE_CALLBACK_URL") . "/brtc/events",
            null,
            'php-sdk-test'
        );
        $createResp = $brtcClient->createEndpoint($accountId, $createReq)->getResult();
        $this->assertInstanceOf(BandwidthLib\BRTC\Models\CreateEndpointResponse::class, $createResp);
        $this->assertIsArray($createResp->links);
        $this->assertNotNull($createResp->data);
        $this->assertInstanceOf(BandwidthLib\BRTC\Models\CreateEndpointResponseData::class, $createResp->data);
        $this->assertNotNull($createResp->data->endpointId);
        $this->assertIsString($createResp->data->endpointId);
        $this->assertEquals('WEBRTC', $createResp->data->type);
        $this->assertNotNull($createResp->data->status);
        $this->assertNotNull($createResp->data->creationTimestamp);
        $this->assertNotNull($createResp->data->expirationTimestamp);
        $this->assertEquals('php-sdk-test', $createResp->data->tag);
        $this->assertIsArray($createResp->errors);

        $endpointId = $createResp->data->endpointId;

        // List endpoints
        $listResp = $brtcClient->listEndpoints($accountId)->getResult();
        $this->assertInstanceOf(BandwidthLib\BRTC\Models\ListEndpointsResponse::class, $listResp);
        $this->assertIsArray($listResp->links);
        $this->assertIsArray($listResp->data);
        $this->assertNotEmpty($listResp->data);
        $this->assertIsArray($listResp->errors);
        $this->assertInstanceOf(BandwidthLib\BRTC\Models\Endpoints::class, $listResp->data[0]);
        $this->assertNotNull($listResp->data[0]->endpointId);
        $this->assertNotNull($listResp->data[0]->type);
        $this->assertNotNull($listResp->data[0]->status);
        $ids = array_map(fn($ep) => $ep->endpointId, $listResp->data);
        $this->assertContains($endpointId, $ids, 'Created endpoint should be in list');

        // Get endpoint
        $getResp = $brtcClient->getEndpoint($accountId, $endpointId)->getResult();
        $this->assertInstanceOf(BandwidthLib\BRTC\Models\EndpointResponse::class, $getResp);
        $this->assertIsArray($getResp->links);
        $this->assertNotNull($getResp->data);
        $this->assertInstanceOf(BandwidthLib\BRTC\Models\Endpoint::class, $getResp->data);
        $this->assertEquals($endpointId, $getResp->data->endpointId);
        $this->assertEquals('WEBRTC', $getResp->data->type);
        $this->assertNotNull($getResp->data->status);
        $this->assertNotNull($getResp->data->creationTimestamp);
        $this->assertNotNull($getResp->data->expirationTimestamp);
        $this->assertEquals('php-sdk-test', $getResp->data->tag);
        $this->assertIsArray($getResp->errors);

        // Delete endpoint
        $deleteResp = $brtcClient->deleteEndpoint($accountId, $endpointId);
        $this->assertEquals(204, $deleteResp->getStatusCode());
    }
}
