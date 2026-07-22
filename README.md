# Bandwidth PHP SDK

[![Test](https://github.com/Bandwidth/php-sdk/actions/workflows/test.yml/badge.svg)](https://github.com/Bandwidth/php-sdk/actions/workflows/test.yml)

|    **OS**    |      **PHP**       |
|:------------:|:-----------------------:|
| Windows 2022 | 8.0, 8.1, 8.2, 8.3, 8.4 |
| Windows 2025 | 8.0, 8.1, 8.2, 8.3, 8.4 |
| Ubuntu 22.04 | 8.0, 8.1, 8.2, 8.3, 8.4 |
| Ubuntu 24.04 | 8.0, 8.1, 8.2, 8.3, 8.4 |

## Getting Started

### Installation

```
composer require bandwidth/sdk
```

### Initialize

```php

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

```php

$voiceClient = $client->getVoice()->getClient();

$body = new BandwidthLib\Voice\Models\CreateCallRequest();
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

```php

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

```php

$speakSentence = BandwidthLib\Voice\Bxml\SpeakSentence::make("Hello!")
    ->voice("susan")
    ->locale("en_US")
    ->gender("female");
$response = BandwidthLib\Voice\Bxml\Response::make()
    ->addVerb($speakSentence);
echo $response->toBxml();
```

### Create A Refer BXML

```php

$sipUri = new BandwidthLib\Voice\Bxml\ReferSipUri("sip:alice@atlanta.example.com");
$refer = new BandwidthLib\Voice\Bxml\Refer();
$refer->referCompleteUrl("https://example.com/handleRefer");
$refer->referCompleteMethod("POST");
$refer->sipUri($sipUri);

$response = new BandwidthLib\Voice\Bxml\Response();
$response->addVerb($refer);
echo $response->toBxml();
```

> **Note:** On success, the call is terminated — the remote SIP endpoint redirects away from Bandwidth entirely. Use `referCompleteUrl` only for failure recovery.

```php
// Failure recovery example in your referCompleteUrl handler:
$requestBody = json_decode(file_get_contents('php://input'), true);
if ($requestBody['referCallStatus'] === 'failure') {
    // Handle failure: play a message or redirect
    $speakSentence = new BandwidthLib\Voice\Bxml\SpeakSentence("The transfer failed. Please try again.");
    $response = new BandwidthLib\Voice\Bxml\Response();
    $response->addVerb($speakSentence);
    echo $response->toBxml();
}
```

### Create A MFA Request

```php

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

```php

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

$body = new BandwidthLib\WebRtc\Models\Subscriptions();
$body->sessionId = "1234-abcd";

$createParticipantResponse = $webRtcClient->createParticipant($accountId, $createParticipantBody);
$participantId = $createParticipantResponse->getResult()->participant->id;

$webRtcClient->addParticipantToSession($accountId, $sessionId, $participantId, $body);
```

## Supported PHP Versions

This package can be used with PHP >= 7.2

## Documentation

Documentation for this package can be found at [https://dev.bandwidth.com/sdks/php/](https://dev.bandwidth.com/sdks/php/)

## Credentials

Information for credentials for this package can be found at https://dev.bandwidth.com/guides/accountCredentials.html
