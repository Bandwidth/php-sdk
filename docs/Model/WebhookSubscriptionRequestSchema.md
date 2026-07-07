# WebhookSubscriptionRequestSchema

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**basic_authentication** | [**\OpenAPI\Client\Model\TfvBasicAuthentication**](TfvBasicAuthentication.md) |  | [optional]
**callback_url** | **string** | Callback URL to receive status updates from Bandwidth. When a webhook subscription is registered with Bandwidth under a given account ID, it will be used to send status updates for all requests submitted under that account ID. |
**shared_secret_key** | **string** | An ASCII string submitted by the user as a shared secret key for generating an HMAC header for callbacks. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
