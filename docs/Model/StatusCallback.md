# StatusCallback

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**time** | **\DateTime** |  |
**event_time** | **\DateTime** | Represents the time at which the message was read, for &#x60;message-read&#x60; callbacks. | [optional]
**type** | [**\OpenAPI\Client\Model\StatusCallbackTypeEnum**](StatusCallbackTypeEnum.md) |  |
**to** | **string** | The destination phone number the message was sent to. For status callbacks, this the the Bandwidth user&#39;s client phone number. |
**description** | **string** | A detailed description of the event described by the callback. |
**message** | [**\OpenAPI\Client\Model\StatusCallbackMessage**](StatusCallbackMessage.md) |  |
**error_code** | **int** | Optional error code, applicable only when type is &#x60;message-failed&#x60;. | [optional]
**carrier_name** | **string** | The name of the Authorized Message Provider (AMP) that handled this message. In the US, this is the carrier that the message was sent to. This field is present only when this account feature has been enabled. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
