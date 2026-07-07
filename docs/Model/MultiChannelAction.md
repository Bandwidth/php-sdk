# MultiChannelAction

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | [**\Bandwidth\Model\RbmActionTypeEnum**](RbmActionTypeEnum.md) |  |
**text** | **string** | Displayed text for user to click |
**postback_data** | **string** | Base64 payload the customer receives when the reply is clicked. |
**phone_number** | **string** | The phone number to dial. Must be E164 format. |
**latitude** | **float** | The latitude of the location. Must be in range [-90.000000, 90.000000]. |
**longitude** | **float** | The longitude of the location. Must be in range [-180.000000, 180.000000]. |
**label** | **string** | The label of the location. | [optional]
**title** | **string** | The title of the event. |
**start_time** | **\DateTime** | The start time of the event. Must be a valid RFC-3339 value, e.g., 2021-03-14T01:59:26Z or 2021-03-13T20:59:26-05:00. |
**end_time** | **\DateTime** | The end time of the event. Must be a valid RFC-3339 value, e.g., 2021-03-14T01:59:26Z or 2021-03-13T20:59:26-05:00. |
**description** | **string** | The description of the event. | [optional]
**url** | **string** | The URL to open in browser. Must use http:// or https:// scheme. |
**application** | [**\Bandwidth\Model\RbmOpenUrlEnum**](RbmOpenUrlEnum.md) |  | [optional]
**webview_view_mode** | [**\Bandwidth\Model\RbmWebViewEnum**](RbmWebViewEnum.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
