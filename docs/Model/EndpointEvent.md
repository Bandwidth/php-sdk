# EndpointEvent

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**endpoint_id** | **string** | The unique ID of the endpoint. |
**type** | [**\OpenAPI\Client\Model\EndpointTypeEnum**](EndpointTypeEnum.md) |  |
**status** | [**\OpenAPI\Client\Model\EndpointStatusEnum**](EndpointStatusEnum.md) |  |
**creation_timestamp** | **\DateTime** | The time the endpoint was created. In ISO-8601 format. |
**expiration_timestamp** | **\DateTime** | The time the endpoint token will expire. In ISO-8601 format. Tokens last 24 hours. |
**tag** | **string** | A tag for the endpoint. | [optional]
**event_time** | **\DateTime** | The time the event occurred. In ISO-8601 format. |
**event_type** | [**\OpenAPI\Client\Model\EndpointEventTypeEnum**](EndpointEventTypeEnum.md) |  |
**device** | [**\OpenAPI\Client\Model\Device**](Device.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
