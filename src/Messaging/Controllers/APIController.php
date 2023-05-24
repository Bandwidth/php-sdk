<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace BandwidthLib\Messaging\Controllers;

use BandwidthLib\APIException;
use BandwidthLib\APIHelper;
use BandwidthLib\Messaging\Exceptions;
use BandwidthLib\Messaging\Models;
use BandwidthLib\Controllers\BaseController;
use BandwidthLib\Http\ApiResponse;
use BandwidthLib\Http\HttpRequest;
use BandwidthLib\Http\HttpResponse;
use BandwidthLib\Http\HttpMethod;
use BandwidthLib\Http\HttpContext;
use BandwidthLib\Servers;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class APIController extends BaseController
{
    public function __construct($config, $httpCallBack = null)
    {
        parent::__construct($config, $httpCallBack);
    }

    /**
     * Gets a list of your media files. No query parameters are supported.
     *
     * @param string $accountId          User's account ID
     * @param string|null $continuationToken  (optional) Continuation token used to retrieve subsequent media.
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function listMedia(
        string $accountId,
        string $continuationToken = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/users/{accountId}/media';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'          => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::MESSAGINGDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'       => BaseController::USER_AGENT,
            'Accept'           => 'application/json',
            'Continuation-Token' => $continuationToken
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getMessagingBasicAuthUserName(), $this->config->getMessagingBasicAuthPassword());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\MessagingException('400 Request is malformed or invalid', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\MessagingException(
                '401 The specified user does not have access to the account',
                $_httpContext
            );
        }

        if ($response->code == 403) {
            throw new Exceptions\MessagingException('403 The user does not have access to this API', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\MessagingException('404 Path not found', $_httpContext);
        }

        if ($response->code == 415) {
            throw new Exceptions\MessagingException('415 The content-type of the request is incorrect', $_httpContext);
        }

        if ($response->code == 429) {
            throw new Exceptions\MessagingException('429 The rate limit has been reached', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClassArray($response->body, 'BandwidthLib\\Messaging\\Models\\Media');
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Downloads a media file you previously uploaded.
     *
     * @param string $accountId User's account ID
     * @param string $mediaId   Media ID to retrieve
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getMedia(
        string $accountId,
        string $mediaId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/users/{accountId}/media/{mediaId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'  => $accountId,
            'mediaId' => $mediaId,
            ), false
        );

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::MESSAGINGDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getMessagingBasicAuthUserName(), $this->config->getMessagingBasicAuthPassword());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\MessagingException('400 Request is malformed or invalid', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\MessagingException(
                '401 The specified user does not have access to the account',
                $_httpContext
            );
        }

        if ($response->code == 403) {
            throw new Exceptions\MessagingException('403 The user does not have access to this API', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\MessagingException('404 Path not found', $_httpContext);
        }

        if ($response->code == 415) {
            throw new Exceptions\MessagingException('415 The content-type of the request is incorrect', $_httpContext);
        }

        if ($response->code == 429) {
            throw new Exceptions\MessagingException('429 The rate limit has been reached', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $deserializedResponse = $response->body;
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Uploads a file the normal HTTP way. You may add headers to the request in order to provide some
     * control to your media-file.
     *
     * @param string $accountId     User's account ID
     * @param string $mediaId       The user supplied custom media ID
     * @param string $body          TODO: type description here
     * @param string $contentType   (optional) The media type of the entity-body
     * @param string|null $cacheControl  (optional) General-header field is used to specify directives that MUST be obeyed
     *                              by all caching mechanisms along the request/response chain.
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function uploadMedia(
        string $accountId,
        string $mediaId,
        string $body,
        string $contentType = 'application/octet-stream',
        string $cacheControl = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/users/{accountId}/media/{mediaId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'  => $accountId,
            'mediaId' => $mediaId,
            ), false
        );

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::MESSAGINGDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Content-Type'    => (null != $contentType) ? $contentType : 'application/octet-stream',
            'Cache-Control'   => $cacheControl
        );

        //json encode body
        $_bodyJson = $body;

        //set HTTP basic auth parameters
        Request::auth($this->config->getMessagingBasicAuthUserName(), $this->config->getMessagingBasicAuthPassword());

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\MessagingException('400 Request is malformed or invalid', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\MessagingException(
                '401 The specified user does not have access to the account',
                $_httpContext
            );
        }

        if ($response->code == 403) {
            throw new Exceptions\MessagingException('403 The user does not have access to this API', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\MessagingException('404 Path not found', $_httpContext);
        }

        if ($response->code == 415) {
            throw new Exceptions\MessagingException('415 The content-type of the request is incorrect', $_httpContext);
        }

        if ($response->code == 429) {
            throw new Exceptions\MessagingException('429 The rate limit has been reached', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        return new ApiResponse($response->code, $response->headers, null);
    }

    /**
     * Deletes a media file from Bandwidth API server. Make sure you don't have any application scripts
     * still using the media before you delete. If you accidentally delete a media file, you can
     * immediately upload a new file with the same name.
     *
     * @param string $accountId User's account ID
     * @param string $mediaId   The media ID to delete
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteMedia(
        string $accountId,
        string $mediaId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/users/{accountId}/media/{mediaId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'  => $accountId,
            'mediaId' => $mediaId,
            ), false
        );

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::MESSAGINGDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getMessagingBasicAuthUserName(), $this->config->getMessagingBasicAuthPassword());

        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\MessagingException('400 Request is malformed or invalid', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\MessagingException(
                '401 The specified user does not have access to the account',
                $_httpContext
            );
        }

        if ($response->code == 403) {
            throw new Exceptions\MessagingException('403 The user does not have access to this API', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\MessagingException('404 Path not found', $_httpContext);
        }

        if ($response->code == 415) {
            throw new Exceptions\MessagingException('415 The content-type of the request is incorrect', $_httpContext);
        }

        if ($response->code == 429) {
            throw new Exceptions\MessagingException('429 The rate limit has been reached', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        return new ApiResponse($response->code, $response->headers, null);
    }

    /**
     * Gets a list of messages based on query parameters.
     *
     * @param string $accountId     User's account ID
     * @param string|null $messageId     (optional) The ID of the message to search for. Special characters need to be
     *                               encoded using URL encoding
     * @param string|null $sourceTn      (optional) The phone number that sent the message
     * @param string|null $destinationTn (optional) The phone number that received the message
     * @param string|null $messageStatus (optional) The status of the message. One of RECEIVED, QUEUED, SENDING, SENT,
     *                               FAILED, DELIVERED, ACCEPTED, UNDELIVERED
     * @param integer|null $errorCode     (optional) The error code of the message
     * @param string|null $fromDateTime  (optional) The start of the date range to search in ISO 8601 format. Uses the
     *                               message receive time. The date range to search in is currently 14 days.
     * @param string|null $toDateTime    (optional) The end of the date range to search in ISO 8601 format. Uses the
     *                               message receive time. The date range to search in is currently 14 days.
     * @param string|null $pageToken     (optional) A base64 encoded value used for pagination of results
     * @param integer|null $limit         (optional) The maximum records requested in search result. Default 100. The sum of
     *                               limit and after cannot be more than 10000
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getMessages(
        string $accountId,
        string $messageId = null,
        string $sourceTn = null,
        string $destinationTn = null,
        string $messageStatus = null,
        int    $errorCode = null,
        string $fromDateTime = null,
        string $toDateTime = null,
        string $pageToken = null,
        int    $limit = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/users/{accountId}/messages';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'     => $accountId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'messageId'     => $messageId,
            'sourceTn'      => $sourceTn,
            'destinationTn' => $destinationTn,
            'messageStatus' => $messageStatus,
            'errorCode'     => $errorCode,
            'fromDateTime'  => $fromDateTime,
            'toDateTime'    => $toDateTime,
            'pageToken'     => $pageToken,
            'limit'         => $limit,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::MESSAGINGDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getMessagingBasicAuthUserName(), $this->config->getMessagingBasicAuthPassword());

        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\MessagingException('400 Request is malformed or invalid', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\MessagingException(
                '401 The specified user does not have access to the account',
                $_httpContext
            );
        }

        if ($response->code == 403) {
            throw new Exceptions\MessagingException('403 The user does not have access to this API', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\MessagingException('404 Path not found', $_httpContext);
        }

        if ($response->code == 415) {
            throw new Exceptions\MessagingException('415 The content-type of the request is incorrect', $_httpContext);
        }

        if ($response->code == 429) {
            throw new Exceptions\MessagingException('429 The rate limit has been reached', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'BandwidthLib\\Messaging\\Models\\BandwidthMessagesList'
        );
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Endpoint for sending text messages and picture messages using V2 messaging.
     *
     * @param string $accountId User's account ID
     * @param Models\MessageRequest $body      TODO: type description here
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createMessage(
        string                $accountId,
        Models\MessageRequest $body
    ) {

        //prepare query string for API call
        $_queryBuilder = '/users/{accountId}/messages';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId' => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::MESSAGINGDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth($this->config->getMessagingBasicAuthUserName(), $this->config->getMessagingBasicAuthPassword());

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new Exceptions\MessagingException('400 Request is malformed or invalid', $_httpContext);
        }

        if ($response->code == 401) {
            throw new Exceptions\MessagingException(
                '401 The specified user does not have access to the account',
                $_httpContext
            );
        }

        if ($response->code == 403) {
            throw new Exceptions\MessagingException('403 The user does not have access to this API', $_httpContext);
        }

        if ($response->code == 404) {
            throw new Exceptions\MessagingException('404 Path not found', $_httpContext);
        }

        if ($response->code == 415) {
            throw new Exceptions\MessagingException('415 The content-type of the request is incorrect', $_httpContext);
        }

        if ($response->code == 429) {
            throw new Exceptions\MessagingException('429 The rate limit has been reached', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'BandwidthLib\\Messaging\\Models\\BandwidthMessage');
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }
}
