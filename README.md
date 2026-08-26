# Bandwidth SDK

Bandwidth's Communication APIs

For more information, please visit [https://dev.bandwidth.com](https://dev.bandwidth.com).

## Installation & Usage

### Requirements

PHP 8.1 and later.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/bandwidth/php-sdk.git"
    }
  ],
  "require": {
    "bandwidth/php-sdk": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/Bandwidth SDK/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure HTTP basic authorization: Basic
$config = Bandwidth\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure OAuth2 access token for authorization: OAuth2
$config = Bandwidth\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new Bandwidth\Api\CallsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$account_id = 9900000; // string | Your Bandwidth Account ID.
$create_call = new \Bandwidth\Model\CreateCall(); // \Bandwidth\Model\CreateCall | JSON object containing information to create an outbound call

try {
    $result = $apiInstance->createCall($account_id, $create_call);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CallsApi->createCall: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *http://localhost*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*CallsApi* | [**createCall**](docs/Api/CallsApi.md#createcall) | **POST** /accounts/{accountId}/calls | Create Call
*CallsApi* | [**getCallState**](docs/Api/CallsApi.md#getcallstate) | **GET** /accounts/{accountId}/calls/{callId} | Get Call State Information
*CallsApi* | [**listCalls**](docs/Api/CallsApi.md#listcalls) | **GET** /accounts/{accountId}/calls | Get Calls
*CallsApi* | [**updateCall**](docs/Api/CallsApi.md#updatecall) | **POST** /accounts/{accountId}/calls/{callId} | Update Call
*CallsApi* | [**updateCallBxml**](docs/Api/CallsApi.md#updatecallbxml) | **PUT** /accounts/{accountId}/calls/{callId}/bxml | Update Call BXML
*ConferencesApi* | [**downloadConferenceRecording**](docs/Api/ConferencesApi.md#downloadconferencerecording) | **GET** /accounts/{accountId}/conferences/{conferenceId}/recordings/{recordingId}/media | Download Conference Recording
*ConferencesApi* | [**getConference**](docs/Api/ConferencesApi.md#getconference) | **GET** /accounts/{accountId}/conferences/{conferenceId} | Get Conference Information
*ConferencesApi* | [**getConferenceMember**](docs/Api/ConferencesApi.md#getconferencemember) | **GET** /accounts/{accountId}/conferences/{conferenceId}/members/{memberId} | Get Conference Member
*ConferencesApi* | [**getConferenceRecording**](docs/Api/ConferencesApi.md#getconferencerecording) | **GET** /accounts/{accountId}/conferences/{conferenceId}/recordings/{recordingId} | Get Conference Recording Information
*ConferencesApi* | [**listConferenceRecordings**](docs/Api/ConferencesApi.md#listconferencerecordings) | **GET** /accounts/{accountId}/conferences/{conferenceId}/recordings | Get Conference Recordings
*ConferencesApi* | [**listConferences**](docs/Api/ConferencesApi.md#listconferences) | **GET** /accounts/{accountId}/conferences | Get Conferences
*ConferencesApi* | [**updateConference**](docs/Api/ConferencesApi.md#updateconference) | **POST** /accounts/{accountId}/conferences/{conferenceId} | Update Conference
*ConferencesApi* | [**updateConferenceBxml**](docs/Api/ConferencesApi.md#updateconferencebxml) | **PUT** /accounts/{accountId}/conferences/{conferenceId}/bxml | Update Conference BXML
*ConferencesApi* | [**updateConferenceMember**](docs/Api/ConferencesApi.md#updateconferencemember) | **PUT** /accounts/{accountId}/conferences/{conferenceId}/members/{memberId} | Update Conference Member
*EndpointsApi* | [**createEndpoint**](docs/Api/EndpointsApi.md#createendpoint) | **POST** /accounts/{accountId}/endpoints | Create Endpoint
*EndpointsApi* | [**deleteEndpoint**](docs/Api/EndpointsApi.md#deleteendpoint) | **DELETE** /accounts/{accountId}/endpoints/{endpointId} | Delete Endpoint
*EndpointsApi* | [**getEndpoint**](docs/Api/EndpointsApi.md#getendpoint) | **GET** /accounts/{accountId}/endpoints/{endpointId} | Get Endpoint
*EndpointsApi* | [**listEndpoints**](docs/Api/EndpointsApi.md#listendpoints) | **GET** /accounts/{accountId}/endpoints | List Endpoints
*EndpointsApi* | [**updateEndpointBxml**](docs/Api/EndpointsApi.md#updateendpointbxml) | **PUT** /accounts/{accountId}/endpoints/{endpointId}/bxml | Update Endpoint BXML
*MFAApi* | [**generateMessagingCode**](docs/Api/MFAApi.md#generatemessagingcode) | **POST** /accounts/{accountId}/code/messaging | Messaging Authentication Code
*MFAApi* | [**generateVoiceCode**](docs/Api/MFAApi.md#generatevoicecode) | **POST** /accounts/{accountId}/code/voice | Voice Authentication Code
*MFAApi* | [**verifyCode**](docs/Api/MFAApi.md#verifycode) | **POST** /accounts/{accountId}/code/verify | Verify Authentication Code
*MediaApi* | [**deleteMedia**](docs/Api/MediaApi.md#deletemedia) | **DELETE** /users/{accountId}/media/{mediaId} | Delete Media
*MediaApi* | [**getMedia**](docs/Api/MediaApi.md#getmedia) | **GET** /users/{accountId}/media/{mediaId} | Get Media
*MediaApi* | [**listMedia**](docs/Api/MediaApi.md#listmedia) | **GET** /users/{accountId}/media | List Media
*MediaApi* | [**uploadMedia**](docs/Api/MediaApi.md#uploadmedia) | **PUT** /users/{accountId}/media/{mediaId} | Upload Media
*MessagesApi* | [**createMessage**](docs/Api/MessagesApi.md#createmessage) | **POST** /users/{accountId}/messages | Create Message
*MessagesApi* | [**listMessages**](docs/Api/MessagesApi.md#listmessages) | **GET** /users/{accountId}/messages | List Messages
*MultiChannelApi* | [**createMultiChannelMessage**](docs/Api/MultiChannelApi.md#createmultichannelmessage) | **POST** /users/{accountId}/messages/multiChannel | Create Multi-Channel Message
*PhoneNumberLookupApi* | [**createAsyncBulkLookup**](docs/Api/PhoneNumberLookupApi.md#createasyncbulklookup) | **POST** /accounts/{accountId}/phoneNumberLookup/bulk | Create Asynchronous Bulk Number Lookup
*PhoneNumberLookupApi* | [**createSyncLookup**](docs/Api/PhoneNumberLookupApi.md#createsynclookup) | **POST** /accounts/{accountId}/phoneNumberLookup | Create Synchronous Number Lookup
*PhoneNumberLookupApi* | [**getAsyncBulkLookup**](docs/Api/PhoneNumberLookupApi.md#getasyncbulklookup) | **GET** /accounts/{accountId}/phoneNumberLookup/bulk/{requestId} | Get Asynchronous Bulk Number Lookup
*RecordingsApi* | [**deleteRecording**](docs/Api/RecordingsApi.md#deleterecording) | **DELETE** /accounts/{accountId}/calls/{callId}/recordings/{recordingId} | Delete Recording
*RecordingsApi* | [**deleteRecordingMedia**](docs/Api/RecordingsApi.md#deleterecordingmedia) | **DELETE** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/media | Delete Recording Media
*RecordingsApi* | [**deleteRecordingTranscription**](docs/Api/RecordingsApi.md#deleterecordingtranscription) | **DELETE** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/transcription | Delete Transcription
*RecordingsApi* | [**downloadCallRecording**](docs/Api/RecordingsApi.md#downloadcallrecording) | **GET** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/media | Download Recording
*RecordingsApi* | [**getCallRecording**](docs/Api/RecordingsApi.md#getcallrecording) | **GET** /accounts/{accountId}/calls/{callId}/recordings/{recordingId} | Get Call Recording
*RecordingsApi* | [**getRecordingTranscription**](docs/Api/RecordingsApi.md#getrecordingtranscription) | **GET** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/transcription | Get Transcription
*RecordingsApi* | [**listAccountCallRecordings**](docs/Api/RecordingsApi.md#listaccountcallrecordings) | **GET** /accounts/{accountId}/recordings | Get Call Recordings
*RecordingsApi* | [**listCallRecordings**](docs/Api/RecordingsApi.md#listcallrecordings) | **GET** /accounts/{accountId}/calls/{callId}/recordings | List Call Recordings
*RecordingsApi* | [**transcribeCallRecording**](docs/Api/RecordingsApi.md#transcribecallrecording) | **POST** /accounts/{accountId}/calls/{callId}/recordings/{recordingId}/transcription | Create Transcription Request
*RecordingsApi* | [**updateCallRecordingState**](docs/Api/RecordingsApi.md#updatecallrecordingstate) | **PUT** /accounts/{accountId}/calls/{callId}/recording | Update Recording
*StatisticsApi* | [**getStatistics**](docs/Api/StatisticsApi.md#getstatistics) | **GET** /accounts/{accountId}/statistics | Get Account Statistics
*TollFreeVerificationApi* | [**createWebhookSubscription**](docs/Api/TollFreeVerificationApi.md#createwebhooksubscription) | **POST** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions | Create Webhook Subscription
*TollFreeVerificationApi* | [**deleteVerificationRequest**](docs/Api/TollFreeVerificationApi.md#deleteverificationrequest) | **DELETE** /accounts/{accountId}/phoneNumbers/{phoneNumber}/tollFreeVerification | Delete a Toll-Free Verification Submission
*TollFreeVerificationApi* | [**deleteWebhookSubscription**](docs/Api/TollFreeVerificationApi.md#deletewebhooksubscription) | **DELETE** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions/{id} | Delete Webhook Subscription
*TollFreeVerificationApi* | [**getTollFreeVerificationStatus**](docs/Api/TollFreeVerificationApi.md#gettollfreeverificationstatus) | **GET** /accounts/{accountId}/phoneNumbers/{phoneNumber}/tollFreeVerification | Get Toll-Free Verification Status
*TollFreeVerificationApi* | [**listTollFreeUseCases**](docs/Api/TollFreeVerificationApi.md#listtollfreeusecases) | **GET** /tollFreeVerification/useCases | List Toll-Free Use Cases
*TollFreeVerificationApi* | [**listWebhookSubscriptions**](docs/Api/TollFreeVerificationApi.md#listwebhooksubscriptions) | **GET** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions | List Webhook Subscriptions
*TollFreeVerificationApi* | [**requestTollFreeVerification**](docs/Api/TollFreeVerificationApi.md#requesttollfreeverification) | **POST** /accounts/{accountId}/tollFreeVerification | Request Toll-Free Verification
*TollFreeVerificationApi* | [**updateTollFreeVerificationRequest**](docs/Api/TollFreeVerificationApi.md#updatetollfreeverificationrequest) | **PUT** /accounts/{accountId}/phoneNumbers/{phoneNumber}/tollFreeVerification | Update Toll-Free Verification Request
*TollFreeVerificationApi* | [**updateWebhookSubscription**](docs/Api/TollFreeVerificationApi.md#updatewebhooksubscription) | **PUT** /accounts/{accountId}/tollFreeVerification/webhooks/subscriptions/{id} | Update Webhook Subscription
*TranscriptionsApi* | [**deleteRealTimeTranscription**](docs/Api/TranscriptionsApi.md#deleterealtimetranscription) | **DELETE** /accounts/{accountId}/calls/{callId}/transcriptions/{transcriptionId} | Delete Real-time Transcription
*TranscriptionsApi* | [**getRealTimeTranscription**](docs/Api/TranscriptionsApi.md#getrealtimetranscription) | **GET** /accounts/{accountId}/calls/{callId}/transcriptions/{transcriptionId} | Get Real-time Transcription
*TranscriptionsApi* | [**listRealTimeTranscriptions**](docs/Api/TranscriptionsApi.md#listrealtimetranscriptions) | **GET** /accounts/{accountId}/calls/{callId}/transcriptions | List Real-time Transcriptions

## Models

- [AccountStatistics](docs/Model/AccountStatistics.md)
- [AdditionalDenialReason](docs/Model/AdditionalDenialReason.md)
- [Address](docs/Model/Address.md)
- [AnswerCallback](docs/Model/AnswerCallback.md)
- [AsyncLookupRequest](docs/Model/AsyncLookupRequest.md)
- [BlockedWebhook](docs/Model/BlockedWebhook.md)
- [BridgeCompleteCallback](docs/Model/BridgeCompleteCallback.md)
- [BridgeTargetCompleteCallback](docs/Model/BridgeTargetCompleteCallback.md)
- [BrtcError](docs/Model/BrtcError.md)
- [BrtcErrorResponse](docs/Model/BrtcErrorResponse.md)
- [BrtcErrorSource](docs/Model/BrtcErrorSource.md)
- [BrtcLink](docs/Model/BrtcLink.md)
- [BusinessEntityTypeEnum](docs/Model/BusinessEntityTypeEnum.md)
- [BusinessRegistrationTypeEnum](docs/Model/BusinessRegistrationTypeEnum.md)
- [CallDirectionEnum](docs/Model/CallDirectionEnum.md)
- [CallRecordingMetadata](docs/Model/CallRecordingMetadata.md)
- [CallState](docs/Model/CallState.md)
- [CallStateEnum](docs/Model/CallStateEnum.md)
- [CallTranscription](docs/Model/CallTranscription.md)
- [CallTranscriptionDetectedLanguageEnum](docs/Model/CallTranscriptionDetectedLanguageEnum.md)
- [CallTranscriptionMetadata](docs/Model/CallTranscriptionMetadata.md)
- [CallTranscriptionResponse](docs/Model/CallTranscriptionResponse.md)
- [CallTranscriptionTrackEnum](docs/Model/CallTranscriptionTrackEnum.md)
- [Callback](docs/Model/Callback.md)
- [CallbackMethodEnum](docs/Model/CallbackMethodEnum.md)
- [CardWidthEnum](docs/Model/CardWidthEnum.md)
- [CodeRequest](docs/Model/CodeRequest.md)
- [CompletedLookupStatusEnum](docs/Model/CompletedLookupStatusEnum.md)
- [Conference](docs/Model/Conference.md)
- [ConferenceCompletedCallback](docs/Model/ConferenceCompletedCallback.md)
- [ConferenceCreatedCallback](docs/Model/ConferenceCreatedCallback.md)
- [ConferenceMember](docs/Model/ConferenceMember.md)
- [ConferenceMemberExitCallback](docs/Model/ConferenceMemberExitCallback.md)
- [ConferenceMemberJoinCallback](docs/Model/ConferenceMemberJoinCallback.md)
- [ConferenceRecordingAvailableCallback](docs/Model/ConferenceRecordingAvailableCallback.md)
- [ConferenceRecordingMetadata](docs/Model/ConferenceRecordingMetadata.md)
- [ConferenceRedirectCallback](docs/Model/ConferenceRedirectCallback.md)
- [ConferenceStateEnum](docs/Model/ConferenceStateEnum.md)
- [Contact](docs/Model/Contact.md)
- [CreateAsyncBulkLookupResponse](docs/Model/CreateAsyncBulkLookupResponse.md)
- [CreateAsyncBulkLookupResponseData](docs/Model/CreateAsyncBulkLookupResponseData.md)
- [CreateCall](docs/Model/CreateCall.md)
- [CreateCallResponse](docs/Model/CreateCallResponse.md)
- [CreateEndpointRequestBase](docs/Model/CreateEndpointRequestBase.md)
- [CreateEndpointResponse](docs/Model/CreateEndpointResponse.md)
- [CreateEndpointResponseData](docs/Model/CreateEndpointResponseData.md)
- [CreateMessageRequestError](docs/Model/CreateMessageRequestError.md)
- [CreateMultiChannelMessageResponse](docs/Model/CreateMultiChannelMessageResponse.md)
- [CreateSyncLookupResponse](docs/Model/CreateSyncLookupResponse.md)
- [CreateSyncLookupResponseData](docs/Model/CreateSyncLookupResponseData.md)
- [CreateWebRtcConnectionRequest](docs/Model/CreateWebRtcConnectionRequest.md)
- [DeactivationEventEnum](docs/Model/DeactivationEventEnum.md)
- [Device](docs/Model/Device.md)
- [DeviceStatusEnum](docs/Model/DeviceStatusEnum.md)
- [DisconnectCallback](docs/Model/DisconnectCallback.md)
- [Diversion](docs/Model/Diversion.md)
- [DtmfCallback](docs/Model/DtmfCallback.md)
- [Endpoint](docs/Model/Endpoint.md)
- [EndpointDirectionEnum](docs/Model/EndpointDirectionEnum.md)
- [EndpointEvent](docs/Model/EndpointEvent.md)
- [EndpointEventTypeEnum](docs/Model/EndpointEventTypeEnum.md)
- [EndpointResponse](docs/Model/EndpointResponse.md)
- [EndpointStatusEnum](docs/Model/EndpointStatusEnum.md)
- [EndpointTypeEnum](docs/Model/EndpointTypeEnum.md)
- [Endpoints](docs/Model/Endpoints.md)
- [ErrorObject](docs/Model/ErrorObject.md)
- [ErrorSource](docs/Model/ErrorSource.md)
- [FailureWebhook](docs/Model/FailureWebhook.md)
- [FieldError](docs/Model/FieldError.md)
- [FileFormatEnum](docs/Model/FileFormatEnum.md)
- [GatherCallback](docs/Model/GatherCallback.md)
- [GetAsyncBulkLookupResponse](docs/Model/GetAsyncBulkLookupResponse.md)
- [GetAsyncBulkLookupResponseData](docs/Model/GetAsyncBulkLookupResponseData.md)
- [InProgressLookupStatusEnum](docs/Model/InProgressLookupStatusEnum.md)
- [InboundCallback](docs/Model/InboundCallback.md)
- [InboundCallbackMessage](docs/Model/InboundCallbackMessage.md)
- [InboundCallbackTypeEnum](docs/Model/InboundCallbackTypeEnum.md)
- [InitiateCallback](docs/Model/InitiateCallback.md)
- [LatestMessageDeliveryStatusEnum](docs/Model/LatestMessageDeliveryStatusEnum.md)
- [LineTypeEnum](docs/Model/LineTypeEnum.md)
- [Link](docs/Model/Link.md)
- [LinkSchema](docs/Model/LinkSchema.md)
- [LinksObject](docs/Model/LinksObject.md)
- [ListEndpointsResponse](docs/Model/ListEndpointsResponse.md)
- [ListMessageDirectionEnum](docs/Model/ListMessageDirectionEnum.md)
- [ListMessageItem](docs/Model/ListMessageItem.md)
- [LookupErrorResponse](docs/Model/LookupErrorResponse.md)
- [LookupErrorSchema](docs/Model/LookupErrorSchema.md)
- [LookupErrorSchemaMeta](docs/Model/LookupErrorSchemaMeta.md)
- [LookupResult](docs/Model/LookupResult.md)
- [MachineDetectionCompleteCallback](docs/Model/MachineDetectionCompleteCallback.md)
- [MachineDetectionConfiguration](docs/Model/MachineDetectionConfiguration.md)
- [MachineDetectionModeEnum](docs/Model/MachineDetectionModeEnum.md)
- [MachineDetectionResult](docs/Model/MachineDetectionResult.md)
- [Media](docs/Model/Media.md)
- [Message](docs/Model/Message.md)
- [MessageDirectionEnum](docs/Model/MessageDirectionEnum.md)
- [MessageRequest](docs/Model/MessageRequest.md)
- [MessageStatusEnum](docs/Model/MessageStatusEnum.md)
- [MessageTypeEnum](docs/Model/MessageTypeEnum.md)
- [MessagesList](docs/Model/MessagesList.md)
- [MessagingCodeResponse](docs/Model/MessagingCodeResponse.md)
- [MessagingRequestError](docs/Model/MessagingRequestError.md)
- [MfaForbiddenRequestError](docs/Model/MfaForbiddenRequestError.md)
- [MfaRequestError](docs/Model/MfaRequestError.md)
- [MfaUnauthorizedRequestError](docs/Model/MfaUnauthorizedRequestError.md)
- [MmsMessageContent](docs/Model/MmsMessageContent.md)
- [MmsMessageContentFile](docs/Model/MmsMessageContentFile.md)
- [MultiChannelAction](docs/Model/MultiChannelAction.md)
- [MultiChannelActionCalendarEvent](docs/Model/MultiChannelActionCalendarEvent.md)
- [MultiChannelChannelListMMSObject](docs/Model/MultiChannelChannelListMMSObject.md)
- [MultiChannelChannelListMMSResponseObject](docs/Model/MultiChannelChannelListMMSResponseObject.md)
- [MultiChannelChannelListObjectBase](docs/Model/MultiChannelChannelListObjectBase.md)
- [MultiChannelChannelListOwnerObject](docs/Model/MultiChannelChannelListOwnerObject.md)
- [MultiChannelChannelListRBMObject](docs/Model/MultiChannelChannelListRBMObject.md)
- [MultiChannelChannelListRBMObjectAllOfContent](docs/Model/MultiChannelChannelListRBMObjectAllOfContent.md)
- [MultiChannelChannelListRBMResponseObject](docs/Model/MultiChannelChannelListRBMResponseObject.md)
- [MultiChannelChannelListRequestObject](docs/Model/MultiChannelChannelListRequestObject.md)
- [MultiChannelChannelListResponseObject](docs/Model/MultiChannelChannelListResponseObject.md)
- [MultiChannelChannelListSMSObject](docs/Model/MultiChannelChannelListSMSObject.md)
- [MultiChannelChannelListSMSResponseObject](docs/Model/MultiChannelChannelListSMSResponseObject.md)
- [MultiChannelError](docs/Model/MultiChannelError.md)
- [MultiChannelMessageChannelEnum](docs/Model/MultiChannelMessageChannelEnum.md)
- [MultiChannelMessageContent](docs/Model/MultiChannelMessageContent.md)
- [MultiChannelMessageRequest](docs/Model/MultiChannelMessageRequest.md)
- [MultiChannelMessageResponseData](docs/Model/MultiChannelMessageResponseData.md)
- [OptInWorkflow](docs/Model/OptInWorkflow.md)
- [Page](docs/Model/Page.md)
- [PageInfo](docs/Model/PageInfo.md)
- [PriorityEnum](docs/Model/PriorityEnum.md)
- [ProductTypeEnum](docs/Model/ProductTypeEnum.md)
- [RbmActionBase](docs/Model/RbmActionBase.md)
- [RbmActionDial](docs/Model/RbmActionDial.md)
- [RbmActionOpenUrl](docs/Model/RbmActionOpenUrl.md)
- [RbmActionTypeEnum](docs/Model/RbmActionTypeEnum.md)
- [RbmActionViewLocation](docs/Model/RbmActionViewLocation.md)
- [RbmCardContent](docs/Model/RbmCardContent.md)
- [RbmCardContentMedia](docs/Model/RbmCardContentMedia.md)
- [RbmLocationResponse](docs/Model/RbmLocationResponse.md)
- [RbmMediaHeightEnum](docs/Model/RbmMediaHeightEnum.md)
- [RbmMessageCarouselCard](docs/Model/RbmMessageCarouselCard.md)
- [RbmMessageContentFile](docs/Model/RbmMessageContentFile.md)
- [RbmMessageContentRichCard](docs/Model/RbmMessageContentRichCard.md)
- [RbmMessageContentText](docs/Model/RbmMessageContentText.md)
- [RbmMessageMedia](docs/Model/RbmMessageMedia.md)
- [RbmOpenUrlEnum](docs/Model/RbmOpenUrlEnum.md)
- [RbmStandaloneCard](docs/Model/RbmStandaloneCard.md)
- [RbmSuggestionResponse](docs/Model/RbmSuggestionResponse.md)
- [RbmWebViewEnum](docs/Model/RbmWebViewEnum.md)
- [RecordingAvailableCallback](docs/Model/RecordingAvailableCallback.md)
- [RecordingCompleteCallback](docs/Model/RecordingCompleteCallback.md)
- [RecordingStateEnum](docs/Model/RecordingStateEnum.md)
- [RecordingTranscriptionClip](docs/Model/RecordingTranscriptionClip.md)
- [RecordingTranscriptionMetadata](docs/Model/RecordingTranscriptionMetadata.md)
- [RecordingTranscriptions](docs/Model/RecordingTranscriptions.md)
- [RedirectCallback](docs/Model/RedirectCallback.md)
- [RedirectMethodEnum](docs/Model/RedirectMethodEnum.md)
- [SipConnectionMetadata](docs/Model/SipConnectionMetadata.md)
- [SipCredentials](docs/Model/SipCredentials.md)
- [SmsMessageContent](docs/Model/SmsMessageContent.md)
- [StandaloneCardOrientationEnum](docs/Model/StandaloneCardOrientationEnum.md)
- [StatusCallback](docs/Model/StatusCallback.md)
- [StatusCallbackMessage](docs/Model/StatusCallbackMessage.md)
- [StatusCallbackTypeEnum](docs/Model/StatusCallbackTypeEnum.md)
- [StirShaken](docs/Model/StirShaken.md)
- [SyncLookupRequest](docs/Model/SyncLookupRequest.md)
- [TelephoneNumber](docs/Model/TelephoneNumber.md)
- [TfvBasicAuthentication](docs/Model/TfvBasicAuthentication.md)
- [TfvCallbackStatusEnum](docs/Model/TfvCallbackStatusEnum.md)
- [TfvError](docs/Model/TfvError.md)
- [TfvStatus](docs/Model/TfvStatus.md)
- [TfvStatusEnum](docs/Model/TfvStatusEnum.md)
- [TfvSubmissionInfo](docs/Model/TfvSubmissionInfo.md)
- [TfvSubmissionWrapper](docs/Model/TfvSubmissionWrapper.md)
- [ThumbnailAlignmentEnum](docs/Model/ThumbnailAlignmentEnum.md)
- [TranscribeRecording](docs/Model/TranscribeRecording.md)
- [Transcription](docs/Model/Transcription.md)
- [TranscriptionAvailableCallback](docs/Model/TranscriptionAvailableCallback.md)
- [TransferAnswerCallback](docs/Model/TransferAnswerCallback.md)
- [TransferCompleteCallback](docs/Model/TransferCompleteCallback.md)
- [TransferDisconnectCallback](docs/Model/TransferDisconnectCallback.md)
- [UpdateCall](docs/Model/UpdateCall.md)
- [UpdateCallRecording](docs/Model/UpdateCallRecording.md)
- [UpdateConference](docs/Model/UpdateConference.md)
- [UpdateConferenceMember](docs/Model/UpdateConferenceMember.md)
- [VerificationDenialWebhook](docs/Model/VerificationDenialWebhook.md)
- [VerificationRequest](docs/Model/VerificationRequest.md)
- [VerificationUpdateRequest](docs/Model/VerificationUpdateRequest.md)
- [VerificationWebhook](docs/Model/VerificationWebhook.md)
- [VerifyCodeRequest](docs/Model/VerifyCodeRequest.md)
- [VerifyCodeResponse](docs/Model/VerifyCodeResponse.md)
- [VoiceApiError](docs/Model/VoiceApiError.md)
- [VoiceCodeResponse](docs/Model/VoiceCodeResponse.md)
- [WebhookSubscription](docs/Model/WebhookSubscription.md)
- [WebhookSubscriptionBasicAuthentication](docs/Model/WebhookSubscriptionBasicAuthentication.md)
- [WebhookSubscriptionError](docs/Model/WebhookSubscriptionError.md)
- [WebhookSubscriptionRequestSchema](docs/Model/WebhookSubscriptionRequestSchema.md)
- [WebhookSubscriptionTypeEnum](docs/Model/WebhookSubscriptionTypeEnum.md)
- [WebhookSubscriptionsListBody](docs/Model/WebhookSubscriptionsListBody.md)

## Authorization

### Basic

- **Type**: HTTP basic authentication


### OAuth2

- **Type**: `OAuth`
- **Flow**: `application`
- **Authorization URL**: ``
- **Scopes**: N/A

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author

letstalk@bandwidth.com

## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `1.0.0`
    - Generator version: `7.25.0`
- Build package: `org.openapitools.codegen.languages.PhpNextgenClientCodegen`
