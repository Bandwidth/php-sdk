<?php
/*
 * BandwidthLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace BandwidthLib\WebRtc\Controllers;

use BandwidthLib\APIException;
use BandwidthLib\APIHelper;
use BandwidthLib\WebRtc\Exceptions;
use BandwidthLib\WebRtc\Models;
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
     * Create a new participant under this account
     *
     * Participants are idempotent, so relevant parameters must be set in this function if desired
     *
     *
     * @param string             $accountId Account ID
     * @param Models\Participant $body      (optional) Participant parameters
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createParticipant(
        $accountId,
        $body = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/participants';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId' => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
            throw new APIException('Bad Request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'BandwidthLib\\WebRtc\\Models\\AccountsParticipantsResponse'
        );
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Get participant by ID
     *
     * @param string $accountId     Account ID
     * @param string $participantId Participant ID
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getParticipant(
        $accountId,
        $participantId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/participants/{participantId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'     => $accountId,
            'participantId' => $participantId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'BandwidthLib\\WebRtc\\Models\\Participant');
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Delete participant by ID
     *
     * @param string $accountId     Account ID
     * @param string $participantId TODO: type description here
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteParticipant(
        $accountId,
        $participantId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/participants/{participantId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'     => $accountId,
            'participantId' => $participantId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        return new ApiResponse($response->code, $response->headers, null);
    }

    /**
     * Create a new session
     *
     * Sessions are idempotent, so relevant parameters must be set in this function if desired
     *
     *
     * @param string         $accountId Account ID
     * @param Models\Session $body      (optional) Session parameters
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createSession(
        $accountId,
        $body = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/sessions';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId' => $accountId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
            throw new APIException('Bad Request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'BandwidthLib\\WebRtc\\Models\\Session');
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Get session by ID
     *
     * @param string $accountId Account ID
     * @param string $sessionId Session ID
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getSession(
        $accountId,
        $sessionId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/sessions/{sessionId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId' => $accountId,
            'sessionId' => $sessionId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'BandwidthLib\\WebRtc\\Models\\Session');
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Delete session by ID
     *
     * @param string $accountId Account ID
     * @param string $sessionId Session ID
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteSession(
        $accountId,
        $sessionId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/sessions/{sessionId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId' => $accountId,
            'sessionId' => $sessionId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        return new ApiResponse($response->code, $response->headers, null);
    }

    /**
     * List participants in a session
     *
     * @param string $accountId Account ID
     * @param string $sessionId Session ID
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function listSessionParticipants(
        $accountId,
        $sessionId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/sessions/{sessionId}/participants';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId' => $accountId,
            'sessionId' => $sessionId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClassArray($response->body, 'BandwidthLib\\WebRtc\\Models\\Participant');
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Add a participant to a session
     *
     * Subscriptions can optionally be provided as part of this call
     *
     *
     * @param string               $accountId     Account ID
     * @param string               $sessionId     Session ID
     * @param string               $participantId Participant ID
     * @param Models\Subscriptions $body          (optional) Subscriptions the participant should be created with
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function addParticipantToSession(
        $accountId,
        $sessionId,
        $participantId,
        $body = null
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/sessions/{sessionId}/participants/{participantId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'     => $accountId,
            'sessionId'     => $sessionId,
            'participantId' => $participantId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'content-type'  => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        return new ApiResponse($response->code, $response->headers, null);
    }

    /**
     * Remove a participant from a session
     *
     * This will automatically remove any subscriptions the participant has associated with this session
     *
     *
     * @param string $accountId     Account ID
     * @param string $sessionId     Session ID
     * @param string $participantId Participant ID
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function removeParticipantFromSession(
        $accountId,
        $sessionId,
        $participantId
    ) {

        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/sessions/{sessionId}/participants/{participantId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'     => $accountId,
            'sessionId'     => $sessionId,
            'participantId' => $participantId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        return new ApiResponse($response->code, $response->headers, null);
    }

    /**
     * Get a participant's subscriptions
     *
     * @param string $accountId     Account ID
     * @param string $sessionId     Session ID
     * @param string $participantId Participant ID
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getParticipantSubscriptions(
        $accountId,
        $sessionId,
        $participantId
    ) {

        //prepare query string for API call
        $_queryBuilder = 
            '/accounts/{accountId}/sessions/{sessionId}/participants/{participantId}/subscriptions';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'     => $accountId,
            'sessionId'     => $sessionId,
            'participantId' => $participantId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Accept'        => 'application/json'
        );

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'BandwidthLib\\WebRtc\\Models\\Subscriptions');
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Update a participant's subscriptions
     *
     * This is a full update that will replace the participant's subscriptions. First call
     * `getParticipantSubscriptions` if you need the current subscriptions. Call this function with no
     * `Subscriptions` object to remove all subscriptions
     *
     *
     * @param string               $accountId     Account ID
     * @param string               $sessionId     Session ID
     * @param string               $participantId Participant ID
     * @param Models\Subscriptions $body          (optional) Initial state
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateParticipantSubscriptions(
        $accountId,
        $sessionId,
        $participantId,
        $body = null
    ) {

        //prepare query string for API call
        $_queryBuilder = 
            '/accounts/{accountId}/sessions/{sessionId}/participants/{participantId}/subscriptions';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'accountId'     => $accountId,
            'sessionId'     => $sessionId,
            'participantId' => $participantId,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::WEBRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'content-type'  => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set HTTP basic auth parameters
        Request::auth($this->config->getWebRtcBasicAuthUserName(), $this->config->getWebRtcBasicAuthPassword());

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
            throw new APIException('Bad Request', $_httpContext);
        }

        if ($response->code == 401) {
            throw new APIException('Unauthorized', $_httpContext);
        }

        if ($response->code == 403) {
            throw new APIException('Access Denied', $_httpContext);
        }

        if ($response->code == 404) {
            throw new APIException('Not Found', $_httpContext);
        }

        if (($response->code < 200) || ($response->code > 208)) {
            throw new Exceptions\ErrorException('Unexpected Error', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);
        return new ApiResponse($response->code, $response->headers, null);
    }
}
