# OpenAPI\Client\PhoneNumberLookupApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createAsyncBulkLookup()**](PhoneNumberLookupApi.md#createAsyncBulkLookup) | **POST** /accounts/{accountId}/phoneNumberLookup/bulk | Create Asynchronous Bulk Number Lookup |
| [**createSyncLookup()**](PhoneNumberLookupApi.md#createSyncLookup) | **POST** /accounts/{accountId}/phoneNumberLookup | Create Synchronous Number Lookup |
| [**getAsyncBulkLookup()**](PhoneNumberLookupApi.md#getAsyncBulkLookup) | **GET** /accounts/{accountId}/phoneNumberLookup/bulk/{requestId} | Get Asynchronous Bulk Number Lookup |


## `createAsyncBulkLookup()`

```php
createAsyncBulkLookup($account_id, $async_lookup_request): \OpenAPI\Client\Model\CreateAsyncBulkLookupResponse
```
### URI(s):
- https://api.bandwidth.com/v2 Production
Create Asynchronous Bulk Number Lookup

Creates an asynchronous bulk phone number lookup request. Maximum of 15,000 telephone numbers per request. Use the [Get Asynchronous Bulk Number Lookup](#tag/Phone-Number-Lookup/operation/getAsyncBulkLookup) endpoint to check the status of the request and view the results.

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


$apiInstance = new OpenAPI\Client\Api\PhoneNumberLookupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string
$async_lookup_request = new \OpenAPI\Client\Model\AsyncLookupRequest(); // \OpenAPI\Client\Model\AsyncLookupRequest | Asynchronous bulk phone number lookup request.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createAsyncBulkLookup($account_id, $async_lookup_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PhoneNumberLookupApi->createAsyncBulkLookup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**|  | |
| **async_lookup_request** | [**\OpenAPI\Client\Model\AsyncLookupRequest**](../Model/AsyncLookupRequest.md)| Asynchronous bulk phone number lookup request. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateAsyncBulkLookupResponse**](../Model/CreateAsyncBulkLookupResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createSyncLookup()`

```php
createSyncLookup($account_id, $sync_lookup_request): \OpenAPI\Client\Model\CreateSyncLookupResponse
```
### URI(s):
- https://api.bandwidth.com/v2 Production
Create Synchronous Number Lookup

Creates a synchronous phone number lookup request. Maximum of 100 telephone numbers per request.

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


$apiInstance = new OpenAPI\Client\Api\PhoneNumberLookupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string
$sync_lookup_request = new \OpenAPI\Client\Model\SyncLookupRequest(); // \OpenAPI\Client\Model\SyncLookupRequest | Synchronous phone number lookup request.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createSyncLookup($account_id, $sync_lookup_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PhoneNumberLookupApi->createSyncLookup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**|  | |
| **sync_lookup_request** | [**\OpenAPI\Client\Model\SyncLookupRequest**](../Model/SyncLookupRequest.md)| Synchronous phone number lookup request. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateSyncLookupResponse**](../Model/CreateSyncLookupResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAsyncBulkLookup()`

```php
getAsyncBulkLookup($account_id, $request_id): \OpenAPI\Client\Model\GetAsyncBulkLookupResponse
```
### URI(s):
- https://api.bandwidth.com/v2 Production
Get Asynchronous Bulk Number Lookup

Get an existing [Asynchronous Bulk Number Lookup](#tag/Phone-Number-Lookup/operation/createAsyncBulkLookup). Use this endpoint to check the status of the request and view the results.

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


$apiInstance = new OpenAPI\Client\Api\PhoneNumberLookupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string
$request_id = 004223a0-8b17-41b1-bf81-20732adf5590; // string

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getAsyncBulkLookup($account_id, $request_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PhoneNumberLookupApi->getAsyncBulkLookup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**|  | |
| **request_id** | **string**|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\GetAsyncBulkLookupResponse**](../Model/GetAsyncBulkLookupResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
