# WebhookSubscription

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** |  | [optional]
**account_id** | **string** |  | [optional]
**callback_url** | **string** | Callback URL to receive status updates from Bandwidth. When a webhook subscription is registered with Bandwidth under a given account ID, it will be used to send status updates for all requests submitted under that account ID. |
**type** | [**\OpenAPI\Client\Model\WebhookSubscriptionTypeEnum**](WebhookSubscriptionTypeEnum.md) |  | [optional]
**basic_authentication** | [**\OpenAPI\Client\Model\WebhookSubscriptionBasicAuthentication**](WebhookSubscriptionBasicAuthentication.md) |  | [optional]
**created_date** | **\DateTime** |  | [optional]
**modified_date** | **\DateTime** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
