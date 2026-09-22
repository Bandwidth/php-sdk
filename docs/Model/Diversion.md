# Diversion

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**reason** | **string** | The reason for the diversion. Common values: unknown, user-busy, no-answer, unavailable, unconditional, time-of-day, do-not-disturb, deflection, follow-me, out-of-service, away. | [optional]
**privacy** | **string** | off or full | [optional]
**screen** | **string** | No if the number was provided by the user, yes if the number was provided by the network | [optional]
**counter** | **string** | The number of diversions that have occurred | [optional]
**limit** | **string** | The maximum number of diversions allowed for this session | [optional]
**unknown** | **string** | The normal list of values is not exhaustive. Your application must be tolerant of unlisted keys and unlisted values of those keys. | [optional]
**orig_to** | **string** | Always present. Indicates the last telephone number that the call was diverted from. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
