# OpenAPI\Client\MultiChannelApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createMultiChannelMessage()**](MultiChannelApi.md#createMultiChannelMessage) | **POST** /users/{accountId}/messages/multiChannel | Create Multi-Channel Message |


## `createMultiChannelMessage()`

```php
createMultiChannelMessage($account_id, $multi_channel_message_request): \OpenAPI\Client\Model\CreateMultiChannelMessageResponse
```
### URI(s):
- https://messaging.bandwidth.com/api/v2 Production
Create Multi-Channel Message

Endpoint for sending Multi-Channel messages.

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


$apiInstance = new OpenAPI\Client\Api\MultiChannelApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$multi_channel_message_request = new \OpenAPI\Client\Model\MultiChannelMessageRequest(); // \OpenAPI\Client\Model\MultiChannelMessageRequest

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createMultiChannelMessage($account_id, $multi_channel_message_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MultiChannelApi->createMultiChannelMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **multi_channel_message_request** | [**\OpenAPI\Client\Model\MultiChannelMessageRequest**](../Model/MultiChannelMessageRequest.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CreateMultiChannelMessageResponse**](../Model/CreateMultiChannelMessageResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
