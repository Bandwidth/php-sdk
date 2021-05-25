# Bandwidth PHP SDK

## Changelog

| Version | Description |
|--|--|
| v5.1.0 | Added webrtc participant version |
| v5.0.0 | MFA error update and message priority |
| v4.0.0 | Added get messages and updated request bodies to required in the methods |
| v3.0.0 | Updated MFA verify schema and renamed CallEngineModifyConferenceRequest to ApiModifyConferenceRequest |
| v2.14.0 | Added sip uir and tag BXML verbs |

## Getting Started

### Installation

```
composer require bandwidth/sdk
```

### Initialize

```
require "vendor/autoload.php";

$config = new BandwidthLib\Configuration(
    array(
        'messagingBasicAuthUserName' => 'username',
        'messagingBasicAuthPassword' => 'password',
        'voiceBasicAuthUserName' => 'username',
        'voiceBasicAuthPassword' => 'password',
        'twoFactorAuthBasicAuthUserName' => 'username',
        'twoFactorAuthBasicAuthPassword' => 'password',
        'webRtcBasicAuthUserName' => 'username',
        'webRtcBasicAuthPassword' => 'password'
    )
);
$client = new BandwidthLib\BandwidthClient($config);
$accountId = "12345";
```

### Create A Phone Call

```
$voiceClient = $client->getVoice()->getClient();

$body = new BandwidthLib\Voice\Models\ApiCreateCallRequest();
$body->from = "+15554443333";
$body->to = "+15554442222";
$body->answerUrl = "https://test.com";
$body->applicationId = "3-d-4-b-5";

try {
    $response = $voiceClient->createCall($voiceAccountId, $body);
    print_r($response);
} catch (Exception $e) {
    print_r($e);
}
```

### Send A Text Message

```
$messagingClient = $client->getMessaging()->getClient();

$body = new BandwidthLib\Messaging\Models\MessageRequest();
$body->from = "+12345678901";
$body->to = array("+12345678902");
$body->applicationId = "1234-ce-4567-de";
$body->text = "Greetings!";

try {
    $response = $messagingClient->createMessage($messagingAccountId, $body);
    print_r($response);
} catch (Exception $e) {
    print_r($e);
}
```

### Create BXML

```
$speakSentence = new BandwidthLib\Voice\Bxml\SpeakSentence("Hello!");
$speakSentence->voice("susan");
$speakSentence->locale("en_US");
$speakSentence->gender("female");
$response = new BandwidthLib\Voice\Bxml\Response();
$response->addVerb($speakSentence);
echo $response->toBxml();
```

### Create A MFA Request

```
$mfaClient = $client->getTwoFactorAuth()->getMFA();

$body = new BandwidthLib\TwoFactorAuth\Models\TwoFactorCodeRequestSchema();
$body->from = "+15554443333";
$body->to = "+15553334444";
$body->applicationId = "3-a-b-d";
$body->scope = "scope";
$body->digits = 6;
$body->message = "Your temporary {NAME} {SCOPE} code is {CODE}";
$mfaClient->createVoiceTwoFactor($accountId, $body);

$body = new BandwidthLib\TwoFactorAuth\Models\TwoFactorVerifyRequestSchema();
$body->from = "+15554443333";
$body->to = "+15553334444";
$body->applicationId = "3-a-b-d";
$body->scope = "scope";
$body->code = "123456";
$body->digits = 6;
$body->expirationTimeInMinutes = 3;

$response = $mfaClient->createVerifyTwoFactor($accountId, $body);
echo $response->getResult()->valid;
```

### WebRtc Participant & Session Management

```
$webRtcClient = $client->getWebRtc()->getClient();

$createSessionBody = new BandwidthLib\WebRtc\Models\Session();
$createSessionBody->tag = 'new-session';

$createSessionResponse = $webRtcClient->createSession($accountId, $createSessionBody);
$sessionId = $createSessionResponse->getResult()->id;

$createParticipantBody = new BandwidthLib\WebRtc\Models\Participant();
$createParticipantBody->callbackUrl = 'https://sample.com';
$createParticipantBody->publishPermissions = array(
    BandwidthLib\WebRtc\Models\PublishPermissionEnum::AUDIO,
    BandwidthLib\WebRtc\Models\PublishPermissionEnum::VIDEO
);

$createParticipantResponse = $webRtcClient->createParticipant($accountId, $createParticipantBody);
$participantId = $createParticipantResponse->getResult()->participant->id;

$webRtcClient->addParticipantToSession($accountId, $sessionId, $participantId);
```

## Supported PHP Versions

This package can be used with PHP >= 5.4

## Documentation

Documentation for this package can be found at https://dev.bandwidth.com/sdks/php.html

## Credentials

Information for credentials for this package can be found at https://dev.bandwidth.com/guides/accountCredentials.html
