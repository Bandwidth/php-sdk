# Bandwidth\EndpointsApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createEndpoint()**](EndpointsApi.md#createEndpoint) | **POST** /accounts/{accountId}/endpoints | Create Endpoint |
| [**deleteEndpoint()**](EndpointsApi.md#deleteEndpoint) | **DELETE** /accounts/{accountId}/endpoints/{endpointId} | Delete Endpoint |
| [**getEndpoint()**](EndpointsApi.md#getEndpoint) | **GET** /accounts/{accountId}/endpoints/{endpointId} | Get Endpoint |
| [**listEndpoints()**](EndpointsApi.md#listEndpoints) | **GET** /accounts/{accountId}/endpoints | List Endpoints |
| [**updateEndpointBxml()**](EndpointsApi.md#updateEndpointBxml) | **PUT** /accounts/{accountId}/endpoints/{endpointId}/bxml | Update Endpoint BXML |


## `createEndpoint()`

```php
createEndpoint($account_id, $body): \Bandwidth\Model\CreateEndpointResponse
```
### URI(s):
- https://api.bandwidth.com/v2 Production
Create Endpoint

Creates a new Endpoint for the specified account.

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


$apiInstance = new Bandwidth\Api\EndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$body = new \Bandwidth\Model\CreateWebRtcConnectionRequest(); // \Bandwidth\Model\CreateWebRtcConnectionRequest

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createEndpoint($account_id, $body, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EndpointsApi->createEndpoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **body** | **\Bandwidth\Model\CreateWebRtcConnectionRequest**|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\CreateEndpointResponse**](../Model/CreateEndpointResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteEndpoint()`

```php
deleteEndpoint($account_id, $endpoint_id)
```
### URI(s):
- https://api.bandwidth.com/v2 Production
Delete Endpoint

Deletes the specified endpoint. If the endpoint is actively streaming media, the media stream will be terminated.

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


$apiInstance = new Bandwidth\Api\EndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$endpoint_id = e-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | BRTC Endpoint ID.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteEndpoint($account_id, $endpoint_id, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling EndpointsApi->deleteEndpoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **endpoint_id** | **string**| BRTC Endpoint ID. | |
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

## `getEndpoint()`

```php
getEndpoint($account_id, $endpoint_id): \Bandwidth\Model\EndpointResponse
```
### URI(s):
- https://api.bandwidth.com/v2 Production
Get Endpoint

Returns information about the specified endpoint.

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


$apiInstance = new Bandwidth\Api\EndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$endpoint_id = e-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | BRTC Endpoint ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getEndpoint($account_id, $endpoint_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EndpointsApi->getEndpoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **endpoint_id** | **string**| BRTC Endpoint ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\EndpointResponse**](../Model/EndpointResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listEndpoints()`

```php
listEndpoints($account_id, $type, $status, $after_cursor, $limit): \Bandwidth\Model\ListEndpointsResponse
```
### URI(s):
- https://api.bandwidth.com/v2 Production
List Endpoints

Returns a list of endpoints associated with the specified account.

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


$apiInstance = new Bandwidth\Api\EndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$type = new \Bandwidth\Model\\Bandwidth\Model\EndpointTypeEnum(); // \Bandwidth\Model\EndpointTypeEnum | The type of endpoint.
$status = new \Bandwidth\Model\\Bandwidth\Model\EndpointStatusEnum(); // \Bandwidth\Model\EndpointStatusEnum | The status of the endpoint.
$after_cursor = TWF5IHRoZSBmb3JjZSBiZSB3aXRoIHlvdQ==; // string | The cursor to use for pagination. This is the value of the `next` link in the previous response.
$limit = 2; // int | The maximum number of endpoints to return in the response.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listEndpoints($account_id, $type, $status, $after_cursor, $limit, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EndpointsApi->listEndpoints: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **type** | [**\Bandwidth\Model\EndpointTypeEnum**](../Model/.md)| The type of endpoint. | [optional] |
| **status** | [**\Bandwidth\Model\EndpointStatusEnum**](../Model/.md)| The status of the endpoint. | [optional] |
| **after_cursor** | **string**| The cursor to use for pagination. This is the value of the &#x60;next&#x60; link in the previous response. | [optional] |
| **limit** | **int**| The maximum number of endpoints to return in the response. | [optional] [default to 100] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\ListEndpointsResponse**](../Model/ListEndpointsResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateEndpointBxml()`

```php
updateEndpointBxml($account_id, $endpoint_id, $body)
```
### URI(s):
- https://api.bandwidth.com/v2 Production
Update Endpoint BXML

Updates the BXML for the specified endpoint.

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


$apiInstance = new Bandwidth\Api\EndpointsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$endpoint_id = e-15ac29a2-1331029c-2cb0-4a07-b215-b22865662d85; // string | BRTC Endpoint ID.
$body = 'body_example'; // string

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateEndpointBxml($account_id, $endpoint_id, $body, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling EndpointsApi->updateEndpointBxml: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **endpoint_id** | **string**| BRTC Endpoint ID. | |
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
