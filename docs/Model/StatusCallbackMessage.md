# StatusCallbackMessage

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | A unique identifier of the message. |
**owner** | **string** | The Bandwidth phone number or alphanumeric identifier associated with the message. |
**application_id** | **string** | The ID of the Application your from number or senderId is associated with in the Bandwidth App. |
**time** | **\DateTime** |  |
**segment_count** | **int** | The number of segments the user&#39;s message is broken into before sending over carrier networks. |
**direction** | [**\OpenAPI\Client\Model\MessageDirectionEnum**](MessageDirectionEnum.md) |  |
**to** | **string[]** | The phone number recipients of the message. |
**from** | **string** | The Bandwidth phone number or alphanumeric identifier the message was sent from. |
**text** | **string** |  | [optional]
**tag** | **string** | A custom string that will be included in callback events of the message. Max 1024 characters. | [optional]
**media** | **string[]** | Optional media, not applicable for sms | [optional]
**priority** | [**\OpenAPI\Client\Model\PriorityEnum**](PriorityEnum.md) |  | [optional]
**channel** | [**\OpenAPI\Client\Model\MultiChannelMessageChannelEnum**](MultiChannelMessageChannelEnum.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
