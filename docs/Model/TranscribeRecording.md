# TranscribeRecording

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**callback_url** | **string** | The URL to send the [TranscriptionAvailable](/docs/voice/webhooks/transcriptionAvailable) event to. You should not include sensitive or personally-identifiable information in the callbackUrl field! Always use the proper username and password fields for authorization. | [optional]
**callback_method** | [**\Bandwidth\Model\CallbackMethodEnum**](CallbackMethodEnum.md) |  | [optional]
**username** | **string** | Basic auth username. | [optional]
**password** | **string** | Basic auth password. | [optional]
**tag** | **string** | (optional) The tag specified on call creation. If no tag was specified or it was previously cleared, this field will not be present. | [optional]
**callback_timeout** | **float** | This is the timeout (in seconds) to use when delivering the webhook to &#x60;callbackUrl&#x60;. Can be any numeric value (including decimals) between 1 and 25. | [optional] [default to 15]
**detect_language** | **bool** | A boolean value to indicate that the recording may not be in English, and the transcription service will need to detect the dominant language the recording is in and transcribe accordingly. Current supported languages are English, French, and Spanish. | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
