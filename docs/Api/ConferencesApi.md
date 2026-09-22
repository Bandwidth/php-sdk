# Bandwidth\ConferencesApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**downloadConferenceRecording()**](ConferencesApi.md#downloadConferenceRecording) | **GET** /accounts/{accountId}/conferences/{conferenceId}/recordings/{recordingId}/media | Download Conference Recording |
| [**getConference()**](ConferencesApi.md#getConference) | **GET** /accounts/{accountId}/conferences/{conferenceId} | Get Conference Information |
| [**getConferenceMember()**](ConferencesApi.md#getConferenceMember) | **GET** /accounts/{accountId}/conferences/{conferenceId}/members/{memberId} | Get Conference Member |
| [**getConferenceRecording()**](ConferencesApi.md#getConferenceRecording) | **GET** /accounts/{accountId}/conferences/{conferenceId}/recordings/{recordingId} | Get Conference Recording Information |
| [**listConferenceRecordings()**](ConferencesApi.md#listConferenceRecordings) | **GET** /accounts/{accountId}/conferences/{conferenceId}/recordings | Get Conference Recordings |
| [**listConferences()**](ConferencesApi.md#listConferences) | **GET** /accounts/{accountId}/conferences | Get Conferences |
| [**updateConference()**](ConferencesApi.md#updateConference) | **POST** /accounts/{accountId}/conferences/{conferenceId} | Update Conference |
| [**updateConferenceBxml()**](ConferencesApi.md#updateConferenceBxml) | **PUT** /accounts/{accountId}/conferences/{conferenceId}/bxml | Update Conference BXML |
| [**updateConferenceMember()**](ConferencesApi.md#updateConferenceMember) | **PUT** /accounts/{accountId}/conferences/{conferenceId}/members/{memberId} | Update Conference Member |


## `downloadConferenceRecording()`

```php
downloadConferenceRecording($account_id, $conference_id, $recording_id): \SplFileObject
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Download Conference Recording

Downloads the specified recording file.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->downloadConferenceRecording($account_id, $conference_id, $recording_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->downloadConferenceRecording: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
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

## `getConference()`

```php
getConference($account_id, $conference_id): \Bandwidth\Model\Conference
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Conference Information

Returns information about the specified conference.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getConference($account_id, $conference_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->getConference: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\Conference**](../Model/Conference.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getConferenceMember()`

```php
getConferenceMember($account_id, $conference_id, $member_id): \Bandwidth\Model\ConferenceMember
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Conference Member

Returns information about the specified conference member.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.
$member_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Conference Member ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getConferenceMember($account_id, $conference_id, $member_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->getConferenceMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
| **member_id** | **string**| Programmable Voice API Conference Member ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\ConferenceMember**](../Model/ConferenceMember.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getConferenceRecording()`

```php
getConferenceRecording($account_id, $conference_id, $recording_id): \Bandwidth\Model\ConferenceRecordingMetadata
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Conference Recording Information

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.
$recording_id = r-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Recording ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getConferenceRecording($account_id, $conference_id, $recording_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->getConferenceRecording: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
| **recording_id** | **string**| Programmable Voice API Recording ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\ConferenceRecordingMetadata**](../Model/ConferenceRecordingMetadata.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listConferenceRecordings()`

```php
listConferenceRecordings($account_id, $conference_id): \Bandwidth\Model\ConferenceRecordingMetadata[]
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Conference Recordings

Returns a (potentially empty) list of metadata for the recordings that took place during the specified conference.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listConferenceRecordings($account_id, $conference_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->listConferenceRecordings: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\ConferenceRecordingMetadata[]**](../Model/ConferenceRecordingMetadata.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listConferences()`

```php
listConferences($account_id, $name, $min_created_time, $max_created_time, $page_size, $page_token): \Bandwidth\Model\Conference[]
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Conferences

Returns a max of 1000 conferences, sorted by `createdTime` from oldest to newest.  **NOTE:** If the number of conferences in the account is bigger than `pageSize`, a `Link` header (with format `<{url}>; rel=\"next\"`) will be returned in the response. The url can be used to retrieve the next page of conference records.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$name = my-custom-name; // string | Filter results by the `name` field.
$min_created_time = 2022-06-21T19:13:21Z; // string | Filter results to conferences which have a `createdTime` after or at `minCreatedTime` (in ISO8601 format).
$max_created_time = 2022-06-21T19:13:21Z; // string | Filter results to conferences which have a `createdTime` before or at `maxCreatedTime` (in ISO8601 format).
$page_size = 500; // int | Specifies the max number of conferences that will be returned.
$page_token = eyJwYWdlVG9rZW4iOiJ0b2tlbiJ9; // string | Not intended for explicit use. To use pagination, follow the links in the `Link` header of the response, as indicated in the endpoint description.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listConferences($account_id, $name, $min_created_time, $max_created_time, $page_size, $page_token, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->listConferences: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **name** | **string**| Filter results by the &#x60;name&#x60; field. | [optional] |
| **min_created_time** | **string**| Filter results to conferences which have a &#x60;createdTime&#x60; after or at &#x60;minCreatedTime&#x60; (in ISO8601 format). | [optional] |
| **max_created_time** | **string**| Filter results to conferences which have a &#x60;createdTime&#x60; before or at &#x60;maxCreatedTime&#x60; (in ISO8601 format). | [optional] |
| **page_size** | **int**| Specifies the max number of conferences that will be returned. | [optional] [default to 1000] |
| **page_token** | **string**| Not intended for explicit use. To use pagination, follow the links in the &#x60;Link&#x60; header of the response, as indicated in the endpoint description. | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\Conference[]**](../Model/Conference.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateConference()`

```php
updateConference($account_id, $conference_id, $update_conference)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Update Conference

Update the conference state.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.
$update_conference = new \Bandwidth\Model\UpdateConference(); // \Bandwidth\Model\UpdateConference

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateConference($account_id, $conference_id, $update_conference, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->updateConference: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
| **update_conference** | [**\Bandwidth\Model\UpdateConference**](../Model/UpdateConference.md)|  | |
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

## `updateConferenceBxml()`

```php
updateConferenceBxml($account_id, $conference_id, $body)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Update Conference BXML

Update the conference BXML document.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.
$body = <?xml version="1.0" encoding="UTF-8"?>
<Bxml>
    <StopRecording/>
</Bxml>; // string

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateConferenceBxml($account_id, $conference_id, $body, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->updateConferenceBxml: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
| **body** | **string**|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

void (empty response body)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/xml`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateConferenceMember()`

```php
updateConferenceMember($account_id, $conference_id, $member_id, $update_conference_member)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Update Conference Member

Updates settings for a particular conference member.

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


$apiInstance = new Bandwidth\Api\ConferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$conference_id = conf-fe23a767-a75a5b77-20c5-4cca-b581-cbbf0776eca9; // string | Programmable Voice API Conference ID.
$member_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Conference Member ID.
$update_conference_member = new \Bandwidth\Model\UpdateConferenceMember(); // \Bandwidth\Model\UpdateConferenceMember

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateConferenceMember($account_id, $conference_id, $member_id, $update_conference_member, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling ConferencesApi->updateConferenceMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **conference_id** | **string**| Programmable Voice API Conference ID. | |
| **member_id** | **string**| Programmable Voice API Conference Member ID. | |
| **update_conference_member** | [**\Bandwidth\Model\UpdateConferenceMember**](../Model/UpdateConferenceMember.md)|  | |
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
