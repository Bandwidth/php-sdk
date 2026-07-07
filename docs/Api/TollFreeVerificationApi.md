# OpenAPI\Client\TollFreeVerificationApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createWebhookSubscription()**](TollFreeVerificationApi.md#createWebhookSubscription) | **POST** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions | Create Webhook Subscription |
| [**deleteVerificationRequest()**](TollFreeVerificationApi.md#deleteVerificationRequest) | **DELETE** /accounts/{accountId}/phoneNumbers/{phoneNumber}/tollFreeVerification | Delete a Toll-Free Verification Submission |
| [**deleteWebhookSubscription()**](TollFreeVerificationApi.md#deleteWebhookSubscription) | **DELETE** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions/{id} | Delete Webhook Subscription |
| [**getTollFreeVerificationStatus()**](TollFreeVerificationApi.md#getTollFreeVerificationStatus) | **GET** /accounts/{accountId}/phoneNumbers/{phoneNumber}/tollFreeVerification | Get Toll-Free Verification Status |
| [**listTollFreeUseCases()**](TollFreeVerificationApi.md#listTollFreeUseCases) | **GET** /tollFreeVerification/useCases | List Toll-Free Use Cases |
| [**listWebhookSubscriptions()**](TollFreeVerificationApi.md#listWebhookSubscriptions) | **GET** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions | List Webhook Subscriptions |
| [**requestTollFreeVerification()**](TollFreeVerificationApi.md#requestTollFreeVerification) | **POST** /accounts/{accountId}/tollFreeVerification | Request Toll-Free Verification |
| [**updateTollFreeVerificationRequest()**](TollFreeVerificationApi.md#updateTollFreeVerificationRequest) | **PUT** /accounts/{accountId}/phoneNumbers/{phoneNumber}/tollFreeVerification | Update Toll-Free Verification Request |
| [**updateWebhookSubscription()**](TollFreeVerificationApi.md#updateWebhookSubscription) | **PUT** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions/{id} | Update Webhook Subscription |


## `createWebhookSubscription()`

```php
createWebhookSubscription($account_id, $webhook_subscription_request_schema): \OpenAPI\Client\Model\WebhookSubscription
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
Create Webhook Subscription

Create a new webhook subscription (this webhook will be called for every update on every submission). In addition to a `callbackUrl`, this subscription can provide optional HTTP basic authentication credentials (a username and a password). The returned subscription object will contain an ID that can be used to modify or delete the subscription at a later time.

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$webhook_subscription_request_schema = new \OpenAPI\Client\Model\WebhookSubscriptionRequestSchema(); // \OpenAPI\Client\Model\WebhookSubscriptionRequestSchema | Information about a webhook that Bandwidth should send upon the completion of event customer is trying to subscribe to.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createWebhookSubscription($account_id, $webhook_subscription_request_schema, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->createWebhookSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **webhook_subscription_request_schema** | [**\OpenAPI\Client\Model\WebhookSubscriptionRequestSchema**](../Model/WebhookSubscriptionRequestSchema.md)| Information about a webhook that Bandwidth should send upon the completion of event customer is trying to subscribe to. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\WebhookSubscription**](../Model/WebhookSubscription.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteVerificationRequest()`

```php
deleteVerificationRequest($account_id, $phone_number)
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
Delete a Toll-Free Verification Submission

Delete a toll-free verification submission for a toll-free number.

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$phone_number = +18885555555; // string | Valid Toll-Free telephone number in E.164 format.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteVerificationRequest($account_id, $phone_number, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->deleteVerificationRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **phone_number** | **string**| Valid Toll-Free telephone number in E.164 format. | |
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

## `deleteWebhookSubscription()`

```php
deleteWebhookSubscription($account_id, $id)
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
Delete Webhook Subscription

Delete a webhook subscription by ID.

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$id = 7bt57JcsVYJrN9K1OcV1Nu; // string | Webhook subscription ID

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->deleteWebhookSubscription($account_id, $id, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->deleteWebhookSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **id** | **string**| Webhook subscription ID | |
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

## `getTollFreeVerificationStatus()`

```php
getTollFreeVerificationStatus($account_id, $phone_number): \OpenAPI\Client\Model\TfvStatus
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
Get Toll-Free Verification Status

Gets the verification status for a phone number that is provisioned to your account. Submission information will be appended to the response if it is available.

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$phone_number = +18885555555; // string | Valid Toll-Free telephone number in E.164 format.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getTollFreeVerificationStatus($account_id, $phone_number, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->getTollFreeVerificationStatus: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **phone_number** | **string**| Valid Toll-Free telephone number in E.164 format. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\TfvStatus**](../Model/TfvStatus.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listTollFreeUseCases()`

```php
listTollFreeUseCases(): string[]
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
List Toll-Free Use Cases

Lists valid toll-free use cases.

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listTollFreeUseCases($hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->listTollFreeUseCases: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**string[]**

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listWebhookSubscriptions()`

```php
listWebhookSubscriptions($account_id): \OpenAPI\Client\Model\WebhookSubscriptionsListBody
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
List Webhook Subscriptions

Lists all webhook subscriptions that are registered to receive status updates for the toll-free verification requests submitted under this account (password will not be returned through this API If `basicAuthentication` is defined, the `password` property of that object will be null).

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listWebhookSubscriptions($account_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->listWebhookSubscriptions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\WebhookSubscriptionsListBody**](../Model/WebhookSubscriptionsListBody.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `requestTollFreeVerification()`

```php
requestTollFreeVerification($account_id, $verification_request)
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
Request Toll-Free Verification

Submit a request for verification of a toll-free phone number.

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$verification_request = new \OpenAPI\Client\Model\VerificationRequest(); // \OpenAPI\Client\Model\VerificationRequest | Request for verification of a toll-free phone number.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->requestTollFreeVerification($account_id, $verification_request, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->requestTollFreeVerification: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **verification_request** | [**\OpenAPI\Client\Model\VerificationRequest**](../Model/VerificationRequest.md)| Request for verification of a toll-free phone number. | |
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

## `updateTollFreeVerificationRequest()`

```php
updateTollFreeVerificationRequest($account_id, $phone_number, $tfv_submission_wrapper)
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
Update Toll-Free Verification Request

Updates a toll-free verification request. Submissions are only eligible for resubmission for 7 days within being processed and if resubmission is allowed (resubmitAllowed field is true).

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$phone_number = +18885555555; // string | Valid Toll-Free telephone number in E.164 format.
$tfv_submission_wrapper = new \OpenAPI\Client\Model\TfvSubmissionWrapper(); // \OpenAPI\Client\Model\TfvSubmissionWrapper | Update a request for verification of a toll-free phone number.

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->updateTollFreeVerificationRequest($account_id, $phone_number, $tfv_submission_wrapper, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->updateTollFreeVerificationRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **phone_number** | **string**| Valid Toll-Free telephone number in E.164 format. | |
| **tfv_submission_wrapper** | [**\OpenAPI\Client\Model\TfvSubmissionWrapper**](../Model/TfvSubmissionWrapper.md)| Update a request for verification of a toll-free phone number. | |
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

## `updateWebhookSubscription()`

```php
updateWebhookSubscription($account_id, $id, $webhook_subscription_request_schema): \OpenAPI\Client\Model\WebhookSubscription
```
### URI(s):
- https://api.bandwidth.com/api/v2 Production
Update Webhook Subscription

Update an existing webhook subscription (`callbackUrl` and `basicAuthentication` can be updated).

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


$apiInstance = new OpenAPI\Client\Api\TollFreeVerificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$id = 7bt57JcsVYJrN9K1OcV1Nu; // string | Webhook subscription ID
$webhook_subscription_request_schema = new \OpenAPI\Client\Model\WebhookSubscriptionRequestSchema(); // \OpenAPI\Client\Model\WebhookSubscriptionRequestSchema | Information about a webhook that Bandwidth should send upon the completion of event customer is trying to subscribe to.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->updateWebhookSubscription($account_id, $id, $webhook_subscription_request_schema, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TollFreeVerificationApi->updateWebhookSubscription: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **id** | **string**| Webhook subscription ID | |
| **webhook_subscription_request_schema** | [**\OpenAPI\Client\Model\WebhookSubscriptionRequestSchema**](../Model/WebhookSubscriptionRequestSchema.md)| Information about a webhook that Bandwidth should send upon the completion of event customer is trying to subscribe to. | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\OpenAPI\Client\Model\WebhookSubscription**](../Model/WebhookSubscription.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
