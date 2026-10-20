# RbmSession

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**can_initiate** | **bool** | Whether the message can start an interactive session. &#x60;false&#x60; if the message is already part of an active session, or if the agent is not eligible for interactive session billing. |
**id** | **string** | The unique identifier of the interactive session the message is part of. This is not a message ID. Omitted if the message is not part of a session. | [optional]
**type** | **string** | The type of the interactive session. Only present on &#x60;session-started&#x60; callbacks. | [optional]
**start_time** | **\DateTime** | The time the 24-hour session window opened. Only present on &#x60;session-started&#x60; callbacks. | [optional]
**end_time** | **\DateTime** | The time the 24-hour session window closes. Only present on &#x60;session-started&#x60; callbacks. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
