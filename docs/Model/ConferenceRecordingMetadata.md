# ConferenceRecordingMetadata

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_id** | **string** | The user account associated with the call. | [optional]
**conference_id** | **string** | The unique, Bandwidth-generated ID of the conference that was recorded | [optional]
**name** | **string** | The user-specified name of the conference that was recorded | [optional]
**recording_id** | **string** | The unique ID of this recording | [optional]
**duration** | **string** | The duration of the recording in ISO-8601 format | [optional]
**channels** | **int** | Always &#x60;1&#x60; for conference recordings; multi-channel recordings are not supported on conferences. | [optional]
**start_time** | **\DateTime** | Time the call was started, in ISO 8601 format. | [optional]
**end_time** | **\DateTime** | The time that the recording ended in ISO-8601 format | [optional]
**file_format** | [**\OpenAPI\Client\Model\FileFormatEnum**](FileFormatEnum.md) |  | [optional]
**status** | **string** | The current status of the process. For recording, current possible values are &#39;processing&#39;, &#39;partial&#39;, &#39;complete&#39;, &#39;deleted&#39;, and &#39;error&#39;. For transcriptions, current possible values are &#39;none&#39;, &#39;processing&#39;, &#39;available&#39;, &#39;error&#39;, &#39;timeout&#39;, &#39;file-size-too-big&#39;, and &#39;file-size-too-small&#39;. Additional states may be added in the future, so your application must be tolerant of unknown values. | [optional]
**media_url** | **string** | The URL that can be used to download the recording. Only present if the recording is finished and may be downloaded. | [optional]
**recording_name** | **string** | A name to identify this recording. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
