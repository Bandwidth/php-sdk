# UpdateCall

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**state** | [**\OpenAPI\Client\Model\CallStateEnum**](CallStateEnum.md) |  | [optional]
**redirect_url** | **string** | The URL to send the [Redirect](/docs/voice/bxml/redirect) event to which will provide new BXML.  Required if &#x60;state&#x60; is &#x60;active&#x60;.  Not allowed if &#x60;state&#x60; is &#x60;completed&#x60;. | [optional]
**redirect_method** | [**\OpenAPI\Client\Model\RedirectMethodEnum**](RedirectMethodEnum.md) |  | [optional]
**username** | **string** | Basic auth username. | [optional]
**password** | **string** | Basic auth password. | [optional]
**redirect_fallback_url** | **string** | A fallback url which, if provided, will be used to retry the redirect callback delivery in case &#x60;redirectUrl&#x60; fails to respond. | [optional]
**redirect_fallback_method** | [**\OpenAPI\Client\Model\RedirectMethodEnum**](RedirectMethodEnum.md) |  | [optional]
**fallback_username** | **string** | Basic auth username. | [optional]
**fallback_password** | **string** | Basic auth password. | [optional]
**tag** | **string** | A custom string that will be sent with this and all future callbacks unless overwritten by a future &#x60;tag&#x60; attribute or [&#x60;&lt;Tag&gt;&#x60;](/docs/voice/bxml/tag) verb, or cleared.  May be cleared by setting &#x60;tag&#x3D;\&quot;\&quot;&#x60;.  Max length 4096 characters.  Not allowed if &#x60;state&#x60; is &#x60;completed&#x60;. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
