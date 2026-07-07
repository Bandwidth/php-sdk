# Bandwidth\MessagesApi

All URIs are relative to http://localhost, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createMessage()**](MessagesApi.md#createMessage) | **POST** /users/{accountId}/messages | Create Message |
| [**listMessages()**](MessagesApi.md#listMessages) | **GET** /users/{accountId}/messages | List Messages |


## `createMessage()`

```php
createMessage($account_id, $message_request): \Bandwidth\Model\Message
```
### URI(s):
- https://messaging.bandwidth.com/api/v2 Production
Create Message

Endpoint for sending text messages and picture messages using V2 messaging.

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


$apiInstance = new Bandwidth\Api\MessagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$message_request = new \Bandwidth\Model\MessageRequest(); // \Bandwidth\Model\MessageRequest

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->createMessage($account_id, $message_request, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->createMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **message_request** | [**\Bandwidth\Model\MessageRequest**](../Model/MessageRequest.md)|  | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\Message**](../Model/Message.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listMessages()`

```php
listMessages($account_id, $message_id, $source_tn, $destination_tn, $message_status, $message_direction, $carrier_name, $message_type, $error_code, $from_date_time, $to_date_time, $campaign_id, $from_bw_latency, $bw_queued, $product, $location, $carrier_queued, $from_carrier_latency, $calling_number_country_a3, $called_number_country_a3, $from_segment_count, $to_segment_count, $from_message_size, $to_message_size, $sort, $page_token, $limit, $limit_total_count): \Bandwidth\Model\MessagesList
```
### URI(s):
- https://messaging.bandwidth.com/api/v2 Production
List Messages

Returns a list of messages based on query parameters.  **Rate Limit:** This endpoint is rate limited to 3500 requests per 5 minutes per Source IP address. Exceeding the limit returns HTTP 429 with a `Retry-After` header.

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


$apiInstance = new Bandwidth\Api\MessagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$message_id = 9e0df4ca-b18d-40d7-a59f-82fcdf5ae8e6; // string | The ID of the message to search for. Special characters need to be encoded using URL encoding. Message IDs could come in different formats, e.g., 9e0df4ca-b18d-40d7-a59f-82fcdf5ae8e6 and 1589228074636lm4k2je7j7jklbn2 are valid message ID formats. Note that you must include at least one query parameter.
$source_tn = %2B15554443333; // string | The phone number that sent the message. Accepted values are: a single full phone number a comma separated list of full phone numbers (maximum of 10) or a single partial phone number (minimum of 5 characters e.g. '%2B1919').
$destination_tn = %2B15554443333; // string | The phone number that received the message. Accepted values are: a single full phone number a comma separated list of full phone numbers (maximum of 10) or a single partial phone number (minimum of 5 characters e.g. '%2B1919').
$message_status = new \Bandwidth\Model\\Bandwidth\Model\MessageStatusEnum(); // \Bandwidth\Model\MessageStatusEnum | The status of the message. One of RECEIVED QUEUED SENDING SENT FAILED DELIVERED ACCEPTED UNDELIVERED.
$message_direction = new \Bandwidth\Model\\Bandwidth\Model\ListMessageDirectionEnum(); // \Bandwidth\Model\ListMessageDirectionEnum | The direction of the message. One of INBOUND OUTBOUND.
$carrier_name = Verizon; // string | The name of the carrier used for this message. Possible values include but are not limited to Verizon and TMobile. Special characters need to be encoded using URL encoding (i.e. AT&T should be passed as AT%26T).
$message_type = new \Bandwidth\Model\\Bandwidth\Model\MessageTypeEnum(); // \Bandwidth\Model\MessageTypeEnum | The type of message. Either sms or mms.
$error_code = 9902; // int | The error code of the message.
$from_date_time = 2022-09-14T18:20:16.000Z; // string | The start of the date range to search in ISO 8601 format. Uses the message receive time. The date range to search in is currently 14 days.
$to_date_time = 2022-09-14T18:20:16.000Z; // string | The end of the date range to search in ISO 8601 format. Uses the message receive time. The date range to search in is currently 14 days.
$campaign_id = CJEUMDK; // string | The campaign ID of the message.
$from_bw_latency = 5; // int | The minimum Bandwidth latency of the message in seconds. Only available for accounts with the Advanced Quality Metrics feature enabled.
$bw_queued = true; // bool | A boolean value indicating whether the message is queued in the Bandwidth network.
$product = P2P; // \Bandwidth\Model\ProductTypeEnum | Messaging product associated with the message.
$location = 123ABC; // string | Location Id associated with the message.
$carrier_queued = true; // bool | A boolean value indicating whether the message is queued in the carrier network. Only available for OUTBOUND messages from accounts with the Advanced Quality Metrics feature enabled.
$from_carrier_latency = 50; // int | The minimum carrier latency of the message in seconds. Only available for OUTBOUND messages from accounts with the Advanced Quality Metrics feature enabled.
$calling_number_country_a3 = USA; // string | Calling number country in A3 format.
$called_number_country_a3 = USA; // string | Called number country in A3 format.
$from_segment_count = 1; // int | Segment count (start range).
$to_segment_count = 3; // int | Segment count (end range).
$from_message_size = 100; // int | Message size (start range).
$to_message_size = 120; // int | Message size (end range).
$sort = sourceTn:desc; // string | The field and direction to sort by combined with a colon. Direction is either asc or desc.
$page_token = gdEewhcJLQRB5; // string | A base64 encoded value used for pagination of results.
$limit = 50; // int | The maximum records requested in search result. Default 100. The sum of limit and after cannot be more than 10000.
$limit_total_count = true; // bool | When set to true, the response's totalCount field will have a maximum value of 10,000. When set to false, or excluded, this will give an accurate totalCount of all messages that match the provided filters. If you are experiencing latency, try using this parameter to limit your results.

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->listMessages($account_id, $message_id, $source_tn, $destination_tn, $message_status, $message_direction, $carrier_name, $message_type, $error_code, $from_date_time, $to_date_time, $campaign_id, $from_bw_latency, $bw_queued, $product, $location, $carrier_queued, $from_carrier_latency, $calling_number_country_a3, $called_number_country_a3, $from_segment_count, $to_segment_count, $from_message_size, $to_message_size, $sort, $page_token, $limit, $limit_total_count, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->listMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **account_id** | **string**| Your Bandwidth Account ID. | |
| **message_id** | **string**| The ID of the message to search for. Special characters need to be encoded using URL encoding. Message IDs could come in different formats, e.g., 9e0df4ca-b18d-40d7-a59f-82fcdf5ae8e6 and 1589228074636lm4k2je7j7jklbn2 are valid message ID formats. Note that you must include at least one query parameter. | [optional] |
| **source_tn** | **string**| The phone number that sent the message. Accepted values are: a single full phone number a comma separated list of full phone numbers (maximum of 10) or a single partial phone number (minimum of 5 characters e.g. &#39;%2B1919&#39;). | [optional] |
| **destination_tn** | **string**| The phone number that received the message. Accepted values are: a single full phone number a comma separated list of full phone numbers (maximum of 10) or a single partial phone number (minimum of 5 characters e.g. &#39;%2B1919&#39;). | [optional] |
| **message_status** | [**\Bandwidth\Model\MessageStatusEnum**](../Model/.md)| The status of the message. One of RECEIVED QUEUED SENDING SENT FAILED DELIVERED ACCEPTED UNDELIVERED. | [optional] |
| **message_direction** | [**\Bandwidth\Model\ListMessageDirectionEnum**](../Model/.md)| The direction of the message. One of INBOUND OUTBOUND. | [optional] |
| **carrier_name** | **string**| The name of the carrier used for this message. Possible values include but are not limited to Verizon and TMobile. Special characters need to be encoded using URL encoding (i.e. AT&amp;T should be passed as AT%26T). | [optional] |
| **message_type** | [**\Bandwidth\Model\MessageTypeEnum**](../Model/.md)| The type of message. Either sms or mms. | [optional] |
| **error_code** | **int**| The error code of the message. | [optional] |
| **from_date_time** | **string**| The start of the date range to search in ISO 8601 format. Uses the message receive time. The date range to search in is currently 14 days. | [optional] |
| **to_date_time** | **string**| The end of the date range to search in ISO 8601 format. Uses the message receive time. The date range to search in is currently 14 days. | [optional] |
| **campaign_id** | **string**| The campaign ID of the message. | [optional] |
| **from_bw_latency** | **int**| The minimum Bandwidth latency of the message in seconds. Only available for accounts with the Advanced Quality Metrics feature enabled. | [optional] |
| **bw_queued** | **bool**| A boolean value indicating whether the message is queued in the Bandwidth network. | [optional] |
| **product** | [**\Bandwidth\Model\ProductTypeEnum**](../Model/.md)| Messaging product associated with the message. | [optional] |
| **location** | **string**| Location Id associated with the message. | [optional] |
| **carrier_queued** | **bool**| A boolean value indicating whether the message is queued in the carrier network. Only available for OUTBOUND messages from accounts with the Advanced Quality Metrics feature enabled. | [optional] |
| **from_carrier_latency** | **int**| The minimum carrier latency of the message in seconds. Only available for OUTBOUND messages from accounts with the Advanced Quality Metrics feature enabled. | [optional] |
| **calling_number_country_a3** | **string**| Calling number country in A3 format. | [optional] |
| **called_number_country_a3** | **string**| Called number country in A3 format. | [optional] |
| **from_segment_count** | **int**| Segment count (start range). | [optional] |
| **to_segment_count** | **int**| Segment count (end range). | [optional] |
| **from_message_size** | **int**| Message size (start range). | [optional] |
| **to_message_size** | **int**| Message size (end range). | [optional] |
| **sort** | **string**| The field and direction to sort by combined with a colon. Direction is either asc or desc. | [optional] |
| **page_token** | **string**| A base64 encoded value used for pagination of results. | [optional] |
| **limit** | **int**| The maximum records requested in search result. Default 100. The sum of limit and after cannot be more than 10000. | [optional] |
| **limit_total_count** | **bool**| When set to true, the response&#39;s totalCount field will have a maximum value of 10,000. When set to false, or excluded, this will give an accurate totalCount of all messages that match the provided filters. If you are experiencing latency, try using this parameter to limit your results. | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\Bandwidth\Model\MessagesList**](../Model/MessagesList.md)

### Authorization

[Basic](../../README.md#Basic), [OAuth2](../../README.md#OAuth2)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
