# Message

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The id of the message. | [optional]
**owner** | **string** | The Bandwidth phone number associated with the message. | [optional]
**application_id** | **string** | The ID of the Application your from number or senderId is associated with in the Bandwidth App. | [optional]
**time** | **\DateTime** | The datetime stamp of the message in ISO 8601 | [optional]
**segment_count** | **int** | The number of segments the user&#39;s message is broken into before sending over carrier networks. | [optional]
**direction** | [**\Bandwidth\Model\MessageDirectionEnum**](MessageDirectionEnum.md) |  | [optional]
**to** | **string[]** | The phone number recipients of the message. | [optional]
**from** | **string** | The phone number the message was sent from. | [optional]
**media** | **string[]** | The list of media URLs sent in the message. Including a &#x60;filename&#x60; field in the &#x60;Content-Disposition&#x60; header of the media linked with a URL will set the displayed file name. This is a best practice to ensure that your media has a readable file name. | [optional]
**text** | **string** | The contents of the message. | [optional]
**tag** | **string** | A custom string that will be included in callback events of the message. Max 1024 characters. | [optional]
**priority** | [**\Bandwidth\Model\PriorityEnum**](PriorityEnum.md) |  | [optional]
**expiration** | **\DateTime** | A string with the date/time value that the message will automatically expire by. This must be a valid RFC-3339 value, e.g., 2021-03-14T01:59:26Z or 2021-03-13T20:59:26-05:00. Must be a date-time in the future. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
