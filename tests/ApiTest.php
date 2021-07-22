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
                'messagingBasicAuthUserName' => getenv("USERNAME"),
                'messagingBasicAuthPassword' => getenv("PASSWORD"),
                'voiceBasicAuthUserName' => getenv("USERNAME"),
                'voiceBasicAuthPassword' => getenv("PASSWORD"),
                'multiFactorAuthBasicAuthUserName' => getenv("USERNAME"),
                'multiFactorAuthBasicAuthPassword' => getenv("PASSWORD"),
                'phoneNumberLookupBasicAuthUserName' => getenv("USERNAME"),
                'phoneNumberLookupBasicAuthPassword' => getenv("PASSWORD")
            )
        );
        $this->bandwidthClient = new BandwidthLib\BandwidthClient($config);
    }

    public function testCreateMessage() {
        $body = new BandwidthLib\Messaging\Models\MessageRequest();
        $body->from = getenv("PHONE_NUMBER_INBOUND");
        $body->to = [getenv("PHONE_NUMBER_OUTBOUND")];
        $body->applicationId = getenv("MESSAGING_APPLICATION_ID");
        $body->text = "PHP Monitoring";

        $response = $this->bandwidthClient->getMessaging()->getClient()->createMessage(getenv("ACCOUNT_ID"), $body);

        $this->assertTrue(strlen($response->getResult()->id) > 0); //validate that _some_ id was returned
    }

    public function testCreateMessageInvalidPhoneNumber() {
        $body = new BandwidthLib\Messaging\Models\MessageRequest();
        $body->from = getenv("PHONE_NUMBER_INBOUND");
        $body->to = ["+1invalid"];
        $body->applicationId = getenv("MESSAGING_APPLICATION_ID");
        $body->text = "PHP Monitoring";

        try {
            $this->bandwidthClient->getMessaging()->getClient()->createMessage(getenv("ACCOUNT_ID"), $body);
            //workaround to make sure that if the above error is not raised, the build will fail
            $this->assertTrue(false);
        } catch (BandwidthLib\Messaging\Exceptions\MessagingException $e) {
            $this->assertTrue(strlen($e->description) > 0);
        }
    }

    public function testUploadDownloadMedia() {
        //constants

        $mediaFileName = "php_monitoring";
        $mediaFile = "12345"; //todo: confirm binary string?
        //media upload
        $this->bandwidthClient->getMessaging()->getClient()->uploadMedia(getenv("ACCOUNT_ID"), $mediaFileName, $mediaFile);
        
        //media download
        $downloadedMediaFile = $this->bandwidthClient->getMessaging()->getClient()->getMedia(getenv("ACCOUNT_ID"), $mediaFileName)->getResult();

        //validate that response is the same
        $this->assertEquals($downloadedMediaFile, $mediaFile);
    }

    public function testCreateCallAndGetCallState() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $body->from = getenv("PHONE_NUMBER_INBOUND");
        $body->to = getenv("PHONE_NUMBER_OUTBOUND");
        $body->applicationId = getenv("VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("VOICE_CALLBACK_URL");
        $response = $this->bandwidthClient->getVoice()->getClient()->createCall(getenv("ACCOUNT_ID"), $body);
        $callId = $response->getResult()->callId;
        $this->assertTrue(strlen($callId) > 0);

        //get phone call information
        $response = $this->bandwidthClient->getVoice()->getClient()->getCall(getenv("ACCOUNT_ID"), $callId);
        $this->assertTrue(strlen($response->getResult()->state) > 0); 
    }

    public function testCreateCallInvalidPhoneNumber() {
        $body = new BandwidthLib\Voice\Models\CreateCallRequest();
        $body->from = getenv("PHONE_NUMBER_INBOUND");
        $body->to = "+1invalid";
        $body->applicationId = getenv("VOICE_APPLICATION_ID");
        $body->answerUrl = getenv("VOICE_CALLBACK_URL");

        try {
            $this->bandwidthClient->getVoice()->getClient()->createCall(getenv("ACCOUNT_ID"), $body);
            //workaround to make sure that if the above error is not raised, the build will fail
            $this->assertTrue(false);
        } catch (BandwidthLib\Voice\Exceptions\ApiErrorException $e) {
            $this->assertTrue(strlen($e->description) > 0);
        }
    }

    public function testMfaMessaging() {
        $body = new BandwidthLib\MultiFactorAuth\Models\TwoFactorCodeRequestSchema();
        $body->from = getenv("PHONE_NUMBER_MFA");
        $body->to = getenv("PHONE_NUMBER_INBOUND");
        $body->applicationId = getenv("MFA_MESSAGING_APPLICATION_ID");
        $body->scope = "scope";
        $body->digits = 6;
        $body->message = "Your temporary {NAME} {SCOPE} code is {CODE}";

        $response = $this->bandwidthClient->getMultiFactorAuth()->getMFA()->createMessagingTwoFactor(getenv("ACCOUNT_ID"), $body);
        $this->assertTrue(strlen($response->getResult()->messageId) > 0); //validate that _some_ id was returned
    }

    public function testMfaVoice() {
        $body = new BandwidthLib\MultiFactorAuth\Models\TwoFactorCodeRequestSchema();
        $body->from = getenv("PHONE_NUMBER_MFA");
        $body->to = getenv("PHONE_NUMBER_INBOUND");
        $body->applicationId = getenv("MFA_VOICE_APPLICATION_ID");
        $body->scope = "scope";
        $body->digits = 6;
        $body->message = "Your temporary {NAME} {SCOPE} code is {CODE}";

        $response = $this->bandwidthClient->getMultiFactorAuth()->getMFA()->createVoiceTwoFactor(getenv("ACCOUNT_ID"), $body);
        $this->assertTrue(strlen($response->getResult()->callId) > 0); //validate that _some_ id was returned
    }

    public function testMfaVerify() {
        $body = new BandwidthLib\MultiFactorAuth\Models\TwoFactorVerifyRequestSchema();
        $body->from = getenv("PHONE_NUMBER_MFA");
        $body->to = getenv("PHONE_NUMBER_INBOUND");
        $body->applicationId = getenv("MFA_VOICE_APPLICATION_ID");
        $body->scope = "scope";
        $body->code = "123456";
        $body->digits = 6;
        $body->expirationTimeInMinutes = 3;

        $response = $this->bandwidthClient->getMultiFactorAuth()->getMFA()->createVerifyTwoFactor(getenv("ACCOUNT_ID"), $body);
        $this->assertTrue(is_bool($response->getResult()->valid));
    }

    public function testTnLookup() {
        $body = new BandwidthLib\PhoneNumberLookup\Models\OrderRequest();
        $body->tns = [getenv("PHONE_NUMBER_OUTBOUND")];
        $createResponse = $this->bandwidthClient->getPhoneNumberLookup()->getClient()->createLookupRequest(getenv("ACCOUNT_ID"), $body);
        $this->assertTrue(strlen($createResponse->getResult()->requestId) > 0);

        $requestId = $createResponse->getResult()->requestId;
        $getResponse = $this->bandwidthClient->getPhoneNumberLookup()->getClient()->getLookupRequestStatus(getenv("ACCOUNT_ID"), $requestId);
        $this->assertTrue(strlen($getResponse->getResult()->status) > 0);
    }
}
