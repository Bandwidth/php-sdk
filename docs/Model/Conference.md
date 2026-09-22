# Conference

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The Bandwidth-generated conference ID. | [optional]
**name** | **string** | The name of the conference, as specified by your application. | [optional]
**created_time** | **\DateTime** | The time the conference was initiated, in ISO 8601 format. | [optional]
**completed_time** | **\DateTime** | The time the conference was terminated, in ISO 8601 format. | [optional]
**conference_event_url** | **string** | The URL to send the conference-related events. | [optional]
**conference_event_method** | [**\Bandwidth\Model\CallbackMethodEnum**](CallbackMethodEnum.md) |  | [optional]
**tag** | **string** | The custom string attached to the conference that will be sent with callbacks. | [optional]
**active_members** | [**\Bandwidth\Model\ConferenceMember[]**](ConferenceMember.md) | A list of active members of the conference. Omitted if this is a response to the [Get Conferences endpoint](/apis/voice#tag/Conferences/operation/listConferences). | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
