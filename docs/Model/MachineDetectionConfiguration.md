# MachineDetectionConfiguration

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**mode** | [**\OpenAPI\Client\Model\MachineDetectionModeEnum**](MachineDetectionModeEnum.md) |  | [optional]
**detection_timeout** | **float** | The timeout used for the whole operation, in seconds. If no result is determined in this period, a callback with a &#x60;timeout&#x60; result is sent. | [optional] [default to 15]
**silence_timeout** | **float** | If no speech is detected in this period, a callback with a &#39;silence&#39; result is sent. | [optional] [default to 10]
**speech_threshold** | **float** | When speech has ended and a result couldn&#39;t be determined based on the audio content itself, this value is used to determine if the speaker is a machine based on the speech duration. If the length of the speech detected is greater than or equal to this threshold, the result will be &#39;answering-machine&#39;. If the length of speech detected is below this threshold, the result will be &#39;human&#39;. | [optional] [default to 10]
**speech_end_threshold** | **float** | Amount of silence (in seconds) before assuming the callee has finished speaking. | [optional] [default to 5]
**machine_speech_end_threshold** | **float** | When an answering machine is detected, the amount of silence (in seconds) before assuming the message has finished playing. If not provided it will default to the speechEndThreshold value. | [optional]
**delay_result** | **bool** | If set to &#39;true&#39; and if an answering machine is detected, the &#39;answering-machine&#39; callback will be delayed until the machine is done speaking, or an end of message tone is detected, or until the &#39;detectionTimeout&#39; is exceeded. If false, the &#39;answering-machine&#39; result is sent immediately. | [optional] [default to false]
**callback_url** | **string** | The URL to send the &#39;machineDetectionComplete&#39; webhook when the detection is completed. Only for &#39;async&#39; mode. | [optional]
**callback_method** | [**\OpenAPI\Client\Model\CallbackMethodEnum**](CallbackMethodEnum.md) |  | [optional]
**username** | **string** | Basic auth username. | [optional]
**password** | **string** | Basic auth password. | [optional]
**fallback_url** | **string** | A fallback URL which, if provided, will be used to retry the machine detection complete webhook delivery in case &#x60;callbackUrl&#x60; fails to respond | [optional]
**fallback_method** | [**\OpenAPI\Client\Model\CallbackMethodEnum**](CallbackMethodEnum.md) |  | [optional]
**fallback_username** | **string** | Basic auth username. | [optional]
**fallback_password** | **string** | Basic auth password. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
