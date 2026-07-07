# OpenAPI\Client\TranscriptionsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteRealTimeTranscription()**](TranscriptionsApi.md#deleteRealTimeTranscription) | **DELETE** /accounts/{accountId}/calls/{callId}/transcriptions/{transcriptionId} | Delete Real-time Transcription |
| [**getRealTimeTranscription()**](TranscriptionsApi.md#getRealTimeTranscription) | **GET** /accounts/{accountId}/calls/{callId}/transcriptions/{transcriptionId} | Get Real-time Transcription |
| [**listRealTimeTranscriptions()**](TranscriptionsApi.md#listRealTimeTranscriptions) | **GET** /accounts/{accountId}/calls/{callId}/transcriptions | List Real-time Transcriptions |


## `deleteRealTimeTranscription()`

```php
deleteRealTimeTranscription($account_id, $call_id, $transcription_id)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Delete Real-time Transcription

Delete the specified transcription that was created on this call via [startTranscription](/docs/voice/bxml/startTranscription).  Note: After the deletion is requested and a `200` is returned, the transcription will not be accessible anymore. However, it is not deleted immediately. This deletion process, while transparent and irreversible, can take an additional 24 to 48 hours.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\TranscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$transcription_id = t-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Transcription ID.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteRealTimeTranscription($account_id, $call_id, $transcription_id, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling TranscriptionsApi->deleteRealTimeTranscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **transcription_id** | **string**| Programmable Voice API Transcription ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

void (empty response body)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRealTimeTranscription()`

```php
getRealTimeTranscription($account_id, $call_id, $transcription_id): \OpenAPI\Client\Model\CallTranscriptionResponse
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Real-time Transcription

Retrieve the specified transcription that was created on this call via [startTranscription](/docs/voice/bxml/startTranscription).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\TranscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$transcription_id = t-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Transcription ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getRealTimeTranscription($account_id, $call_id, $transcription_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranscriptionsApi->getRealTimeTranscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **transcription_id** | **string**| Programmable Voice API Transcription ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CallTranscriptionResponse**](../Model/CallTranscriptionResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listRealTimeTranscriptions()`

```php
listRealTimeTranscriptions($account_id, $call_id): \OpenAPI\Client\Model\CallTranscriptionMetadata[]
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
List Real-time Transcriptions

List the transcriptions created on this call via [startTranscription](/docs/voice/bxml/startTranscription).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\TranscriptionsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listRealTimeTranscriptions($account_id, $call_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TranscriptionsApi->listRealTimeTranscriptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CallTranscriptionMetadata[]**](../Model/CallTranscriptionMetadata.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
