# OpenAPI\Client\CallsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCall()**](CallsApi.md#createCall) | **POST** /accounts/{accountId}/calls | Create Call |
| [**getCallState()**](CallsApi.md#getCallState) | **GET** /accounts/{accountId}/calls/{callId} | Get Call State Information |
| [**listCalls()**](CallsApi.md#listCalls) | **GET** /accounts/{accountId}/calls | Get Calls |
| [**updateCall()**](CallsApi.md#updateCall) | **POST** /accounts/{accountId}/calls/{callId} | Update Call |
| [**updateCallBxml()**](CallsApi.md#updateCallBxml) | **PUT** /accounts/{accountId}/calls/{callId}/bxml | Update Call BXML |


## `createCall()`

```php
createCall($account_id, $create_call): \OpenAPI\Client\Model\CreateCallResponse
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Create Call

Creates an outbound phone call.  All calls are initially queued. Your outbound calls will initiated at a specific dequeueing rate, enabling your application to \"fire and forget\" when creating calls. Queued calls may not be modified until they are dequeued and placed, but may be removed from your queue on demand.  <b>Please note:</b> Calls submitted to your queue will be placed approximately in order, but exact ordering is not guaranteed.

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


$apiInstance = new OpenAPI\Client\Api\CallsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$create_call = new \OpenAPI\Client\Model\CreateCall(); // \OpenAPI\Client\Model\CreateCall | JSON object containing information to create an outbound call

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createCall($account_id, $create_call, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CallsApi->createCall: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **create_call** | [**\OpenAPI\Client\Model\CreateCall**](../Model/CreateCall.md)| JSON object containing information to create an outbound call | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateCallResponse**](../Model/CreateCallResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCallState()`

```php
getCallState($account_id, $call_id): \OpenAPI\Client\Model\CallState
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Call State Information

Retrieve the current state of a specific call. This information is near-realtime, so it may take a few minutes for your call to be accessible using this endpoint.  **Note**: Call information is kept for 7 days after the calls are hung up. If you attempt to retrieve information for a call that is older than 7 days, you will get an HTTP 404 response.

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


$apiInstance = new OpenAPI\Client\Api\CallsApi(
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
    $result = $apiInstance->getCallState($account_id, $call_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CallsApi->getCallState: ', $e->getMessage(), PHP_EOL;
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

[**\OpenAPI\Client\Model\CallState**](../Model/CallState.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listCalls()`

```php
listCalls($account_id, $to, $from, $min_start_time, $max_start_time, $disconnect_cause, $page_size, $page_token): \OpenAPI\Client\Model\CallState[]
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Get Calls

Returns a max of 10000 calls, sorted by `createdTime` from oldest to newest.  **NOTE:** If the number of calls in the account is bigger than `pageSize`, a `Link` header (with format `<{url}>; rel=\"next\"`) will be returned in the response. The url can be used to retrieve the next page of call records. Also, call information is kept for 7 days after the calls are hung up. If you attempt to retrieve information for a call that is older than 7 days, you will get an empty array [] in response.

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


$apiInstance = new OpenAPI\Client\Api\CallsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$to = %2b19195551234; // string | Filter results by the `to` field.
$from = %2b19195554321; // string | Filter results by the `from` field.
$min_start_time = 2022-06-21T19:13:21Z; // string | Filter results to calls which have a `startTime` after or including `minStartTime` (in ISO8601 format).
$max_start_time = 2022-06-21T19:13:21Z; // string | Filter results to calls which have a `startTime` before or including `maxStartTime` (in ISO8601 format).
$disconnect_cause = hangup; // string | Filter results to calls with specified call Disconnect Cause.
$page_size = 500; // int | Specifies the max number of calls that will be returned.
$page_token = eyJwYWdlVG9rZW4iOiJ0b2tlbiJ9; // string | Not intended for explicit use. To use pagination, follow the links in the `Link` header of the response, as indicated in the endpoint description.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listCalls($account_id, $to, $from, $min_start_time, $max_start_time, $disconnect_cause, $page_size, $page_token, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CallsApi->listCalls: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **to** | **string**| Filter results by the &#x60;to&#x60; field. | [optional] |
| **from** | **string**| Filter results by the &#x60;from&#x60; field. | [optional] |
| **min_start_time** | **string**| Filter results to calls which have a &#x60;startTime&#x60; after or including &#x60;minStartTime&#x60; (in ISO8601 format). | [optional] |
| **max_start_time** | **string**| Filter results to calls which have a &#x60;startTime&#x60; before or including &#x60;maxStartTime&#x60; (in ISO8601 format). | [optional] |
| **disconnect_cause** | **string**| Filter results to calls with specified call Disconnect Cause. | [optional] |
| **page_size** | **int**| Specifies the max number of calls that will be returned. | [optional] [default to 1000] |
| **page_token** | **string**| Not intended for explicit use. To use pagination, follow the links in the &#x60;Link&#x60; header of the response, as indicated in the endpoint description. | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CallState[]**](../Model/CallState.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCall()`

```php
updateCall($account_id, $call_id, $update_call)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Update Call

Interrupts and redirects a call to a different URL that should return a BXML document.

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


$apiInstance = new OpenAPI\Client\Api\CallsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$update_call = new \OpenAPI\Client\Model\UpdateCall(); // \OpenAPI\Client\Model\UpdateCall | JSON object containing information to redirect an existing call to a new BXML document

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateCall($account_id, $call_id, $update_call, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling CallsApi->updateCall: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
| **update_call** | [**\OpenAPI\Client\Model\UpdateCall**](../Model/UpdateCall.md)| JSON object containing information to redirect an existing call to a new BXML document | |
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

## `updateCallBxml()`

```php
updateCallBxml($account_id, $call_id, $body)
```
### URI(s):
- https://voice.bandwidth.com/api/v2 Production
Update Call BXML

Interrupts and replaces an active call's BXML document.

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


$apiInstance = new OpenAPI\Client\Api\CallsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$call_id = c-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | Programmable Voice API Call ID.
$body = <?xml version=\"1.0\" encoding=\"UTF-8\"?>
<Bxml>
  <SpeakSentence>This is a test sentence.</SpeakSentence>
</Bxml>; // string

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateCallBxml($account_id, $call_id, $body, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling CallsApi->updateCallBxml: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **call_id** | **string**| Programmable Voice API Call ID. | |
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
