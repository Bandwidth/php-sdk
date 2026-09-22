# Bandwidth\MFAApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**generateMessagingCode()**](MFAApi.md#generateMessagingCode) | **POST** /accounts/{accountId}/code/messaging | Messaging Authentication Code |
| [**generateVoiceCode()**](MFAApi.md#generateVoiceCode) | **POST** /accounts/{accountId}/code/voice | Voice Authentication Code |
| [**verifyCode()**](MFAApi.md#verifyCode) | **POST** /accounts/{accountId}/code/verify | Verify Authentication Code |


## `generateMessagingCode()`

```php
generateMessagingCode($account_id, $code_request): \Bandwidth\Model\MessagingCodeResponse
```
### URI(s):
- https://mfa.bandwidth.com/api/v1 Production
Messaging Authentication Code

Send an MFA code via text message (SMS).

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


$apiInstance = new Bandwidth\Api\MFAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$code_request = new \Bandwidth\Model\CodeRequest(); // \Bandwidth\Model\CodeRequest | MFA code request body.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->generateMessagingCode($account_id, $code_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MFAApi->generateMessagingCode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **code_request** | [**\Bandwidth\Model\CodeRequest**](../Model/CodeRequest.md)| MFA code request body. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\MessagingCodeResponse**](../Model/MessagingCodeResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `generateVoiceCode()`

```php
generateVoiceCode($account_id, $code_request): \Bandwidth\Model\VoiceCodeResponse
```
### URI(s):
- https://mfa.bandwidth.com/api/v1 Production
Voice Authentication Code

Send an MFA Code via a phone call.

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


$apiInstance = new Bandwidth\Api\MFAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$code_request = new \Bandwidth\Model\CodeRequest(); // \Bandwidth\Model\CodeRequest | MFA code request body.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->generateVoiceCode($account_id, $code_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MFAApi->generateVoiceCode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **code_request** | [**\Bandwidth\Model\CodeRequest**](../Model/CodeRequest.md)| MFA code request body. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\VoiceCodeResponse**](../Model/VoiceCodeResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyCode()`

```php
verifyCode($account_id, $verify_code_request): \Bandwidth\Model\VerifyCodeResponse
```
### URI(s):
- https://mfa.bandwidth.com/api/v1 Production
Verify Authentication Code

Verify a previously sent MFA code.

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


$apiInstance = new Bandwidth\Api\MFAApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$verify_code_request = new \Bandwidth\Model\VerifyCodeRequest(); // \Bandwidth\Model\VerifyCodeRequest | MFA code verify request body.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->verifyCode($account_id, $verify_code_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MFAApi->verifyCode: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **verify_code_request** | [**\Bandwidth\Model\VerifyCodeRequest**](../Model/VerifyCodeRequest.md)| MFA code verify request body. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\VerifyCodeResponse**](../Model/VerifyCodeResponse.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
