<?php
/**
 * APIController.php
 *
 * Controller for BRTC (Bandwidth Real-Time Communications) API endpoints
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\BRTC\Controllers;

use BandwidthLib\APIException;
use BandwidthLib\APIHelper;
use BandwidthLib\BRTC\Models;
use BandwidthLib\Controllers\BaseController;
use BandwidthLib\Http\ApiResponse;
use BandwidthLib\Http\HttpRequest;
use BandwidthLib\Http\HttpResponse;
use BandwidthLib\Http\HttpMethod;
use BandwidthLib\Http\HttpContext;
use BandwidthLib\Servers;
use Unirest\Request;

class APIController extends BaseController
{
    public function __construct($config, $httpCallBack = null)
    {
        parent::__construct($config, $httpCallBack);
    }

    /**
     * Creates a BRTC endpoint.
     *
     * @param string $accountId
     * @param Models\CreateEndpointRequest $body
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createEndpoint(
        string $accountId,
        Models\CreateEndpointRequest $body
    ) {
        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/endpoints';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array(
            'accountId' => $accountId,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::BRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array(
            'user-agent'   => BaseController::USER_AGENT,
            'Accept'       => 'application/json',
            'content-type' => 'application/json; charset=utf-8'
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //set authentication via existing OAuth/configureAuth
        $this->configureAuth($_headers, 'voice');

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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'BandwidthLib\\BRTC\\Models\\CreateEndpointResponse'
        );
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Lists BRTC endpoints for an account.
     *
     * @param string $accountId
     * @param string|null $type Filter by endpoint type
     * @param string|null $status Filter by endpoint status
     * @param string|null $direction Filter by endpoint direction
     * @param string|null $pageToken Pagination token
     * @param int|null $pageSize Number of results per page
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function listEndpoints(
        string  $accountId,
        ?string $type = null,
        ?string $status = null,
        ?string $direction = null,
        ?string $pageToken = null,
        ?int    $pageSize = null
    ) {
        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/endpoints';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array(
            'accountId' => $accountId,
        ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array(
            'type'      => $type,
            'status'    => $status,
            'direction' => $direction,
            'pageToken' => $pageToken,
            'pageSize'  => $pageSize,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::BRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array(
            'user-agent' => BaseController::USER_AGENT,
            'Accept'     => 'application/json'
        );

        //set authentication via existing OAuth/configureAuth
        $this->configureAuth($_headers, 'voice');

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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'BandwidthLib\\BRTC\\Models\\ListEndpointsResponse'
        );
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Gets details for a specific BRTC endpoint.
     *
     * @param string $accountId
     * @param string $endpointId
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getEndpoint(
        string $accountId,
        string $endpointId
    ) {
        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/endpoints/{endpointId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array(
            'accountId'  => $accountId,
            'endpointId' => $endpointId,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::BRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array(
            'user-agent' => BaseController::USER_AGENT,
            'Accept'     => 'application/json'
        );

        //set authentication via existing OAuth/configureAuth
        $this->configureAuth($_headers, 'voice');

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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass(
            $response->body,
            'BandwidthLib\\BRTC\\Models\\EndpointResponse'
        );
        return new ApiResponse($response->code, $response->headers, $deserializedResponse);
    }

    /**
     * Deletes a BRTC endpoint.
     *
     * @param string $accountId
     * @param string $endpointId
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteEndpoint(
        string $accountId,
        string $endpointId
    ) {
        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/endpoints/{endpointId}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array(
            'accountId'  => $accountId,
            'endpointId' => $endpointId,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::BRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array(
            'user-agent'   => BaseController::USER_AGENT,
            'Content-Type' => '',  // prevent curl from injecting Content-Type: application/x-www-form-urlencoded on empty DELETE body
        );

        //set authentication via existing OAuth/configureAuth
        $this->configureAuth($_headers, 'voice');

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

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return new ApiResponse($response->code, $response->headers, null);
    }

    /**
     * Updates the BXML for a BRTC endpoint.
     *
     * @param string $accountId
     * @param string $endpointId
     * @param string $body Valid BXML string
     * @return ApiResponse response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateEndpointBxml(
        string $accountId,
        string $endpointId,
        string $body
    ) {
        //prepare query string for API call
        $_queryBuilder = '/accounts/{accountId}/endpoints/{endpointId}/bxml';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array(
            'accountId'  => $accountId,
            'endpointId' => $endpointId,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($this->config->getBaseUri(Servers::BRTCDEFAULT) . $_queryBuilder);

        //prepare headers
        $_headers = array(
            'user-agent'   => BaseController::USER_AGENT,
            'content-type' => 'application/xml; charset=utf-8'
        );

        //set authentication via existing OAuth/configureAuth
        $this->configureAuth($_headers, 'voice');

        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, $body);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return new ApiResponse($response->code, $response->headers, null);
    }
}
