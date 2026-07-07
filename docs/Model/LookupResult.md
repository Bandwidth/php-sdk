# LookupResult

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**phone_number** | **string** | The telephone number in E.164 format. | [optional]
**line_type** | [**\OpenAPI\Client\Model\LineTypeEnum**](LineTypeEnum.md) |  | [optional]
**messaging_provider** | **string** | The messaging service provider of the telephone number. | [optional]
**voice_provider** | **string** | The voice service provider of the telephone number. | [optional]
**country_code_a3** | **string** | The country code of the telephone number in ISO 3166-1 alpha-3 format. | [optional]
**deactivation_reporter** | **string** | [DNI-Only](#section/DNI-Only). The carrier that reported a deactivation event for this phone number. | [optional]
**deactivation_date** | **string** | [DNI-Only](#section/DNI-Only). The datetime the carrier reported a deactivation event. | [optional]
**deactivation_event** | [**\OpenAPI\Client\Model\DeactivationEventEnum**](DeactivationEventEnum.md) |  | [optional]
**latest_message_delivery_status** | [**\OpenAPI\Client\Model\LatestMessageDeliveryStatusEnum**](LatestMessageDeliveryStatusEnum.md) |  | [optional]
**initial_message_delivery_status_date** | **\DateTime** | [DNI-Only](#section/DNI-Only). The date the phone number entered the status described in &#x60;latestMessageDeliveryStatus&#x60;. Think of this as the \&quot;start time\&quot; for that status. Value resets every time the &#x60;latestMessageDeliveryStatus&#x60; changes. | [optional]
**latest_message_delivery_status_date** | **\DateTime** | [DNI-Only](#section/DNI-Only). The date bandwidth last received delivery status information for this phone number. Use this field to understand how up-to-date the &#x60;latestMessageDeliveryStatus&#x60; is. Value resets every time the &#x60;latestMessageDeliveryStatus&#x60; changes. | [optional]
**rcs_enabled** | **bool** | [RCS-Only](#section/RCS-Only). Indicates whether the phone number is capable of receiving RCS messages. Value will be null if account has RCS, but no value was returned. Absent when account does not have RCS. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
