# UpdateConference

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**status** | [**\Bandwidth\Model\ConferenceStateEnum**](ConferenceStateEnum.md) |  | [optional]
**redirect_url** | **string** | The URL to send the [conferenceRedirect](/docs/voice/webhooks/conferenceRedirect) event which will provide new BXML. Not allowed if &#x60;state&#x60; is &#x60;completed&#x60;, but required if &#x60;state&#x60; is &#x60;active&#x60;. | [optional]
**redirect_method** | [**\Bandwidth\Model\RedirectMethodEnum**](RedirectMethodEnum.md) |  | [optional]
**username** | **string** | Basic auth username. | [optional]
**password** | **string** | Basic auth password. | [optional]
**redirect_fallback_url** | **string** | A fallback url which, if provided, will be used to retry the &#x60;conferenceRedirect&#x60; webhook delivery in case &#x60;redirectUrl&#x60; fails to respond.  Not allowed if &#x60;state&#x60; is &#x60;completed&#x60;. | [optional]
**redirect_fallback_method** | [**\Bandwidth\Model\RedirectMethodEnum**](RedirectMethodEnum.md) |  | [optional]
**fallback_username** | **string** | Basic auth username. | [optional]
**fallback_password** | **string** | Basic auth password. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
