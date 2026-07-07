# CreateCallResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**application_id** | **string** | The id of the application associated with the &#x60;from&#x60; number. |
**account_id** | **string** | The bandwidth account ID associated with the call. |
**call_id** | **string** | Programmable Voice API Call ID. |
**to** | **string** | Recipient of the outgoing call. |
**from** | **string** | Phone number that created the outbound call. |
**enqueued_time** | **\DateTime** | The time at which the call was accepted into the queue. | [optional]
**call_url** | **string** | The URL to update this call&#39;s state. |
**call_timeout** | **float** | The timeout (in seconds) for the callee to answer the call after it starts ringing. | [optional]
**callback_timeout** | **float** | This is the timeout (in seconds) to use when delivering webhooks for the call. | [optional]
**tag** | **string** | Custom tag value. | [optional]
**answer_method** | [**\Bandwidth\Model\CallbackMethodEnum**](CallbackMethodEnum.md) |  |
**answer_url** | **string** | URL to deliver the &#x60;answer&#x60; event webhook. |
**answer_fallback_method** | [**\Bandwidth\Model\CallbackMethodEnum**](CallbackMethodEnum.md) |  | [optional]
**answer_fallback_url** | **string** | Fallback URL to deliver the &#x60;answer&#x60; event webhook. | [optional]
**disconnect_method** | [**\Bandwidth\Model\CallbackMethodEnum**](CallbackMethodEnum.md) |  |
**disconnect_url** | **string** | URL to deliver the &#x60;disconnect&#x60; event webhook. | [optional]
**username** | **string** | Basic auth username. | [optional]
**password** | **string** | Basic auth password. | [optional]
**fallback_username** | **string** | Basic auth username. | [optional]
**fallback_password** | **string** | Basic auth password. | [optional]
**priority** | **int** | The priority of this call over other calls from your account. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
