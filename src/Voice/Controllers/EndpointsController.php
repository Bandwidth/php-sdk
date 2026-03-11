<?php
/**
 * EndpointsController.php
 *
 * Controller for BRTC Endpoints API
 *
 * @copyright Bandwidth INC
 */

namespace BandwidthLib\Voice\Controllers;

use BandwidthLib\Voice\Models\Endpoint;
use BandwidthLib\Voice\Models\CreateEndpointRequest;
use BandwidthLib\Voice\Models\CreateEndpointResponse;
use BandwidthLib\Voice\Models\EndpointEvent;
use BandwidthLib\Voice\Models\Page;
use BandwidthLib\Voice\Models\ErrorResponse;

class EndpointsController {
    private $apiClient;
    private $accountId;

    public function __construct($apiClient, $accountId) {
        $this->apiClient = $apiClient;
        $this->accountId = $accountId;
    }

    /**
     * Create a new BRTC endpoint
     * @param CreateEndpointRequest $request
     * @return CreateEndpointResponse
     */
    public function createEndpoint(CreateEndpointRequest $request) {
        $url = "/accounts/{$this->accountId}/endpoints";
        $response = $this->apiClient->post($url, $request);
        return new CreateEndpointResponse(
            $response['endpointId'] ?? null,
            $response['type'] ?? null,
            $response['status'] ?? null,
            $response['createdTime'] ?? null,
            $response['updatedTime'] ?? null,
            $response['tag'] ?? null,
            $response['devices'] ?? null,
            $response['token'] ?? null
        );
    }

    /**
     * List endpoints
     * @param array $queryParams (optional)
     * @return Endpoint[]
     */
    public function listEndpoints($queryParams = []) {
        $url = "/accounts/{$this->accountId}/endpoints";
        $response = $this->apiClient->get($url, $queryParams);
        $endpoints = [];
        foreach ($response['endpoints'] ?? [] as $ep) {
            $endpoints[] = new Endpoint(
                $ep['id'] ?? null,
                $ep['type'] ?? null,
                $ep['status'] ?? null,
                $ep['direction'] ?? null,
                $ep['eventCallbackUrl'] ?? null,
                $ep['eventFallbackUrl'] ?? null,
                $ep['tag'] ?? null,
                $ep['devices'] ?? null,
                $ep['createdTime'] ?? null,
                $ep['updatedTime'] ?? null
            );
        }
        return $endpoints;
    }

    /**
     * Get a specific endpoint
     * @param string $endpointId
     * @return Endpoint
     */
    public function getEndpoint($endpointId) {
        $url = "/accounts/{$this->accountId}/endpoints/{$endpointId}";
        $ep = $this->apiClient->get($url);
        return new Endpoint(
            $ep['id'] ?? null,
            $ep['type'] ?? null,
            $ep['status'] ?? null,
            $ep['direction'] ?? null,
            $ep['eventCallbackUrl'] ?? null,
            $ep['eventFallbackUrl'] ?? null,
            $ep['tag'] ?? null,
            $ep['devices'] ?? null,
            $ep['createdTime'] ?? null,
            $ep['updatedTime'] ?? null
        );
    }

    /**
     * Delete an endpoint
     * @param string $endpointId
     * @return bool
     */
    public function deleteEndpoint($endpointId) {
        $url = "/accounts/{$this->accountId}/endpoints/{$endpointId}";
        $this->apiClient->delete($url);
        return true;
    }

    /**
     * Update endpoint BXML
     * @param string $endpointId
     * @param string $bxml
     * @return bool
     */
    public function updateEndpointBxml($endpointId, $bxml) {
        $url = "/accounts/{$this->accountId}/endpoints/{$endpointId}/bxml";
        $this->apiClient->put($url, ['bxml' => $bxml]);
        return true;
    }
}
