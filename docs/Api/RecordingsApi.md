# Bandwidth\RecordingsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**deleteRecording()**](RecordingsApi.md#deleteRecording) | **DELETE** /accounts/{accountId}/calls/{callId}/recordings/{recordingId} | Delete Recording |
| [**deleteRecordingMedia()**](RecordingsApi.md#deleteRecordingMedia) | **DELETE** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/media | Delete Recording Media |
| [**deleteRecordingTranscription()**](RecordingsApi.md#deleteRecordingTranscription) | **DELETE** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/transcription | Delete Transcription |
| [**downloadCallRecording()**](RecordingsApi.md#downloadCallRecording) | **GET** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/media | Download Recording |
| [**getCallRecording()**](RecordingsApi.md#getCallRecording) | **GET** /accounts/{accountId}/calls/{callId}/recordings/{recordingId} | Get Call Recording |
| [**getRecordingTranscription()**](RecordingsApi.md#getRecordingTranscription) | **GET** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/transcription | Get Transcription |
| [**listAccountCallRecordings()**](RecordingsApi.md#listAccountCallRecordings) | **GET** /accounts/{accountId}/recordings | Get Call Recordings |
| [**listCallRecordings()**](RecordingsApi.md#listCallRecordings) | **GET** /accounts/{accountId}/calls/{callId}/recordings | List Call Recordings |
| [**transcribeCallRecording()**](RecordingsApi.md#transcribeCallRecording) | **POST** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/transcription | Create Transcription Request |
| [**updateCallRecordingState()**](RecordingsApi.md#updateCallRecordingState) | **PUT** /accounts/{accountId}/calls/{callId}/recording | Update Recording |


## `deleteRecording()`

```php
deleteRecording($account_id, $call_id, $recording_id)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Delete Recording

Delete the recording information, media and transcription.  Note: After the deletion is requested and a `204` is returned, neither the recording metadata nor the actual media nor its transcription will be accessible anymore. However, the media of the specified recording is not deleted immediately. This deletion process, while transparent and irreversible, can take an additional 24 to 48 hours.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteRecording($account_id, $call_id, $recording_id, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->deleteRecording: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
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

## `deleteRecordingMedia()`

```php
deleteRecordingMedia($account_id, $call_id, $recording_id)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Delete Recording Media

Deletes the specified recording's media.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteRecordingMedia($account_id, $call_id, $recording_id, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->deleteRecordingMedia: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
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

## `deleteRecordingTranscription()`

```php
deleteRecordingTranscription($account_id, $call_id, $recording_id)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Delete Transcription

Deletes the specified recording's transcription.  Note: After the deletion is requested and a `204` is returned, the transcription will not be accessible anymore. However, it is not deleted immediately. This deletion process, while transparent and irreversible, can take an additional 24 to 48 hours.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteRecordingTranscription($account_id, $call_id, $recording_id, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->deleteRecordingTranscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
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

## `downloadCallRecording()`

```php
downloadCallRecording($account_id, $call_id, $recording_id): \SplFileObject
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Download Recording

Downloads the specified recording.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->downloadCallRecording($account_id, $call_id, $recording_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->downloadCallRecording: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `audio/vnd.wave`, `audio/mpeg`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCallRecording()`

```php
getCallRecording($account_id, $call_id, $recording_id): \Bandwidth\Model\CallRecordingMetadata
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Call Recording

Returns metadata for the specified recording.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getCallRecording($account_id, $call_id, $recording_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->getCallRecording: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\CallRecordingMetadata**](../Model/CallRecordingMetadata.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRecordingTranscription()`

```php
getRecordingTranscription($account_id, $call_id, $recording_id): \Bandwidth\Model\RecordingTranscriptions
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Transcription

Downloads the specified transcription. If the recording was multi-channel, then there will be 2 transcripts. The caller/called party transcript will be the first item while [`<PlayAudio>`](/docs/voice/bxml/playAudio) and [`<SpeakSentence>`](/docs/voice/bxml/speakSentence) transcript will be the second item. During a [`<Transfer>`](/docs/voice/bxml/transfer) the A-leg transcript will be the first item while the B-leg transcript will be the second item.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getRecordingTranscription($account_id, $call_id, $recording_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->getRecordingTranscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\RecordingTranscriptions**](../Model/RecordingTranscriptions.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listAccountCallRecordings()`

```php
listAccountCallRecordings($account_id, $to, $from, $min_start_time, $max_start_time): \Bandwidth\Model\CallRecordingMetadata[]
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Call Recordings

Returns a list of metadata for the recordings associated with the specified account. The list can be filtered by the optional from, to, minStartTime, and maxStartTime arguments. The list is capped at 1000 entries and may be empty if no recordings match the specified criteria.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$to = %2b19195551234; // string | Filter results by the `to` field.
$from = %2b19195554321; // string | Filter results by the `from` field.
$min_start_time = 2022-06-21T19:13:21Z; // string | Filter results to recordings which have a `startTime` after or including `minStartTime` (in ISO8601 format).
$max_start_time = 2022-06-21T19:13:21Z; // string | Filter results to recordings which have a `startTime` before `maxStartTime` (in ISO8601 format).

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listAccountCallRecordings($account_id, $to, $from, $min_start_time, $max_start_time, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->listAccountCallRecordings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **to** | **string**| Filter results by the &#x60;to&#x60; field. | [optional] |
| **from** | **string**| Filter results by the &#x60;from&#x60; field. | [optional] |
| **min_start_time** | **string**| Filter results to recordings which have a &#x60;startTime&#x60; after or including &#x60;minStartTime&#x60; (in ISO8601 format). | [optional] |
| **max_start_time** | **string**| Filter results to recordings which have a &#x60;startTime&#x60; before &#x60;maxStartTime&#x60; (in ISO8601 format). | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\CallRecordingMetadata[]**](../Model/CallRecordingMetadata.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCallRecordings()`

```php
listCallRecordings($account_id, $call_id): \Bandwidth\Model\CallRecordingMetadata[]
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
List Call Recordings

Returns a (potentially empty) list of metadata for the recordings that took place during the specified call.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
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
    $result = $apiInstance->listCallRecordings($account_id, $call_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->listCallRecordings: ', $e->getMessage(), PHP_EOL;
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

[**\Bandwidth\Model\CallRecordingMetadata[]**](../Model/CallRecordingMetadata.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `transcribeCallRecording()`

```php
transcribeCallRecording($account_id, $call_id, $recording_id, $transcribe_recording)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Create Transcription Request

Generate the transcription for a specific recording. Transcription can succeed only for recordings of length greater than 500 milliseconds and less than 4 hours.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.
$transcribe_recording = new \Bandwidth\Model\TranscribeRecording(); // \Bandwidth\Model\TranscribeRecording

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->transcribeCallRecording($account_id, $call_id, $recording_id, $transcribe_recording, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->transcribeCallRecording: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
| **transcribe_recording** | [**\Bandwidth\Model\TranscribeRecording**](../Model/TranscribeRecording.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

void (empty response body)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCallRecordingState()`

```php
updateCallRecordingState($account_id, $call_id, $update_call_recording)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Update Recording

Pause or resume a recording on an active phone call.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\RecordingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$update_call_recording = new \Bandwidth\Model\UpdateCallRecording(); // \Bandwidth\Model\UpdateCallRecording

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateCallRecordingState($account_id, $call_id, $update_call_recording, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling RecordingsApi->updateCallRecordingState: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **update_call_recording** | [**\Bandwidth\Model\UpdateCallRecording**](../Model/UpdateCallRecording.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

void (empty response body)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
