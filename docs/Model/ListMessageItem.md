# ListMessageItem

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**message_id** | **string** | The message id | [optional]
**account_id** | **string** | The account id associated with this message. | [optional]
**source_tn** | **string** | The source phone number of the message. | [optional]
**destination_tn** | **string** | The recipient phone number of the message. | [optional]
**message_status** | [**\OpenAPI\Client\Model\MessageStatusEnum**](MessageStatusEnum.md) |  | [optional]
**message_direction** | [**\OpenAPI\Client\Model\ListMessageDirectionEnum**](ListMessageDirectionEnum.md) |  | [optional]
**message_type** | [**\OpenAPI\Client\Model\MessageTypeEnum**](MessageTypeEnum.md) |  | [optional]
**segment_count** | **int** | The number of segments the user&#39;s message is broken into before sending over carrier networks. | [optional]
**error_code** | **int** | The numeric error code of the message. | [optional]
**receive_time** | **\DateTime** | The ISO 8601 datetime of the message. | [optional]
**carrier_name** | **string** | The name of the carrier. Not currently supported for MMS coming soon. | [optional]
**message_size** | **int** | The size of the message including message content and headers. | [optional]
**message_length** | **int** | The length of the message content. | [optional]
**attachment_count** | **int** | The number of attachments the message has. | [optional]
**recipient_count** | **int** | The number of recipients the message has. | [optional]
**campaign_class** | **string** | The campaign class of the message if it has one. | [optional]
**campaign_id** | **string** | The campaign ID of the message if it has one. | [optional]
**bw_latency** | **int** | The Bandwidth latency of the message in seconds. Only available for accounts with the Advanced Quality Metrics feature enabled. | [optional]
**carrier_latency** | **int** | The carrier latency of the message in seconds. Only available for OUTBOUND messages from accounts with the Advanced Quality Metrics feature enabled. | [optional]
**calling_number_country_a3** | **string** | The A3 country code of the calling number. | [optional]
**called_number_country_a3** | **string** | The A3 country code of the called number. | [optional]
**product** | **string** | The messaging product associated with the message. | [optional]
**location** | **string** | The location ID associated with this message. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
