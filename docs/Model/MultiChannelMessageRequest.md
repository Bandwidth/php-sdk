# MultiChannelMessageRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**to** | **string** | The phone number the message should be sent to in E164 format. |
**channel_list** | [**\Bandwidth\Model\MultiChannelChannelListRequestObject[]**](MultiChannelChannelListRequestObject.md) | A list of message bodies. The messages will be attempted in the order they are listed. Once a message sends successfully, the others will be ignored. |
**tag** | **string** | A custom string that will be included in callback events of the message. Max 1024 characters. | [optional]
**priority** | [**\Bandwidth\Model\PriorityEnum**](PriorityEnum.md) |  | [optional]
**expiration** | **\DateTime** | A string with the date/time value that the message will automatically expire by. This must be a valid RFC-3339 value, e.g., 2021-03-14T01:59:26Z or 2021-03-13T20:59:26-05:00. Must be a date-time in the future. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
